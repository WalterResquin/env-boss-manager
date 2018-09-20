@extends('website.layout.master')

@section('title', 'Anoção')

@section('content_header')
    <h1><i class="fa fa-file "></i> Anotação</h1>
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
                    @if (!empty($errors->first()))
                        <span class="help-block">
                            <strong>{{ $errors->first('titulo') }}</strong>
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                    @endif
                    <form class="form-group" action="{{route('anotacoes.salvar')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(isset($anotacao))
                            <input type="hidden" name="id" value="{{ $anotacao->id }}">
                        @endif
                        <div class="form-group">
                            <label for="projeto">Projeto</label>
                            <app-select list="{{$projetos}}" ></app-select>
                        </div>

                        <label for="nome">Nome</label>
                        <input id="nome" class="form-control" name="titulo" type="text"
                               value="{{ isset($anotacao) ? $anotacao->titulo : '' }}"/>
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" class="form-control" name="descricao"
                                  type="text">{{ isset($anotacao) ? $anotacao->descricao : '' }}</textarea>
                        <br>
                        <button type="submit" class="btn btn-default">{{ isset($anotacao) ? "Atualizar" : "Registrar" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop