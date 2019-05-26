<?php
use App\Equipments;
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
$factory->define(Equipments::class, function (Faker $faker) {
    $vehicleId = DB::table('equipments')->pluck('id');
    return [
        'name' => $faker->name,//'0000000D00s0SDAF0',
        'serial_num' => $faker->md5,//'0000000D00s0SDAF0',
        'model' => "FDC7000",
        'chip_num' => $faker->md5,//'0000000D00s0SDAF0',
        'vehicle_id' => $faker->randomElement($vehicleId)
    ];
});
