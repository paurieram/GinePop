@extends('master')

@section('body')
<div class="row">
    <div class="col-lg-2 offset-lg-1 col-md-3 offset-md-1 col-4 offset-1 my-5">
        <div class="col-lg-12 col-md-12 col-12">
            <section class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4" id="CreateCategory">Crear Categoria</a>
            </section>
            <section class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4" id="CreateUser">Crear Usuari</a>
            </section>
            <section class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4" id="ShowUsers">Gestionar Usuaris</a>
            </section>
            <section class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4" id="ShowItems">Gestionar Items</a>
            </section>
            <section class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4" id="ShowItems">Estadístiques</a>
            </section>
        </div>
    </div>  
    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-5 offset-1 my-5">
        <section id="content" class="white-box-shadow rounded d-flex justify-content-center">
            <div id="menucreatecategory">
                <div class="h4 mt-2">Crear Categoria</div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Nom de la Categoria</label>
                    <input class="form-control" type="text" name="name" id="name">
                    <label for="image">Imatge (opcional)</label>
                    <input class="form-control" type="file" name="image" id="image">
                    <input type="submit" value="Crear">
                </form>
            </div>
        </section>
    </div>
</div>
@endsection