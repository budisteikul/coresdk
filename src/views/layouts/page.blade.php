@extends('coresdk::layouts.app')
@section('layout')
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $mainTitle }}</div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
</div>
@endsection