<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'se borran todos los usuario con el rol user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::where('name', 'user')->first();

        if($role)
        {
            $users = User::role('user')->get();

            foreach($users as $user)
            {
                $user->delete();
            }
            $this->info('Todos los usuarios con el rol "user" han sido eliminados.');
        }
        else
        {
            $this->error('El rol "user" no existe.');
        }
    }
}
