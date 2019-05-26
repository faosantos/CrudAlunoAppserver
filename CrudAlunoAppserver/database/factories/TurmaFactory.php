<?php
use App\Turma;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
function getPlate($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = '';
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    }
    return $randomString; 
}

$factory->define(Turma::class, function (Faker $faker) {
    $turmaIds = DB::table('turmas')->pluck('id');
    return [
        'num_aluno' => getPlate(7),
        'aluno_id' => $faker->randomElement($turmaIds),
        'turma' => array_random(['12a', '12b', '72a', '72b', '52a', '52b']),
        'serie' => array_random(['5ºsérie', '6ºsérie', '7ºsérie','8ºsérie', '4ºsérie', '3ºsérie', '2ºsérie', '1ºsérie'])
        // 'color' => $faker-> safeColorName,
        // 'type' =>  array_random(['car', 'bike', 'truck', 'utility']),
        // 'year'  => $faker->year($max = 'now')
    ];
});
