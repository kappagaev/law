<?php

namespace Database\Seeders;

use App\Models\Request;
use Database\Factories\RequestFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $requestFactory = new RequestFactory();
        $requestFactory->count(1000)->create();
    }
}
