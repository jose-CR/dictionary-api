<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DeleteUserTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'se borran todos los usuario con el rol temp';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::where('name', 'temp')->first();

        if($role)
        {
            $users = User::role('temp')->get();

            foreach($users as $user)
            {
                $user->delete();
            }
            $this->info('Todos los usuarios con el rol "temp" han sido eliminados.');
        }
        else
        {
            $this->error('El rol "temp" no existe.');
        }
    }
}
