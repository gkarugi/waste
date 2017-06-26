<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Bouncer;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create administrator account';

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
     * @return mixed
     */
    public function handle()
    {
        $user = new User();
        $user->name      =  'Super Admin';
        $user->email     =  'admin@hotmail.com';
        $user->password  =   bcrypt('password');
        $user->save();

        //admin abilities
        Bouncer::allow('admin')->everything();
        
        Bouncer::assign('admin')->to($user);

        return $this->info('Successfully created the Administrator account');
    }
}
