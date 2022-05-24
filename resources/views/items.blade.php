@extends('master')

@section('body')
<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-10 offset-1 my-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 col-10 col-md-12 col-lg-12 offset-1 offset-md-0 offset-lg-0 g-4">
        @foreach ($items as $item)
        
        <div class="col">
            <a href="/items/1">
                <div class="card">
                    <img src="{{ $item->portrait->url }}" class="card-img-top" alt="{{ $item->name}}">
                    <div class="card-body">
                        <h3 class="h3 card-title">{{ $item->price}} €</h3>
                        <p class="card-text">{{ $item->name}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        
    </div>
</div>
@endsection