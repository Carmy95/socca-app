<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChauffeurvehiculeRequest;
use App\Models\Chauffeurvehicule;
use App\Models\Personne;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ChauffeurvehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chauffeurs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storevehicule(ChauffeurvehiculeRequest $request)
    {
        dd('ok');
        $data = new Chauffeurvehicule;
        $data->vehicule_id = $request->input('vehicule');
        $data->personne_id = $request->input('chauffeur');
        $data->save();
        session()->flash('message', 'Le Vehicule a été assigné au chauffeur avec succèss!.');
        return redirect()->route('cars.show',$request->input('vehicule'));

    }
    public function storechauffeur(ChauffeurvehiculeRequest $request)
    {
        dd('ok');
        $data = new Chauffeurvehicule;
        $data->vehicule_id = $request->input('vehicule');
        $data->personne_id = $request->input('chauffeur');
        $data->save();
        session()->flash('message', 'Le Chauffeur a été assigné au véhicule avec succèss!.');
        return redirect()->route('chauffeurs.show',$request->input('chauffeur'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chauffeurvehicule  $chauffeurvehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Chauffeurvehicule $chauffeurvehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chauffeurvehicule  $chauffeurvehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Chauffeurvehicule $chauffeurvehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chauffeurvehicule  $chauffeurvehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chauffeurvehicule $chauffeurvehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chauffeurvehicule  $chauffeurvehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chauffeurvehicule $chauffeurvehicule)
    {
        //
    }
    public function assignechauffeur($id)
    {
        $data = Personne::where('fonction_id',2)->OrWhere('fonction_id',3)->get();
        $tab = Chauffeurvehicule::all();
        $datas = array();$tabs = array();
        if ($tab->isNotEmpty()) {
            foreach ($tab as $key) {
                $tabs[] = [
                    'personne' => $key->personne_id,
                ];
            }
        }
        $t = 0;
        foreach ($data as $item) {
            foreach ($tabs as $value) {
                if ($item->id == $value['personne']) {
                    $t = $t + 1;
                }
            }
            if ($t == 0) {
                $datas[] = [
                'id' => $item->id,
                'nom' => strtoupper($item->nom).' '.ucwords($item->prenom),
                ];
            }
            $t = 0;
        }
        return view('cars.assigne',compact('datas','id'));
    }
    public function assignevehicule(int $id)
    {
        $data = Vehicule::all();
        $tab = Chauffeurvehicule::all();
        $datas = array();$tabs = array();
        if ($tab->isNotEmpty()) {
            foreach ($tab as $key) {
                $tabs[] = [
                    'vehicule' => $key->vehicule_id,
                ];
            }
        }
        $t = 0;
        foreach ($data as $item) {
            foreach ($tabs as $value) {
                if ($item->id == $value['vehicule']) {
                    $t = $t + 1;
                }
            }
            if ($t == 0) {
                $datas[] = [
                'id' => $item->id,
                'nom' => strtoupper($item->immatriculation),
                ];
            }
            $t = 0;
        }
        return view('chauffeurs.assigne',compact('datas','id'));
    }
}
