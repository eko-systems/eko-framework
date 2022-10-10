@extends('layout')
@section('title', trans('Giriş Yap'))
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
                                <label for="user_name"
                                       class="form-label">@trans(E-Posta): </label>
                                <input type="email"
                                       class="form-control"
                                       id="user_name"
                                       name="user_name"
                                       placeholder="@trans(E-Posta)"
                                       required>
                                @getError('user_name')
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="user_password"
                                       class="form-label">@trans(Şifre):</label>
                                <input type="password"
                                       class="form-control"
                                       id="user_password"
                                       name="user_password"
                                       placeholder="･････････"
                                       required>
                                @getError('user_password')
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    name="login"
                                    value="1"
                                    class="btn btn-success"> @trans(Giriş Yap) </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection