<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class UpdateRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates all roles with their respective abilities defined in the roles config file';

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
        $roles = config('roles.roles');
        
        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['name' => $role['name']],
                ['abilities' => $role['abilities']]
            );
        }

        return $this->info('You have successfully updated your roles.');
    }
}
