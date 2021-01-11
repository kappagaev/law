<?php

namespace App\Console\Commands;

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
        $this->CSVService->createAddresses();
        return 0;
    }
}
