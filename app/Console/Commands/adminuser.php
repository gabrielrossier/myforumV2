<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use App\Support\DripEmailer;
use Illuminate\Console\Command;

class adminuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminuser {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grants the admin role to a user';

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
    public function handle($user)
    {
        User::setAdmin($user);
        
        return 0;
    }
}
