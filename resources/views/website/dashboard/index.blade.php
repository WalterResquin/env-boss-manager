
@extends('website.layout.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
@stop

@section('content-app')

    <div class="row">
        <div class="col-lg-3">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Projetos</span>
                    <span class="info-box-number">93,139</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Projetos</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-2">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Projeto x</h3>
                            </div>
                            {{--<div class="box-body">--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop