
<?php

use App\Aluno;
use Faker\Generator as Faker;

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

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone_a' => $faker->e164PhoneNumber,
        'phone_b' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
        'cpf_rg' => "000.000.000-00",
        'type' => $faker->randomElement(['m', 't']),
    ];
});

