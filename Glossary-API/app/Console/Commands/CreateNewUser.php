<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'este comando crea un nuevo usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Ingrese el nombre del usuario');
        $email = $this->ask('Ingrese el email del usuario');

        $password = $this->secret('Ingrese la contraseña del usuario');
        $passwordConfirmation =$this->secret('Confirme la contraseña del usuario');

        if ($password !== $passwordConfirmation){
            $this->error('Las contraseñas no coinciden');
            return;   
        }

        if(User::where('email', $email)->exists()){
            $this->error('El email ya está registrado en la base de datos.');
            return;
        }

        $user =User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $user->sendEmailVerificationNotification();

        $this->info('Usuario creado con exito:'.' '.$user->name);
    }
}
