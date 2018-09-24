@extends('website.layout.master')

@section('title', 'Configuração')

@section('content_header')
    <h1><i class="fa fa-file "></i> Configuração</h1>
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
                    <p class="box-title">{{ isset($configuracao) ? "Edição" : "Novo" }}</p>
                </div>
                <div class="box-body">
                    @if (!empty($errors->first()))
                        <span class="help-block">
                            <strong>{{ $errors->first('projeto_id') }}</strong><br>
                            <strong>{{ $errors->first('titulo') }}</strong><br>
                            <strong>{{ $errors->first('descricao') }}</strong><br>
                        </span>
                    @endif
                    <form class="form-group" action="{{route('configuracoes.salvar')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(isset($configuracao))
                            <input type="hidden" name="id" value="{{ $configuracao->id }}">
                        @endif
                        <div class="form-group">
                            <label for="projeto">Projeto</label>
                            <app-select id="projeto" name="projeto_id" list="{{$projetos}}"
                                        value="{{isset($configuracao) ? $configuracao->projeto_id : ''}}"></app-select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" class="form-control" name="titulo" type="text"
                                   value="{{ isset($configuracao) ? $configuracao->titulo : '' }}"/>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" class="form-control" name="descricao"
                                      type="text">{{ isset($configuracao) ? $configuracao->descricao : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="midia">Arquivo</label>
                            <input id="midia" name="midia" type="file">
                            {{--<p class="help-block">Add aquivo</p>--}}
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                    class="btn btn-default pull-right">{{ isset($configuracao) ? "Atualizar" : "Registrar" }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@