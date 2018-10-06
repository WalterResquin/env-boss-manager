<?php

namespace App\Domain\User;

use App\Domain\Anotacao\Anotacao;
use App\Domain\Configuracao\Configuracao;
use App\Domain\Projeto\Projeto;
use App\Domain\ProjetoUser\ProjetoUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projetos()
    {
        return $this->belongsToMany(Projeto::class,'projeto_user','user_id', 'projeto_id');
    }

    public function anotacoes()
    {
        return $this->belongsToMany(Anotacao::class,'projeto_user','user_id', 'projeto_id');
    }

    public function configuracoes()
    {
        return $this->belongsToMany(Configuracao::class,'projeto_user','user_id', 'projeto_id');
    }
}
