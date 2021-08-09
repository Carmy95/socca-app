<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculeRequest;
use App\Models\Personne;
use App\Models\Typevehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Vehicule::paginate(10);
        return view('cars.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proprio = Personne::where('fonction_id',1)->Orwhere('fonction_id',3)->get();
        $data = Typevehicule::all();
        return view('cars.create',compact('proprio','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculeRequest $request)
    {
        $data = new Vehicule();
        $data->immatriculation = $request->input('imma');
        $data->typevehicule_id = $request->input('type');
        $data->personne_id = $request->input('proprio');
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $img = ['jpeg','png','jpg'];
            if (in_array($extension,$img)) {
                $filename = $file->store('avatars', 'public');
                $data->photo = $filename;
            }else {
                $data->photo = 'avatars/voiture.jpg';
            }
        }else {
            $data->photo = 'avatars/voiture.jpg';
        }
        $data->save();
        session()->flash('message', 'Le Véhicule a été enregistré avec success');
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $datas = Vehicule::findOrFail($id);
        return view('cars.show',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $cars = Vehicule::findOrFail($id);
        $proprio = Personne::where('fonction_id',1)->Orwhere('fonction_id',3)->get();
        $data = Typevehicule::all();
        return view('cars.edit',compact('proprio','data','cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculeRequest $request, int $id)
    {
        $data =  Vehicule::findOrFail($id);
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $img = ['jpeg','png','jpg'];
            if (in_array($extension,$img)) {
                $filename = $file->store('avatars', 'public');
                $data->photo = $filename;
                $data->update([
                    'photo' => $filename,
                ]);
            }
        }
        $data->update([
            'immatriculation' => $request->input('imma'),
            'typevehicule_id' => $request->input('type'),
            'personne_id' => $request->input('proprio'),
        ]);
        session()->flash('message', 'Le Véhicule a été Modfié avec success');
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Vehicule::destroy($id);
        session()->flash('message', 'Le Vehicule a été supprimé avec succèss!.');
        return redirect()->route('cars.index');
    }
}
