@extends('website.layout.master')

@section('title', 'Projetos')

@section('content_header')
    <h1><i class="fa fa-file "></i> Projeto</h1>
@stop

@section('content-app')
    <div class="row">
        <div class="col-lg-10">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <p class="box-title">{{ isset($anotacao) ? "Edição" : "Novo" }}</p>
                </div>
                <div class="box-body">
                    <form class="form-group" action="{{route('projetos.salvar')}}" method="post">
                        @if (!empty($errors->first()))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong><br>
                                <strong>{{ $errors->first('descricao') }}</strong><br>
                            </span>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(isset($anotacao))
                            <input type="hidden" name="id" value="{{ $anotacao->id }}">
                        @endif
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" class="form-control" name="titulo" type="text"
                                   value="{{ isset($projeto) ? $projeto->titulo : '' }}"/>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" class="form-control" name="descricao"
                                      type="text">{{ isset($projeto) ? $projeto->descricao : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-default pull-right">{{ isset($projeto) ? "Atualizar" : "Registrar" }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop