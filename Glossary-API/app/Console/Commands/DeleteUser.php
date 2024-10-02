<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {--id=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'se borraran los usuarios que tenga el id o el nombre del usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->option('id');
        $userName = $this->option('name');

        if($userId){
            $user = User::find($userId);

            if($user){
                $user->delete();
                $this->info("El usuario con ID {$userId} ha sido eliminado.");
            }else {
                $this->error("No se encontró un usuario con ID {$userId}.");
            }
        }
        elseif($userName){
            $user = User::where('name', $userName)->first();

            if ($user) {
                $user->delete();
                $this->info("El usuario con nombre '{$userName}' ha sido eliminado.");
            } else {
                $this->error("No se encontró un usuario con nombre '{$userName}'.");
            }
        }

        else {
            $this->error('Debes proporcionar un ID o un nombre de usuario.');
        }
    }
}
