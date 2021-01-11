<?php


namespace App\Services;


use App\Models\District;
use App\Models\Region;
use App\Models\Settlement;
use PhpOffice\PhpWord\TemplateProcessor;
use SpreadsheetReader;

/**
 * Class CSVService
 * @package App\Services
 */
class CSVService
{

    /**
     * @var SpreadsheetReader
     */
    private $reader;

    /**
     * CSVService constructor.
     * inits csv reader
     * @throws \Exception
     */
    public function __construct()
    {
        $this->reader = new SpreadsheetReader(storage_path('ua-list.csv'));

    }

    /**
     * creates regions, districts and settlements from ua-list.csv
     */
    public function createAddresses()
    {
        foreach ($this->reader as $row)
        {

            if ($row[2] == '') {
                continue;
            }

            $region = Region::firstOrCreate(['name' =>  mb_convert_encoding($row[0], "utf-8", "windows-1251")]);


            $district = District::firstOrCreate(['name' => mb_convert_encoding($row[1], "utf-8", "windows-1251"), 'region_id' => $region->id]);
            $district = District::firstOrCreate(['name' => mb_convert_encoding($row[1], "utf-8", "windows-1251"), 'region_id' => $region->id]);

            Settlement::firstOrCreate([
                'name' => mb_convert_encoding(ucfirst(strtolower($row[2])), "utf-8", "windows-1251"),
                'district_id' => $district->id]);

        }
    }
}
