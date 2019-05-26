<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Aluno::class, 30)->create()->each(function($aluno){
            $aluno->vehicles()
            ->save(
                factory(App\Vehicle::class)->make()
            );
        });
    }
}
