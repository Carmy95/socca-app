<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypevehiculeRequest;
use App\Models\Typevehicule;
use Illuminate\Http\Request;

class TypevehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Typevehicule::all();
        if ($datas == null) {
            $datas = 0;
        }else{
            $datas = Typevehicule::paginate(5);
        }
        return view('typevehicules.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typevehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypevehiculeRequest $request)
    {
        $data = new Typevehicule();
        $data->libelle = $request->input('libelle');
        $data->save();
        session()->flash('message', 'Cette catégorie de vehicule a été ajouter avec succèss!.');
        return redirect()->route('typevehicules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Typevehicule  $typevehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Typevehicule $typevehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Typevehicule  $typevehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Typevehicule $typevehicule)
    {
        $data = Typevehicule::findOrFail($typevehicule->id);
        return view('typevehicules.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Typevehicule  $typevehicule
     * @return \Illuminate\Http\Response
     */
    public function update(TypevehiculeRequest $request, Typevehicule $typevehicule)
    {
        $data =  Typevehicule::findOrFail($typevehicule->id);
        $data->update([
            'libelle' => $request->input('libelle')
        ]);
        session()->flash('message', 'Cette catégorie de vehicule a été modifié avec succèss!.');
        return redirect()->route('typevehicules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typevehicule  $typevehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typevehicule $typevehicule)
    {
        Typevehicule::destroy($typevehicule->id);
        session()->flash('message', 'Cette catégorie de vehicule a été supprimé avec succèss!.');
        return redirect()->route('typevehicules.index');
    }
}
