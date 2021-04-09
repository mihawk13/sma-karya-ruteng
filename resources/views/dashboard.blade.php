@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Dashboard</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#"><span>speciality pages</span></a></li>
        <li class="active"><span>blank page</span></li>
    </ol>
</div>
@endsection
@section('content')
    <div class="">
        <p>{{ url()->current() . ' | ' . route('dashboard') }}</p>
    </div>
@endsection
