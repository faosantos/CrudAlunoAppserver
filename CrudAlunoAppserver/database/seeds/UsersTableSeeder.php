<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        // Cria usuários demo (dados faker)
        $this->createUsers();
    }
    public  function createUsers()
    {
         //usuario 1
         User::create([
            'name'      => 'Administrador Master',
            'email'     => 'admin@gettrack.com.br',
            'password'  => Hash::make("33882079"),
        ]);
         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 1 Administrador Master criado com sucesso');
         //usuario 2
         User::create([
            'name'      => 'Contato',
            'email'     => 'contato@gettrack.com.br',
            'password'  => Hash::make("33882079"),
        ]);
         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 2 Contato criado com sucesso');
    }
}
