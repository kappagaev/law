<?php

namespace App\Console\Commands;

use App\Models\Territory;
use App\Services\CSVService;
use Illuminate\Console\Command;

class CreateAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var CSVService
     */
    private $CSVService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CSVService $CSVService)
    {
        $this->CSVService = $CSVService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$this->CSVService->createAddresses();
        $string = file_get_contents(storage_path('koatuu.json'));
        if ($string === false) {
            // deal with error...
        }

        $json_a = json_decode($string, true);
        if ($json_a === null) {
            // deal with error...
        }
        foreach ($json_a as $territory) {
            $this->createTerritory($territory);
        }
        $citiesLevel3 = Territory::where('level', 3)->where('type', 'М')->get();
        foreach ($citiesLevel3 as $city) {
            $children = $city->children;


            if ($children->isEmpty()) {
                continue;
            }
            foreach ($children as $child)
                $this->lowerTheTerritory($child);
        }

        $townsWithLevel3 = Territory::where('level', 3)->where('type', 'М')->get();
        foreach ($townsWithLevel3 as $town) {
            $this->lowerTheTerritory($town);
        }
       $regionsWithLevel3 = Territory::where('level', 3)->where('type', '')->get();
        foreach ($regionsWithLevel3 as $region) {
            $children = $region->children;


            if ($children->isEmpty()) {
                $region->delete();
                continue;
            }
            foreach ($children as $child)
                $this->lowerTheTerritory($child);
            $region->delete();
        }
        $centersWithLevel3 = Territory::where('level', 3)->where('type', 'Т')->get();

        foreach ($centersWithLevel3 as $center) {
            $children = $center->children;


            if ($children->isEmpty()) {
                $center->delete();
                continue;
            }
            foreach ($children as $child)
                $this->lowerTheTerritory($child);
            $center->delete();
        }



        return 0;
    }


    private function createTerritory($territory)
    {
        $fields = [];
        $level = 0;

        foreach (array_values($territory) as $index => $item) {
            if ($index > 3) {
                break;
            }
            if($item != '') {
                $level++;
            }

        }
        $fields['level'] = $level;

        if($level > 1) {
            $fields['territory_id'] = Territory::where('code', array_values($territory)[$level - 2])->first()->id;
        }
        $fields['code'] = array_values($territory)[$level - 1];
        if(array_values($territory)[$level - 1] == null) {
            dd( $level, $territory);
        }
        $fields['name'] = $territory['Назва об\'єкта українською мовою'];
        $fields['type'] = $territory['Категорія'];
        Territory::create($fields);
    }

    private function lowerTheTerritory(Territory $territory)
    {
        $parent = $territory->parent;
        $territory->territory_id = $parent->territory_id;
        $territory->level = $territory->level - 1;
        $territory->save();

    }
}
