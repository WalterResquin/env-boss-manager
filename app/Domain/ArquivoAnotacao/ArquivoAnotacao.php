<?php

namespace App\Domain\ArquivoAnotacao;

use Illuminate\Database\Eloquent\Model;

class ArquivoAnotacao extends Model
{
    protected $fillable =  ['arquivo_id', 'anotacao_id'];
}
