@extends('layouts.admin')

@section('title', 'Anasayfa')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12"><h3 class="mb-0">Anasayfa</h3></div>
    </div>
</div>
@endsection

@section('content')
    <!-- Dashboard content can go here -->
    <div class="card">
        <div class="card-body">
            Hoşgeldiniz, {{ Auth::user()->name ?? 'Admin' }}!
        </div>
    </div>
@endsection
