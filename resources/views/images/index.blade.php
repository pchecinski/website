@extends('layouts.layout')
@section('content')
<p class="message">{{ session('message') }}</p>
<div class="row">
@foreach($images as $image)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a href="{{ $image->src }}" class="fancybox" rel="ligthbox">
            <img src="{{ $image->src }}" class="zoom img-fluid" alt="{{ $image->alt }}">
        </a>
        <form action="/image/{{ $image->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete image</button>
        </form>
    </div>
@endforeach
</div>
@endsection