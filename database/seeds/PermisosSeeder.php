<?php

use Illuminate\Database\Seeder;
use App\permisos;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        permisos::create([
        'permiso' => 'user:admi']);

        permisos::create([
        'permiso' => 'user:info']);

        permisos::create([
        'permiso' => 'user:delete']);

        permisos::create([
        'permiso' => 'admi:admi']);
    }
}
