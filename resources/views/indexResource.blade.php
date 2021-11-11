@php
  use App\Http\Controllers\IndexController;
@endphp

@extends ('base')


@section('css')
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
@endsection

@section('masthead')
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="table-responsive">
    			<div class="table-wrapper">
    				@yield('inside')
    			</div>
    		</div>        
        </div>
    </header>
@endsection