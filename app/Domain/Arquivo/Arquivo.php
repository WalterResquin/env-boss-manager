<?php

namespace App\Domain\Arquivo;

use App\Domain\Anotacao\Anotacao;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = ['nome','arquivo','tipo','info'];

    public function Anotacao()
    {
        $this->belongsToMany(Anotacao::class,'arquivo_anotacao', 'arquivo_id');
    }
}
