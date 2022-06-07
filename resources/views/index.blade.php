@extends('master')

@section('body')
<div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2 my-5">
    <h1 class="d-flex justify-content-center h1"><b>Categoríes</b></h1>
    <div class="container mt-4">
        <div class="row row-cols-lg-2 row-cols-md-1 row-cols-1">
            @foreach ($categories as $categoria)
                <div class="col">
                    <a href="/categories/{{ $categoria->id }}">
                        <div class="card mb-3 ">
                            <img class="category-img" id="category-img" src="{{ $categoria->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title category-title" id="category-title">{{ $categoria->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection