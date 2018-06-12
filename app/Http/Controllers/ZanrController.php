<?php

namespace App\Http\Controllers;

use App\Zanr;
use Illuminate\Http\Request;

class ZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vrste = Zanr::all();
        return view('zanr.index',['vrste' => $vrste]);
//        $vrste->all();
//        foreach ($vrste as $vrsta){
//            echo $vrsta->id.' - ';
//            echo $vrsta->naziv.'<br>';
        }
//        return 'popis';
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Novi slog';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'zahtjev';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function show(Zanr $zanr)
    {
        return 'prikaži';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function edit(Zanr $zanr)
    {
        return 'Izmjeni';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zanr $zanr)
    {
        return 'Ažuriraj';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zanr $zanr)
    {
        return 'Obriši';
    }
}
