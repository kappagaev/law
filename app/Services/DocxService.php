<?php


namespace App\Services;


use App\Models\Request;
use PhpOffice\PhpWord\TemplateProcessor;

/**
 * Class DocxService
 * @package App\Services
 */
class DocxService
{
    /**
     * @var TemplateProcessor
     */
    private $template;

    /**
     * @var string
     */
    private $name;

    /**
     * DocxService constructor.
     * @param $templateName string template name in storage
     * @param $fileName string name, without extension
     * @throws \PhpOffice\PhpWord\Exception\CopyFileException
     * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
     */
    public function __construct($templateName, $fileName)
    {
        $this->template = new TemplateProcessor(storage_path($templateName));
        $this->name = $fileName . '.docx';
    }

    /**
     * replaces keys with values in template
     * @param array $array
     * @return $this
     */
    public function setValues(array $array)
    {
        foreach ($array as $key => $value) {
            $this->template->setValue($key , $value);
        }
        return $this;
    }

    /**
     * replaces key with a value in template
     * @param $key
     * @param $value
     * @return $this
     */
    public function setValue($key, $value)
    {
        $this->template->setValue($key , $value);
        return $this;
    }

    /**
     * gets file name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * saves file in storage with name $name.docx
     * @return $this
     */
    public function save()
    {
        $this->removeAllBlanks();
        try{
            $this->template->saveAs(storage_path($this->name));
        }catch (Exception $e){
            //handle exception
        }
        return $this;
    }

    /**
     * clears all blanks from current template
     */
    private function removeAllBlanks()
    {
        $blanks = $this->template->getVariables();
        foreach ($blanks as $key) {
            $this->template->setValue($key, '');
        }
    }

    public function handleRequestModel(Request $rm)
    {

        $violation_type = $rm->violationType->full_description;

        foreach ($rm->checkboxes as $checkbox) {
            $violation_type .= ' ' . $checkbox->description;
        }
        //$docx = $fileService->createDocx($rm, $rm->user, $files);
        return $this
            ->setValues($rm->getAttributes())
            ->handleFiles($rm->all_files)
            ->setValues($rm->user->getAttributes())
            ->setValue('initials', $rm->user->initials)
            ->setValues($rm->violationType->getAttributes())
            ->setValue('violation_type', $violation_type)
            ->setValue('full_address', $rm->full_address)
            ->setValue('user_full_address', $rm->user->full_address);
    }

    public function handleFiles($files): DocxService
    {
        $additions = [
            'photocopy' => 'фотокопія документа',
            'audio'=> 'аудіозапис',
            'video'=> 'відеозапис',
            'reg_photocopy'=>'фотокопія установчих та реєстраційних документів',
            'witness_reg_photo' => 'фотокопія акта, підписаного свідками'
        ];
        $i = 1;
        foreach ($additions as $key => $addition) {
            if(isset($files[$key])) {
                $this->setValue('addition'. ($i), ($i) . ') ' . $addition . ' ' . $files[$key]);
                $i++;
            }
        }


        return $this;
    }
}
