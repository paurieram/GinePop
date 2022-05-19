@extends('master')

@section('body')
<div class="col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-10 offset-1 my-5" style="border-radius: 10px; background-color: white; box-shadow: 0px 0px 5px #000;">
    <h1 class="px-5 pt-4 h1"><b>Afegir producte</b></h1>
    <form action="{{ route('items.store') }}" runat="server" method="post" class="form-floating px-5 pt-4" enctype="multipart/form-data">
        @csrf
        <div class="row g-1">
            <div class="form-floating mb-3 col">
                <x-jet-input id="title" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="text" name="title" :value="old('name')" required autofocus autocomplete="title" />
                <x-jet-label for="title" value="{{ __('Títol') }}" />
            </div>
            <div class="form-floating mb-3 col">
                <x-jet-input id="preu" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="number" name="preu" :value="old('preu')" required autofocus autocomplete="preu" />
                <x-jet-label for="preu" value="{{ __('Preu') }}" />
            </div>
        </div>
        <div class="form-floating mb-3">
            <textarea id="description" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" name="description" required autofocus autocomplete="description"></textarea>
            <x-jet-label for="description" value="{{ __('Descripció') }}" />
        </div>
        <p class="mb-1">Afegeix les imatges desitjades (max 8)</p>
        <div class="mb-3">
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp0" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp1" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp2" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp3" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp4" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp5" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp6" style="visibility:hidden; position:absolute;" />
            <input accept="image/*" class="imgInp form-control" type='file' id="imgInp7" style="visibility:hidden; position:absolute;" />
        </div>
        <div id="blah" style="background-color: #e4ebe6; border-radius:10px;" class="my-3">
        </div>
        <div class="form-floating mb-3 col">
            <x-jet-input id="location" class="form-control" style="box-shadow: 0px 0px 3px #aaa !important" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
            <x-jet-label for="location" value="{{ __('Ubicació') }}" />
        </div>
        <div class="flex items-center justify-end my-4">
            <x-jet-button class="ml-4 nav-link btn btn-outline-success">
                {{ __('Register') }}
            </x-jet-button>
        </div>
    </form>
</div>
@endsection