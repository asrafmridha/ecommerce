@extends('backend.mastaring.master')

@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href=""> </a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
@include('backend.include.content')

@endsection

