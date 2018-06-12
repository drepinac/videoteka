
@extends('adminlte::page')

@section('title', 'VIDEOTEKA')

@section('content_header')
        <h1>Videoteka - ALGEBAR</h1>
@stop

@section('content')

<div style="text-align: center"  class="col-md-12 align-self-center">

<?php
    $imena = App\Filmovi::all();
    $slova = [];
    foreach($imena as $ime){
        array_push($slova, substr($ime->naslov,0,1));
    }
    for ($i = 65; $i <= 90; $i++) {
        if (in_array(chr($i),$slova)) {
           echo ' | <a href="home?slovo='.chr($i).'">'.chr($i).'</a>';
        } else {
           echo ' | '.chr($i);
        }
    }
?>
        <br>
<table align="center" width="90%">
<tbody>

<?php
    use App\Filmovi;
    if (isset($_GET['slovo'])) {
        $upit = $_GET['slovo'].'%';
    } else {$upit = '';}

    $query = Filmovi::where('naslov', 'like' ,$upit)->get();

    foreach ($query as $f) {
        echo "<tr>";
        echo '<td><br><img src=images/'.$f->slika.' width=10% height=10%><br>'.$f->naslov.'('.$f->godina.') <br>Trajanje: '.$f->trajanje.' min</td></tr>';
    }
    ?>
</tbody>
</table>

</div>
@stop