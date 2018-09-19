
@extends('adminlte::page')


{{--@section('top_navbar_right')--}}

    {{--<ul class="nav navbar-nav">--}}
        {{--<li>--}}

        {{--</li>--}}
    {{--</ul>--}}

    {{--@parent--}}
{{--@endsection--}}

@push('css')
    @parent
    <style rel="stylesheet" href="{{asset('css/app.css')}}"></style>

@endpush

@section('content')
    <div id="app">
        @yield("content-app")
    </div>
@stop

@push('js')
    @parent
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endpush
