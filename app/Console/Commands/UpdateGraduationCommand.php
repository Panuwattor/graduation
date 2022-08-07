<?php

namespace App\Console\Commands;

use App\Graduate;
use Illuminate\Console\Command;

class UpdateGraduationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:graduation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $graduates = Graduate::get();
        foreach($graduates as $graduate){
            $graduate->update([
                'photo'=> '/student/'.$graduate->studentCode.'.JPG'
            ]);
        }
        return 'OK';
    }
}
