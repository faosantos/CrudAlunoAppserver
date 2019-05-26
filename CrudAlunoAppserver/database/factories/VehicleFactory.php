<?php
use App\Vehicle;
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

$factory->define(Vehicle::class, function (Faker $faker) {
    $clientIds = DB::table('clients')->pluck('id');
    return [
        'placa' => getPlate(7),
        'client_id' => $faker->randomElement($clientIds),
        'brand' => array_random(['Chery', 'Nissan', 'Fiat', 'Chevrolett', 'Ford', 'wolksvagem']),
        'model' => array_random(['Kadett', 'Monza', 'Fox','Passat', 'Onix', 'Uno', 'Corsa', 'Vectra', 'hilux', 'S10']),
        'color' => $faker-> safeColorName,
        'type' =>  array_random(['car', 'bike', 'truck', 'utility']),
        'year'  => $faker->year($max = 'now')
    ];
});
