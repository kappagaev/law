<?php

namespace App\Console\Commands;

use App\Models\Territory;
use App\Models\ViolationType;
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
//        //$this->CSVService->createAddresses();
//        $string = file_get_contents(storage_path('koatuu.json'));
//        if ($string === false) {
//            // deal with error...
//        }
//
//        $json_a = json_decode($string, true);
//        if ($json_a === null) {
//            // deal with error...
//        }
//        foreach ($json_a as $territory) {
//            $this->createTerritory($territory);
//        }
//        $citiesLevel3 = Territory::where('level', 3)->where('type', 'М')->get();
//        foreach ($citiesLevel3 as $city) {
//            $children = $city->children;
//
//
//            if ($children->isEmpty()) {
//                continue;
//            }
//            foreach ($children as $child)
//                $this->lowerTheTerritory($child);
//        }
//
//        $townsWithLevel3 = Territory::where('level', 3)->where('type', 'М')->get();
//        foreach ($townsWithLevel3 as $town) {
//            $this->lowerTheTerritory($town);
//        }
//       $regionsWithLevel3 = Territory::where('level', 3)->where('type', '')->get();
//        foreach ($regionsWithLevel3 as $region) {
//            $children = $region->children;
//
//
//            if ($children->isEmpty()) {
//                $region->delete();
//                continue;
//            }
//            foreach ($children as $child)
//                $this->lowerTheTerritory($child);
//            $region->delete();
//        }
//        $centersWithLevel3 = Territory::where('level', 3)->where('type', 'Т')->get();
//
//        foreach ($centersWithLevel3 as $center) {
//            $children = $center->children;
//
//
//            if ($children->isEmpty()) {
//                $center->delete();
//                continue;
//            }
//            foreach ($children as $child)
//                $this->lowerTheTerritory($child);
//            $center->delete();
//        }
//
//        foreach (Territory::where('name', 'like', '%/М.%')->get() as $territory) {
//            $territory->name = explode('/', $territory->name)[0];
//            $territory->save();
//        }
//        foreach (Territory::where('name', 'like', '%/СМТ%')->get() as $territory) {
//            $territory->name = explode('/', $territory->name)[0];
//            $territory->save();
//        }
//
//        for ($i = 1; $i <= 39430; $i++) {
//            $territory = Territory::where('id', $i)->first();
//            if (!$territory) {
//                echo $i;
//                continue;
//            }
//            echo $i . ' ';
//            $nameWords = preg_split('/[.\s]/', $territory->name);
//            $name = '';
//            foreach ($nameWords as $word) {
//                if(in_array($word, ['ОБЛАСТЬ', 'РАЙОН', 'M'])) {
//                    if($word == 'M') {
//                        $name .= 'м.';
//                    } else {
//                        $name .= mb_strtolower($word);
//                    }
//                } else {
//                    $name .= mb_strtoupper(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8') .
//                        mb_strtolower(mb_substr($word, 1, mb_strlen($word, 'UTF-8'), 'UTF-8'));
//                }
//                $name .= ' ';
//            }
//            echo $name . PHP_EOL;
//
//            $territory->name = $name;
//            $territory->save();
//        }

//        Territory::where('name', 'М Севастополь')->first()->delete();
//        Territory::where('name', 'Автономна Республіка Крим ')->first()->delete();
//        Territory::where('name', 'М Київ')->update(['type' => 'М']);
//        Territory::where('name', 'Дніпро')->update(['type' => 'М']);
//        Territory::where('name', 'Маріуполь')->update(['type' => 'М']);
//        Territory::where('name', 'Донецьк')->update(['type' => 'М']);
//        Territory::where('name', 'Житомир')->update(['type' => 'М']);
//        Territory::where('name', 'Одеса')->update(['type' => 'М']);
//        Territory::where('name', 'Миколаїв')->update(['type' => 'М']);
//        Territory::where('name', 'Львів')->update(['type' => 'М']);
//        Territory::where('name', 'Кропивницький')->update(['type' => 'М']);
//        Territory::where('name', 'Запоріжжя')->update(['type' => 'М']);
//        Territory::where('name', 'Горлівка')->update(['type' => 'М']);
//        Territory::where('name', 'Макіївка')->update(['type' => 'М']);
//        Territory::where('name', 'Кременчук')->update(['type' => 'М']);
//        Territory::where('name', 'Полтава')->update(['type' => 'М']);
//        Territory::where('name', 'Суми')->update(['type' => 'М']);
//        Territory::where('name', 'Харків')->update(['type' => 'М']);
//        Territory::where('name', 'Херсон')->update(['type' => 'М']);
//        Territory::where('name', 'Черкаси')->update(['type' => 'М']);
//        Territory::where('name', 'Чернігів')->update(['type' => 'М']);
//        $territories = Territory::where('name', 'like', '%-%')->get();
//        foreach ($territories as $territory) {
//            $name = explode('-', $territory->name);
//            $name[1] = mb_strtoupper(mb_substr($name[1], 0, 1, 'UTF-8'), 'UTF-8') . mb_strtolower(mb_substr($name[1], 1, mb_strlen($name[1], 'UTF-8'), 'UTF-8'));
//            $territory->name = implode('-', $name);
//            $territory->save();
//        }

        $types = ViolationType::all();
        foreach ($types as $type) {
            echo($type->description[-1]);
            if($type->description[-1] != '.') {
                echo 123;
                $type->description .= '.';
                $type->save();
            }
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
