<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->fill([
            'name' => 'adm',
            'email' => 'dev@webeleven.com.br',
            'password' => \Illuminate\Support\Facades\Hash::make('Web11')
        ]);
        $user->save();
    }
}
