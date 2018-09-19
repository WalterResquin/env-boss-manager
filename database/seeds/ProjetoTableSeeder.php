<?php

use Illuminate\Database\Seeder;

class ProjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['titulo' => 'Hinode', 'descricao' => 'Projeto da Hinode'],
            ['titulo' => 'CNA', 'descricao' => 'Projeto do CNA'],
            ['titulo' => 'Belvedere', 'descricao' => 'Projeto da Belvedere']
        ];

        foreach ($data as $item){
            $projto = \App\Domain\Projeto\Projeto::create($item);
            $projto->save();
        }
    }
}
