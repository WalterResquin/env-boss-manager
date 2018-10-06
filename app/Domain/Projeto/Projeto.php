<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 17/09/2018
 * Time: 16:44
 */

namespace App\Domain\Projeto;


use App\Domain\Anotacao\Anotacao;
use App\Domain\Configuracao\Configuracao;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{

    protected $fillable = [
        'titulo', 'descricao'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'projeto_user','projeto_id',    'user_id');
    }

    public function anotacoes()
    {
        return $this->hasMany(Anotacao::class,'projeto_id','id');
    }

    public function configuracoes()
    {
        return $this->hasMany(Configuracao::class, 'projeto_id', 'id');
    }
}