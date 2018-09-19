@extends('website.layout.master')

@section('title', 'Projetos')

@section('content_header')
    <h1><i class="fa fa-file "></i> Projetos</h1>

@stop

@section('content-app')


    <div class="row">
        <div class="col-lg-10">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Projetos</h3>
                </div>
                <div class="box-body">

                    <grid></grid>

                </div>
            </div>
        </div>
    </div>
@stop