<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'password'=>'$10$.e6/J/I4mGOKYXj3CBvrxeNzKK4HqhpPFNGoMsN28HC9Ce8n9v1CK',
            'edad'=>'18']);
    }
}
