@extends('website.layout.master')

@section('title', 'Anotações')

@section('content_header')
    <h1><i class="fa fa-file "></i> Anotações</h1>

@stop

@section('content-app')

    <div id="face" value=""> </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <a href="{{route('anotacoes.novo')}}" class="btn btn-success" role="button">
                        Nova notação
                    </a>
                </div>
                <div class="box-body">

                    <grid-anotacoes></grid-anotacoes>

                </div>
            </div>
        </div>
    </div>
@stop