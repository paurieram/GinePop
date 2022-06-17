@extends('master')

@section('body')
<div class="container-flex row">
    <ol class="list-group col-2 mt-5 ms-5">
        @if (isset($id_category))
        <a class="fw-bold list-group-item list-group-item-action d-flex justify-content-between align-items-start" href="/items">
            <span class="w-100 text-center">Tots els productes</span>
        </a>
        @else
        <a class="fw-bold list-group-item list-group-item-action d-flex justify-content-between align-items-start list-group-item-success" href="/items">
            <span class="w-100 text-center">Tots els productes</span>
        </a>
        @endif
        @foreach ($categories as $category)
        @if (isset($id_category) && $category->id_category == $id_category)
        <a class="fw-bold list-group-item d-flex justify-content-between align-items-start list-group-item-success" href="/categories/{{$category->id_category}}">
            <span class="w-100 text-center text-success">{{ $category->name }}</span>
            <span class="badge bg-success rounded-pill">{{ $category->itemsxcat }}</span>
        </a>
        @else
        <a class="fw-bold list-group-item list-group-item-action d-flex justify-content-between align-items-start" href="/categories/{{$category->id_category}}">
            <span class="w-100 text-center">{{ $category->name }}</span>
            <span class="badge bg-success rounded-pill">{{ $category->itemsxcat }}</span>
        </a>
        @endif
        @endforeach
    </ol>
    <div class="col-lg-8 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1 my-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 col-10 col-md-12 col-lg-12 offset-1 offset-md-0 offset-lg-0 g-4">
            @foreach ($items as $item)
            <div class="col">
                <a href="/items/{{ $item->id }}">
                    <div class="card">
                        <img src="{{ $item->portrait->url }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h3 class="h3 card-title">{{ $item->price }} €</h3>
                            <p class="card-text">{{ $item->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>


</div>

@endsection