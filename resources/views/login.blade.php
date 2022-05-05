@extends('master')

@section('body')
<div class="col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-10 offset-1 my-5" style="border: solid 2px #84c236; border-radius: 10px;">
    <div class="login">
        <h1 class="px-5 pt-4"><b>Inici de sessió</b></h1>
        <form method="post" class="px-5 pt-4" action="/login">
            @csrf
            <div class="form-floating mb-3">
                <input name="mail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contrasenya</label>
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn col-12 p-2 btn-outline-success">Enviar</button>
            </div>
            <div class="row mt-2 mb-4">
                <a href="#" class="text-start col forgetClk">He oblidat la contrasenya</a>
                <a href="#" class="text-end col registerClk">Registre't</a>
            </div>
        </form>
    </div>
    <div class="register" style="display:none;">
        <h1 class="px-5 pt-4"><b>Registre't</b></h1>
        <form method="post" class="px-5 pt-4" action="/users">
            @csrf
            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="floatingName" placeholder="exemple">
                <label for="floatingName">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input name="surname" type="text" class="form-control" id="floatingSurName" placeholder="exemple">
                <label for="floatingSurName">Cognom</label>
            </div>
            <div class="form-floating mb-3">
                <input name="mail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="row g-1">
                <div class="form-floating col">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contrasenya</label>
                </div>
                <div class="form-floating mb-3 col">
                    <input name="rePassword" type="password" class="form-control" id="floatingRePassword" placeholder="Password">
                    <label for="floatingRePassword">Confirmar</label>
                </div>
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn col-12 p-2 btn-outline-success">Enviar</button>
            </div>
            <div class="row mt-2 mb-4">
                <a href="#" class="text-start col forgetClk">He oblidat la contrasenya</a>
                <a href="#" class="text-end col loginClk">Iniciar sessió</a>
            </div>
        </form>
    </div>
    <div class="forget" style="display:none;">
        <h1 class="px-5 pt-4"><b>Recuperar contrasenya</b></h1>
        <form method="post" class="px-5 pt-4" action="/forgot">
            @csrf
            <div class="form-floating mb-3">
                <input name="usr" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn col-12 p-2 btn-outline-success">Enviar</button>
            </div>
            <div class="row mt-2 mb-4">
                <a href="#" class="text-start col loginClk">Iniciar sessió</a>
                <a href="#" class="text-end col registerClk">Registre't</a>
            </div>
        </form>
    </div>
</div>
@endsection