<?php

namespace App\Domain\ArquivoConfiguracao;

use Illuminate\Database\Eloquent\Model;

class ArquivoConfiguracao extends Model
{
    protected $fillable =  ['arquivo_id', 'configuracao_id'];
}
