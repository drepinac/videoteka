<?php

namespace App\Http\Controllers;

use App\Filmovi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Validator;
use function redirect;
use function view;

class FilmoviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        $film = Filmovi::all();
        $film = Filmovi::all();
        return view('filmovi.index',['vrste' => $film]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//      $film = new Filmovi;
      return view('filmovi.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    { $rules = ['naslov' => 'required|max:191',
            'id_zanr' => 'required|numeric',
            'godina' => 'required|numeric',
            'trajanje' => 'required|numeric'
            ];
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('filmovi.create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            $film = new Filmovi;

            $film->id = Input::get('id');
            $film->naslov = Input::get('naslov');
            $film->id_zanr = Input::get('id_zanr');
            $film->godina = Input::get('godina');
            $film->trajanje = Input::get('trajanje');
//            $filmovi->slika = Input::get('slika');
            if (Input::hasFile('datoteka')){
            $file = Input::file('datoteka');
            echo $file->getClientOriginalName();
            $file->move('datoteka', $file->getClientOriginalName());
            $film->slika = $file->getClientOriginalName();}
        
        $film->save();
        Session::flash('message', 'Successfully updated zupanija!');
        unset($film);
        $film = Filmovi::all();
        return redirect()->route('filmovi.index',['vrste' => $film]);
//        return 'Upis';
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Filmovi  $filmovi
     * @return Response
     */
    public function show(Filmovi $filmovi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Filmovi  $filmovi
     * @return Response
     */
    public function edit(Filmovi $filmovi)
    {
      return view('filmovi.edit')->with('film',$filmovi);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Filmovi  $filmovi
     * @return Response
     */
    public function update(Request $request, Filmovi $filmovi)
    { $rules = ['id' => 'required|numeric',
            'naslov' => 'required|max:191',
            'id_zanr' => 'required|numeric',
            'godina' => 'required|numeric',
            'trajanje' => 'required|numeric'
            ];
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->route('filmovi.edit',['film' => $filmovi])
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
//                        return Redirect::to('zupanija/' . $id . '/edit')
//                            ->withErrors($validator)
//                            ->withInput(Input::except('password'));
        } else {
            // store
           // $zupanija = Zupanija::find($id);
            $filmovi->id = Input::get('id');
            $filmovi->naslov = Input::get('naslov');
            $filmovi->id_zanr = Input::get('id_zanr');
            $filmovi->godina = Input::get('godina');
            $filmovi->trajanje = Input::get('trajanje');
//            $filmovi->slika = Input::get('slika');
            if (Input::hasFile('datoteka')){  
            $file = Input::file('datoteka');
            //echo $file->getClientOriginalName();
            $file->move('datoteka', $file->getClientOriginalName());
            $film->slika = $file->getClientOriginalName();
            
      }
            $filmovi->save();

            // redirect
            Session::flash('message', 'Podatak je uspješno izmjenjen!');
            //return Redirect::to('zupanija');
            return redirect()->route('filmovi.index');
//            return redirect()->route('filmovi.edit', ['id' =>$filmovi->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Filmovi  $filmovi
     * @return Response
     */
    public function destroy(Filmovi $filmovi)
    {
        $filmovi->delete();

            // redirect
            Session::flash('message', 'Uspješno obrisan film!');
            //return Redirect::to('zupanija');
            return redirect()->route('filmovi.index');

    }
}
