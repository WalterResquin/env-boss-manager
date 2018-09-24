@extends('website.layout.master')

@section('title', 'Configurações')

@section('content_header')
    <h1><i class="fa fa-file "></i> Configurações</h1>

@stop

@section('content-app')

    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <a href="{{route('configuracoes.novo')}}" class="btn btn-success" role="button">
                        Nova Configuração
                    </a>
                </div>
                <div class="box-body">
                    <grid-configuracoes></grid-configuracoes>
                </div>
            </div>
        </div>
    </div>
@stop