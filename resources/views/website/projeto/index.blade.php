@extends('website.layout.master')

@section('title', 'Projetos')

@section('content_header')
    <h1><i class="fa fa-file "></i> Projetos</h1>
@stop

@section('content-app')

    {{--<div class="row">--}}
        {{--<div class="col-lg-10">--}}
            {{--<a href="{{route('projeto.novo')}}" class="btn btn-success" role="button">--}}
                {{--Novo--}}
            {{--</a>--}}
            {{--<fb:login-button--}}
                    {{--scope="public_profile,email"--}}
                    {{--onlogin="checkLoginState();">--}}
            {{--</fb:login-button>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<br>--}}

    <div class="row">
        <div class="col-lg-10">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <a href="{{route('projetos.novo')}}" class="btn btn-success" role="button">
                        Novo Projeto
                    </a>
                </div>
                <div class="box-body">

                    <grid-projetos></grid-projetos>

                </div>
            </div>
        </div>
    </div>
@stop


{{--@section('js')--}}
    {{--@parent--}}
    {{--<script>--}}
        {{--window.fbAsyncInit = function() {--}}
            {{--FB.init({--}}
                {{--appId      : 698481590506044,--}}
                {{--cookie     : true,--}}
                {{--xfbml      : true,--}}
                {{--version    : 'v3.1'--}}
            {{--});--}}
            {{--FB.AppEvents.logPageView();--}}

        {{--};--}}

        {{--(function(d, s, id){--}}
            {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
            {{--if (d.getElementById(id)) {return;}--}}
            {{--js = d.createElement(s); js.id = id;--}}
            {{--js.src = "https://connect.facebook.net/en_US/sdk.js";--}}
            {{--fjs.parentNode.insertBefore(js, fjs);--}}
        {{--}(document, 'script', 'facebook-jssdk'));--}}
    {{--</script>--}}


    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function ($) {--}}

            {{--//FB.logout();--}}

            {{--// FB.getLoginStatus(function(response) {--}}
            {{--//--}}
            {{--//     if(response !== undefined && response !== null)--}}
            {{--//     {--}}
            {{--//         var userId = response.authResponse['userID'];--}}
            {{--//         var accessToken = response.authResponse['accessToken'];--}}
            {{--//--}}
            {{--//         //consultando dados do usuário--}}
            {{--//         axios.get(`https://graph.facebook.com/${userId}?access_token=${accessToken}`).then((res) => {--}}
            {{--//--}}
            {{--//             alert(`idFaceBook: ${res.data.id}, name: ${res.data.name}`);--}}
            {{--//--}}
            {{--//         })--}}
            {{--//     }--}}
            {{--// });--}}

            {{--setTimeout(function () {--}}

                {{--FB.getLoginStatus(function(response) {--}}

                    {{--//FB.logout();--}}

                    {{--if(response !== undefined && response !== null)--}}
                    {{--{--}}
                        {{--var userId = response.authResponse['userID'];--}}
                        {{--var accessToken = response.authResponse['accessToken'];--}}

                        {{--//consultadno nome dados do usuário--}}
                        {{--axios.get(`https://graph.facebook.com/${userId}?access_token=${accessToken}`).then((res) => {--}}
                            {{--console.log(res.data);--}}
                                {{--alert(`idFaceBook: ${res.data.id}, name: ${res.data.name}`);--}}

                        {{--})--}}
                    {{--}--}}
                {{--});--}}

            {{--},2000);--}}

        {{--});--}}
    {{--</script>--}}
{{--@stop--}}