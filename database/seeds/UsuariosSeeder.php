<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'alexferloz',
            'email'=>'alexferlozanom@gmail.com',
            'password'=>Hash::make('123456'),
            'edad'=>'18',
            'rol'=>'admin']);
    }
}
