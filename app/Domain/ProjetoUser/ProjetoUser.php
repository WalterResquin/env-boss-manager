<?php

namespace App\Domain\ProjetoUser;

use Illuminate\Database\Eloquent\Model;

class ProjetoUser extends Model
{
    protected $table = 'projeto_user';

    protected $fillable = [
        'id_user', 'id_projeto'
    ];
}
