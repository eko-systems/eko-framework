<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{themeAssets('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://pro.fontawesome.com/releases/v5.15.2/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>
@includeIf('header')

@if(cookie('msg'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                <strong class="me-auto">@trans(Sistem)</strong>
                <small>@trans(1 saniye önce)</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {!! rawurldecode(cookie('msg')) !!}
            </div>
        </div>
    </div>
@endif

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<!--
<script>
    !function () {
        "use strict";
        let t = document.querySelectorAll("form");
        Array.prototype.slice.call(t).forEach(function (e) {
            e.addEventListener("submit", function (t) {
                if(e.checkValidity() || t.preventDefault, t.stopPropagation){
                    e.classList.add("was-validated");
                }
            }, !1)
        })
    }();
</script>
-->
</body>
</html>