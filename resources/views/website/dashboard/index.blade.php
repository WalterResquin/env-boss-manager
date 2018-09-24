@extends('website.layout.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
@stop

@section('content-app')
    <div class="row">
        <div class="col-lg-3">
            <div class="info-box">

                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">{{$quant_proj}} Projeto(s)</span><span>Cadastrado(s)</span>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa fa-file-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">{{$quant_anota}} Nota(s)</span><span>Cadastrada(s)</span>
                </div>

            </div>
        </div>
        <div class="col-lg-3">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file-code-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">{{$quant_conf}} Config(s)</span><span>Cadastrado(s)</span>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-cubes "></i>
                    <h3 class="box-title">Projetos</h3>
                    <a href="{{route('projetos.novo')}}" class="btn btn-success pull-right" role="button">
                        Novo Projeto
                    </a>
                </div>
                <div class="box-body">

                    <div class="box-body">
                        @foreach( $projetos as $projeto)
                            <div class="col-lg-2">
                                <div class="box box-default bg-gray">
                                    <div class="box-header bg-gray ">
                                        <i class="fa fa-cube "></i>
                                        <h3 class="box-title"><a
                                                    href="{{route('projetos.editar',['id' => $projeto->id])}}">{{$projeto->titulo}}</a>
                                        </h3>
                                        <span class="pull-right-container">
                                        <a href="{{route('anotacoes.novo')}}"><small class="label pull-right bg-aqua">+ Nota</small></a>
                                        <br>
                                        <a href="{{route('configuracoes.novo')}}"><small
                                                    class="label pull-right bg-red">+ Conf</small></a>
                                    </span>
                                    </div>
                                    <div class="box-body bg-gray-light">
                                        @if(count($projeto->anotacoes))
                                            <h5>Anotacões:</h5>
                                            @foreach( $projeto->anotacoes as $anotacao)
                                                <p title="{{$anotacao->descricao}}">*
                                                    <a href="{{route('anotacoes.editar',['id' => $anotacao->id])}}">{{$anotacao->titulo}}</a>
                                                </p>
                                            @endforeach
                                        @endif
                                        @if(count($projeto->configuracoes))
                                            <h5>Configs:</h5>
                                            @foreach( $projeto->configuracoes as $configuracoes)
                                                <p title="{{$configuracoes->descricao}}">*
                                                    <a href="{{route('configuracoes.editar',['id' => $configuracoes->id])}}">{{$configuracoes->titulo}}</a>
                                                </p>
                                            @endforeach
                                        @endif

                                        @if(!count($projeto->anotacoes) && !count($projeto->configuracoes))
                                            <span class="text-center text-muted"> ( No Data ) </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop