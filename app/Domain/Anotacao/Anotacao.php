<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 20/09/2018
 * Time: 11:24
 */

namespace App\Domain\Anotacao;


use App\Domain\Projeto\Projeto;
use Illuminate\Database\Eloquent\Model;

class Anotacao extends Model
{
    protected $table = 'anotacoes';

    protected $fillable = [
        'titulo', 'descricao', 'projeto_id'
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id', 'id');
    }
}