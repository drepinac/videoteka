{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Upis novog filma')

@section('content_header')
<h2>Novi film</h2>
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
   <form  action="{{action('FilmoviController@store' )}}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="POST">

    <div class="row">
      <div class="col-md-2">
      {{-- Form::label('naslov','Naslov filma') --}}
       {{ 'Naslov filma' }}
      </div>
      <div class="col-md-1">
       <input type="text" maxlength="40" value="" name='naslov'>
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
            echo '<option value="'.$f->id.'">'.$f->naziv.'</option>';
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
                <option value="{{$i}}">{{$i}}</option>
              @endfor
          </select>
      </div>
¸    </div>
    <div class="row">
      <div class="col-md-2">
       {{-- Form::label('trajanje','Trajanje filma') --}}
       {{ 'Trajanje filma' }}
      </div>
      <div class="col-md-1">
        <input type="number" maxlength="4" value="" name='trajanje'>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
       {{-- Form::label('slika','Plakat') --}}
       {{ 'Plakat' }}
      </div>
      <div class="col-md-1">
        <input type="file" name="datoteka" value=""/><br/>
      </div>
    </div>
    <br>
    <div class="col-xs-6 col-sm-6 col-md-6">
      <input type="submit" class="btn btn-lg btn-success btn-block" value="Spremi film">
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

