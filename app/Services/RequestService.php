<?php

namespace App\Services;

use App\Models\Request;
use App\Models\Request as RM;
use Illuminate\Support\Str;

/**
 * Class RequestService
 * @package App\Services
 */
class RequestService
{
    /**
     * @var FileService
     */
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * @param $request
     * @param $user_id
     * @param $checkboxes
     * @return RM
     */
    public function create($request, $user_id, $checkboxes)
    {
        $rm = new RM($request->validated());

        $files = $this->fileService->storeRequestFiles($request, Request::$files, Str::random());
        $rm->user_id = $user_id;
        $rm->fill($files);
        $rm->save();
        $rm->checkboxes()->attach($checkboxes);

        return $rm;
    }


    /**
     *
     */
    public function withFiles()
    {

    }
}
