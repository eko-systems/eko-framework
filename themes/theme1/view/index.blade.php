@extends('layout')
@section('title', 'Anasayfa')
@section('content')
    @if(auth()->segment->get('user_name'))
        <div class="container">
            <div class="alert alert-success">@trans(Hoşgeldin), <b>{{auth()->segment->get('user_name')}}</b></div>
        </div>
    @endif
    <section class="mt-5">
        <div class="container">
            <div class="row">
                @if(auth()->segment->get('user_name'))
                    <div class="col-6">
                        <form method="post" novalidate class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="contentAdded" value="{{auth()->segment->get('user_name')}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="content-body"
                                               class="form-label">@trans(İçerik): </label>
                                        <textarea name="content"
                                                  id="content-body"
                                                  rows="3"
                                                  class="form-control"
                                                  placeholder="@trans(İçerik)" required></textarea>
                                        @getError('content')
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">@trans(Görsel):</label>
                                        <input type="file" id="image" name="content_image" class="form-control" required>
                                        @getError('content_image')
                                    </div>
                                </div>
                                <div class="col-12 text-left">
                                    <button class="btn btn-success"
                                            type="submit"
                                            name="addNewContent"
                                            value="1"> @trans(Ekle) </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                <div class="@if(auth()->segment->get('user_name')) col-6 @else col-12 @endif">
                    <div class="row">
                        @foreach($contents as $item)
                            <div class="col-12 mb-4">
                                <div class="card">
                                    @isset($item['contentImage'])
                                        <img src="{{siteUrl('upload/' . $item['contentImage'])}}" class="card-img-top" alt="...">
                                    @endisset
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item['contentAdded']}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ carbon()->parse($item['contentDate'])->diffForHumans() }}</h6>
                                        <p class="card-text">{{$item['content']}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
