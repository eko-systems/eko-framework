@extends('layout')
@section('title', 'Profil')
@section('content')
    <section>
        <div class="container">
            <div class="card-body">
                <a href="javascript: void(0);" class="text-reset text-primary-hover small">hello@gmail.com</a>
                <hr>
                <form method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit" name="logout" value="1">
                        <i class="fad fa-sign-out-alt fa-fw me-2"></i>
                        <span>@trans(Çıkış Yap)</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection