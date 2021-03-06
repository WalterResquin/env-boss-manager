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
                            <strong>{{ $errors->first('projeto_id') }}</strong><br>
                            <strong>{{ $errors->first('titulo') }}</strong><br>
                            <strong>{{ $errors->first('descricao') }}</strong><br>
                        </span>
                    @endif
                    <form class="form-group" action="{{route('anotacoes.salvar')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(isset($anotacao))
                            <input type="hidden" name="id" value="{{ $anotacao->id }}">
                        @endif
                        {{--{{$projetos}}--}}
                        <div class="form-group">
                            <label for="projeto">Projeto</label>
                            <app-select id="projeto" name="projeto_id" list="{{$projetos}}"
                                        value="{{isset($anotacao) ? $anotacao->projeto_id : ''}}"></app-select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" class="form-control" name="titulo" type="text"
                                   value="{{ isset($anotacao) ? $anotacao->titulo : '' }}"/>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" class="form-control" name="descricao"
                                      type="text">{{ isset($anotacao) ? $anotacao->descricao : '' }}</textarea>
                        </div>
                        <button type="submit"
                                class="btn btn-default pull-right">{{ isset($anotacao) ? "Atualizar" : "Registrar" }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop