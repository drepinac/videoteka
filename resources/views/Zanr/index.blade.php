{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Žanrovi Admin panel')

@section('content_header')
<h2>Žanrovi</h2>
@stop

@section('content')
<table border="1">
    @foreach ($vrste as $z)
    <tr>
        <td width="50px">{{ $z->id }}</td>
        <td>{{ $z->naziv }}</td>
    </tr>
    @endforeach
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

