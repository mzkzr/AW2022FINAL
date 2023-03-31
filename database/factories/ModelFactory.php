<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Provincium::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Localidad::class, static function (Faker\Generator $faker) {
    return [
        'provincia_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        'productor_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'ibu' => $faker->randomNumber(5),
        'abv' => $faker->randomNumber(5),
        'srm' => $faker->randomNumber(5),
        'og' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PuntoVentum::class, static function (Faker\Generator $faker) {
    return [
        'cerveza_id' => $faker->sentence,
        'cerveceria_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        'abv' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'ibu' => $faker->randomNumber(5),
        'nombre' => $faker->sentence,
        'og' => $faker->randomNumber(5),
        'productor_id' => $faker->sentence,
        'srm' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'horario_atencion' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'domicilio' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'email' => $faker->email,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'telefono' => $faker->sentence,
        'updated_at' => $faker->dateTime
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        'abv' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'descripcion' => $faker->text(),
        'ibu' => $faker->randomNumber(5),
        'imagen' => $faker->sentence,
        'nombre' => $faker->sentence,
        'og' => $faker->randomNumber(5),
        'productor_id' => $faker->sentence,
        'srm' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'email' => $faker->email,
        'horario_atencion' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'productor_id' => $faker->sentence,
        'telefono' => $faker->sentence,
        'updated_at' => $faker->dateTime
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PuntoVentum::class, static function (Faker\Generator $faker) {
    return [
        'cerveceria_id' => $faker->sentence,
        'cerveza_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'presentaciones' => $faker->text(),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'email' => $faker->email,
        'facebook' => $faker->sentence,
        'horario_atencion' => $faker->sentence,
        'instagram' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'productor_id' => $faker->sentence,
        'telefono' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'youtube' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Productor::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'email' => $faker->email,
        'facebook' => $faker->sentence,
        'instagram' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'telefono' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'youtube' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        'productor_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'descripcion' => $faker->text(),
        'ibu' => $faker->randomNumber(5),
        'abv' => $faker->randomFloat,
        'srm' => $faker->randomNumber(5),
        'og' => $faker->randomNumber(5),
        'imagen' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PuntoVentum::class, static function (Faker\Generator $faker) {
    return [
        'cerveza_id' => $faker->sentence,
        'cerveceria_id' => $faker->sentence,
        'presentaciones' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cerveza::class, static function (Faker\Generator $faker) {
    return [
        'abv' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'descripcion' => $faker->text(),
        'ibu' => $faker->randomNumber(5),
        'nombre' => $faker->sentence,
        'og' => $faker->randomNumber(5),
        'productor_id' => $faker->sentence,
        'srm' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cervecerium::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'domicilio' => $faker->sentence,
        'email' => $faker->email,
        'facebook' => $faker->sentence,
        'horario_atencion' => $faker->sentence,
        'instagram' => $faker->sentence,
        'localidad_id' => $faker->sentence,
        'nombre' => $faker->sentence,
        'productor_id' => $faker->sentence,
        'provincia_id' => $faker->sentence,
        'telefono' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'youtube' => $faker->sentence,
        
        
    ];
});
