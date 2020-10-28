<?php

use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            'id'=>'1',
            'permiso' => 'user:perfil'
        ]);
        DB::table('permisos')->insert([
            'id'=>'1',
            'permiso' => 'user:delete'
        ]);
        DB::table('permisos')->insert([
            'id'=>'1',
            'permiso' => 'user:admi'
        ]);
        DB::table('permisos')->insert([
            'id'=>'1',
            'permiso' => 'user:show'
        ]);
    }
}
