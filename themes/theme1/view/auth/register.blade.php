@extends('layout')
@section('title', 'Kayıt Ol')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="POST" novalidate class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="userName"
                                       class="form-label">@trans(E-Posta): </label>
                                <input type="email"
                                       class="form-control"
                                       id="userName"
                                       name="userName"
                                       placeholder="@trans(E-Posta)"
                                       required>
                                @getError('userName')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="nameSurname"
                                       class="form-label">@trans(Ad Soyad): </label>
                                <input type="text"
                                       class="form-control"
                                       id="nameSurname"
                                       name="nameSurname"
                                       placeholder="@trans(Ad Soyad)"
                                       required>
                                @getError('nameSurname')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="userPassword"
                                       class="form-label">@trans(Şifre):</label>
                                <input type="password"
                                       class="form-control"
                                       id="userPassword"
                                       name="userPassword"
                                       placeholder="･････････"
                                       required>
                                @getError('userPassword')
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    name="register"
                                    value="1"
                                    class="btn btn-success"> @trans(Kayıt Ol) </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection