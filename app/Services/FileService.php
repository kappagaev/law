<?php


namespace App\Services;


use App\Models\File;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpWord\TemplateProcessor;
use function Illuminate\Support\Facades\File;

/**
 * Class FileService
 * @package App\Services
 */
class FileService
{

    /**
     * @param  $request
     * @param $fileNames array
     * @param $storePrefix
     * @return array
     */
    public function storeRequestFiles($request, $fileNames, $storePrefix)
    {
        $res = [];
        foreach ($fileNames as $fileName) {
            if($request->hasFile($fileName)) {
                $files = $request->file($fileName);


                $res[$fileName] =  $this->handleRequestFiles($files, $fileName, $storePrefix);

            }
        }

        return $res;
    }

    /**
     * @param $files
     * @param $dir
     * @param $storePrefix
     * @return array
     */
    private function handleRequestFiles($files, $dir, $storePrefix)
    {
        $res = [];
        foreach ($files as $i => $file) {
            $guessExtension = $file->guessExtension();
            $name =  $storePrefix . '_' . $dir . ($i+1) . '.' . $guessExtension;
            $file->move(storage_path($dir), $name);
            array_push($res, $name);
        }
        return $res;
    }
}
