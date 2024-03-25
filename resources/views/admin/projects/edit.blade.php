@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1 class="py-3">Modifica</h1>
    <div>
      <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna alla lista</a>
    </div>
</div>


@include('includes.layouts.form')

@endsection
