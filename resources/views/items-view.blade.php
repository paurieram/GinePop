@extends('master')

@section('body')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-10 my-5">
        <div class="container mt-4">
            <div class="row row-cols-lg-1 row-cols-md-1 row-cols-1">
                <div class="col">
                    <div class="card mb-3 " style="border-radius:10px">
                        <div class="card-header d-flex">
                            <div class="card-user-detail">
                                <span id="seller" id_item="{{ $item->id }}" class="h3 card-title justify-content-start">{{ $item->usr }}@csrf</span>
                                @if ($item->sold == 1)
                                <span class="text-muted">{{ $item->sold }} Producte a la venda</span>
                                @else
                                <span class="text-muted">{{ $item->sold }} Productes a la venda</span>
                                @endif
                            </div>
                            @if(isset($user) && $user->id == $item->id_seller)
                            <button id="edit" class="ms-auto btn btn-sm btn-outline-primary my-auto" data-bs-toggle="modal" data-bs-target="#manageModal"><b>Editar</b></button>
                            <button id="delete" class="ms-2 btn btn-sm btn-outline-danger my-auto"><b>Esborrar</b></button>
                            <button id="sold" class="ms-2 btn btn-sm btn-outline-success my-auto"><b>Venut!</b></button>
                            <button class="ms-2 btn btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#contactModal">Perfil</button>
                            @elseif (isset($user))
                            <button class="ms-auto btn btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#contactModal">Perfil</button>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center bg-white">
                            <!-- Slideshow container -->
                            <div class="slideshow-container">
                                <!-- Full-width images with number and caption text -->
                                @foreach ($imatges as $imatge)
                                @if ($imatge->id_item == $item->id)
                                <div class="mySlides fade">
                                    <img src="{{$imatge->url}}" class="carrusel">
                                </div>
                                @endif
                                @endforeach
                                <!-- Next and previous buttons -->
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <br>
                        </div>
                        <div class="card-body outline">
                            <h5 class="h1 card-title product-title" id="product-price">{{ $item->price }} €</h5>
                            <h1 class="h2 card-title product-title" id="product-title">{{ $item->name }}</h1>
                            <p class="card-textproduct-description" id="product-state">Estat: {{ $item->state }}</p>
                            <p class="card-textproduct-description" id="product-category">Categoria: {{ $item->category_name }}</p>
                            <p class="card-textproduct-description" id="product-location">Localització: {{ $item->location }}</p>
                            <p class="card-textproduct-description" id="product-description">Descripció: {{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- alert -->
    <div class="ms-auto">
        <div style="padding: 5px; display: none;" id="error">
            <div id="inner-message" class="alert alert-warning fixed-top-right" role="alert"></div>
        </div>
    </div>
    @if (session('cont') && ($user->id == $item->id_seller))
    <script>
        $('#inner-message').html('Et recomanem que actualitzis les dades de contacte! Accedeix del teu <u class="perfil cursor-pointer"><b>perfil</b></u>');
        $('#error').show().delay(6000).fadeOut(1000);
        $('.perfil').on('click', function () {
            $('#contactModal').modal('show');
        });
    </script>
    @endif
    <!-- Contact Modal -->
    @if (isset($user))
    <div class="modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Perfil</h5>
                    @if(isset($user) && $user->id == $item->id_seller)
                    <button id="editprofile" type="button" class="btn btn-outline-success">Editar</button>
                    <button id="cancelprofile" type="button" class="btn btn-outline-success hidden edit-mini">Cancel·lar</button>
                    @endif
                </div>
                <div class="modal-body container-fluid">
                    <form action="/user/editprofile" class="row" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-6">
                            <img id="mini-avatar" src="{{ $usr->profile_photo_path }}" alt="Perfil" class="avatar-user ms-3">
                            <input id="mini-avatar-input" type="file" name="profile_photo_path" class="hidden edit-mini form-control mt-1">
                        </div>
                        <div class="col-6">
                            <div class="h3"><b>{{ $usr->name }}</b></div>
                            <hr>
                            <textarea id="descriptionf" class="form-control customshadow edit-mini hidden" name="description" ></textarea>
                            @if ($usr->description == null)
                            <div id="descriptionm">No s'ha proporcionat informació</div>
                            @else
                            <div id="descriptionm" class="my-2">{{ $usr->description }}</div>
                            @endif
                            <hr>
                            <div class="h6 mt-2"><b>Email de contacte</b></div>
                            <div class="mb-2">{{ $usr->email }}</div>
                            <hr>
                            <div class="h6 mt-2"><b>Altres vies de contacte</b></div>
                            @if($usr->instagram == null)
                            <div>Instagram: <input class="customimput form-control customshadow hiden edit-mini" id="instagramf" type="text" name="instagram" value=""><span id="instagramm">---</span></div>
                            @else
                            <div>Instagram: <input class="customimput form-control customshadow hiden edit-mini" id="instagramf" type="text" name="instagram" value=""><span id="instagramm">{{ $usr->instagram }}</span></div>
                            @endif
                            @if($usr->whatsapp == null)
                            <div>Whatsapp: <input class="customimput form-control customshadow hiden edit-mini" id="whatsappf" type="number" name="whatsapp" value=""><span id="whatsappm">---</span></div>
                            @else
                            <div>Whatsapp: <input class="customimput form-control customshadow hiden edit-mini" id="whatsappf" type="number" name="whatsapp" value=""><span id="whatsappm">{{ $usr->whatsapp }}</span></div>
                            @endif
                            @if($usr->o_contact == null)
                            <div>Opcional: <input class="customimput form-control customshadow hiden edit-mini" id="o_contactf" type="text" name="o_contact" value=""><span id="o_contactm">---</span></div>
                            @else
                            <div>Opcional: <input class="customimput form-control customshadow hiden edit-mini" id="o_contactf" type="text" name="o_contact" value=""><span id="o_contactm">{{ $usr->o_contact }}</span></div>
                            @endif
                            <div class="flex items-center justify-end mt-2 hidden edit-mini">
                                <input type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" data-bs-dismiss="modal">Tancar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Manage Modal -->
    <div class="modal" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageModalLabel">Gestionar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <form action="/items/{{$item->id}}" runat="server" method="post" class="form-floating px-5 pt-4" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-1">
                            <div class="form-floating mb-3 col">
                                <x-jet-input id="name" class="form-control customshadow" type="text" name="name" value="{{$item->name}}" required autofocus autocomplete="name" />
                                <x-jet-label for="name" value="{{ __('Títol') }}" />
                            </div>
                            <div class="form-floating mb-3 col">
                                <x-jet-input id="price" class="form-control customshadow" type="number" name="price" value="{{$item->price}}" required autofocus autocomplete="price" />
                                <x-jet-label for="price" value="{{ __('Preu') }}" />
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select customshadow" id="id_category" name="id_category" aria-label="Floating label select example">
                                <option selected>Selecciona categoria</option>
                                    @foreach ($categories as $category)
                                        @if($category->id == $item->id_category)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            <label for="id_category">Categoria</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea id="description" class="form-control customshadow" name="description" required autofocus autocomplete="description">{{$item->description}}</textarea>
                            <x-jet-label for="description" value="{{ __('Descripció') }}" />
                        </div>
                        <p class="mb-1">Afegeix les imatges desitjades (max. 8)</p>
                        <div class="mb-3">
                            <input accept="image/*" class="imgInp form-control" type='file' name="url0" id="imgInp0" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url1" id="imgInp1" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url2" id="imgInp2" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url3" id="imgInp3" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url4" id="imgInp4" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url5" id="imgInp5" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url6" id="imgInp6" style="visibility:hidden; position:absolute;" />
                            <input accept="image/*" class="imgInp form-control" type='file' name="url7" id="imgInp7" style="visibility:hidden; position:absolute;" />
                        </div>
                        <div id="blah" style="background-color: #e4ebe6; border-radius:10px;" class="my-3">
                        </div>
                        <div class="form-floating mb-3 col">
                            <x-jet-input id="location" class="form-control customshadow" type="text" name="location" value="{{$item->location}}" required autofocus autocomplete="location" />
                            <x-jet-label for="location" value="{{ __('Ubicació') }}" />
                        </div>
                        <div class="flex items-center justify-end my-4">
                            <x-jet-button class="ml-4 nav-link btn btn-outline-success">
                                {{ __('Guardar canvis') }}
                            </x-jet-button>
                        </div>
                        <input type="hidden" name="id_seller" value="{{Auth::user()->id}}">
                        <input type="hidden" name="op" value="fm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" data-bs-dismiss="modal">Tancar</button>
                </div>
            </div>
        </div>
    </div> 
    @endif
</div>
@endsection