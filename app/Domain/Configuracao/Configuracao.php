<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 24/09/2018
 * Time: 11:47
 */

namespace App\Domain\Configuracao;


use App\Domain\Projeto\Projeto;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    protected $table = 'configuracoes';

    protected $fillable = [
        'titulo', 'descricao', 'projeto_id'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id', 'id');
    }
}