{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Filmovi Admin panel')

@section('content_header')
<h2>Pregled filmova</h2>
@stop

@section('content')
@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<div class="col-xs-2 col-sm-2 col-md-2">
  <a href="filmovi/create"> <button type="button" class="btn btn-lg btn-adn btn-block">Novi film</button> </a>
<br/>
</div>

<table width="100%" border="1">
    <thead>
    <th>Slika</th>
    <th>Naslov</th>
    <th>Godina</th>
    <th>Trajanje</th>
    <th>Akcija</th>
    </thead>
    <tbody>
    @foreach ($vrste as $z)
    <tr>
        <td width=70px, height=150px><img style="display:block;" src="images/{{ $z->slika }}" height=100%></td>
        <td>{{ $z->naslov }}</td>
        <td>{{ $z->godina }}</td>
        <td>{{ $z->trajanje }}</td>
        <td align="center">[ <a href="filmovi/{{ $z->id }}/edit"> izmjeni </a> ]</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

