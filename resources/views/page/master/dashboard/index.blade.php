@extends('template/base')
@section('title','Dashboard')
@section('container')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hello, {{ $admin['name'] }}</h1>
</div>
<iframe width="600" height="450" src="https://analytics.google.com/analytics/web/?authuser=1#/p274024663/realtime/overview?params=_u..nav%3Ddefault" frameborder="0" style="border:0" allowfullscreen></iframe>
@endsection