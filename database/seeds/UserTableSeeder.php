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
        $user = new \App\Domain\User\User();
        $user->fill([
            'name' => 'Admin',
            'email' => 'admin@jonworks.com.br',
            'password' => \Illuminate\Support\Facades\Hash::make('admin')
        ]);
        $user->save();
    }
}
