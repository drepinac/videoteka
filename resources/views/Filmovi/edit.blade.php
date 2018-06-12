{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Ažuriranje filmova')

@section('content_header')
<h2>Ažuriranje filmova</h2>
<h1>Uređivanje filma: {{ $film->naslov}}</h1>
@stop

@section('content')
@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
@if($errors->has('naslov') | $errors->has('trajanje') | $errors->has('id') | $errors->has('id_zanr') | $errors->has('godina') )
   @foreach ($errors->all() as $error)
      <div class="alert alert-error">{{ $error }}</div>
  @endforeach
@endif

<br>

<hr>
<div>
  <!-- TODO: pogledaj verziju 5.5 -->

  <form  action="{{action('FilmoviController@update', $film->id)}}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="row">
      <div class="col-md-2">
      {{-- Form::label('id','Šifra filma') --}}
      {{ 'Šifra filma' }}
      </div>
      <div class="col-md-1">
        <input readonly type="number" value="{{ $film->id}}" name='id'>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      {{-- Form::label('naslov','Naslov filma') --}}
       {{ 'Naslov filma' }}
      </div>
      <div class="col-md-1">
       <input type="text" maxlength="40" value="{{ $film->naslov}}" name='naslov'>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      {{-- Form::label('id_zanr','Žanr') --}}
       {{ 'Žanr' }}
      </div>

      <div class="col-md-1">
        <select name="id_zanr">
    <?php 
          use App\Zanr;
          $query = Zanr::all();
          foreach ($query as $f) {
            if ($film->id_zanr == $f->id) {
                echo '<option value="'.$f->id.'" selected="selected">'.$f->naziv.'</option>';
            } else {
                echo '<option value="'.$f->id.'">'.$f->naziv.'</option>';
            }
          }
    ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        {{-- Form::label('godina','Godina') --}}
        {{ 'Godina' }}
      </div>
      <div class="col-md-1">
          <select name="godina">
              @for ($i = 1900; $i <= date('Y'); $i++)
                @if ($film->godina == $i) 
                <option value="{{$i}}" selected="selected">{{$i}}</option>
                @else
                  <option value="{{$i}}">{{$i}}</option>
                @endif
              @endfor
          </select>
<!--          <input type="number" maxlength="4" value="{{ $film->godina}}" name='godina'>-->

      </div>
¸    </div>
    <div class="row">
      <div class="col-md-2">
       {{-- Form::label('trajanje','Trajanje filma') --}}
       {{ 'Trajanje filma' }}
      </div>
      <div class="col-md-1">
        <input type="number" maxlength="4" value="{{ $film->trajanje}}" name='trajanje'>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
       {{-- Form::label('slika','Plakat') --}}
       {{ 'Plakat' }}
      </div>
      <div class="col-md-1">
        <input type="text" maxlength="40" value="{{ $film->slika}}" name='slika'>
        <input type="file" name="datoteka" value=""/><br/>
      </div>
    </div>
    <br>
    <div class="col-xs-2 col-sm-2 col-md-2">
      <input type="submit" class="btn btn-lg btn-success btn-block" value="Spremi izmjene">
    </div>
  </form>

  <form action="{{action('FilmoviController@destroy', $film->id)}}" method="post">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="DELETE">  
    <div class="col-xs-2 col-sm-2 col-md-2">
      <input type="submit" class="btn btn-lg btn-warning btn-block" value="Obriši film">
    </div>
  </form>

</div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop

