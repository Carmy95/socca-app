<?php

namespace App\Http\Controllers;

use App\Http\Requests\FonctionRequest;
use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function init()
    {
        $poste = Fonction::all();
        if ($poste->isEmpty()) {
            $poste = [];
            $poste[] = ['libelle'=> 'Proprietaire'];
            $poste[] = ['libelle'=> 'Chauffeur'];
            $poste[] = ['libelle'=> 'Proprietaire/Chauffeur'];
            foreach ($poste as $value) {
                $postes = new Fonction();
                $postes->libelle = $value['libelle'];
                $postes->save();
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Fonction::all();
        if ($datas == null) {
            $datas = 0;
        }else{
            $datas = Fonction::paginate(5);
        }
        return view('fonctions.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fonctions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FonctionRequest $request)
    {
        $data = new Fonction();
        $data->libelle = $request->input('libelle');
        $data->save();
        session()->flash('message', 'Le poste de travail a été ajouter avec succèss!.');
        return redirect()->route('fonctions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonction $fonction)
    {
        $data = Fonction::findOrFail($fonction->id);
        return view('fonctions.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(FonctionRequest $request, Fonction $fonction)
    {
        $data =  Fonction::findOrFail($fonction->id);
        $data->update([
            'libelle' => $request->input('libelle')
        ]);
        session()->flash('message', 'Le poste de travail a été modifié avec succèss!.');
        return redirect()->route('fonctions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonction $fonction)
    {
        if (in_array($fonction->id,[1,2,3])) {
            session()->flash('message', 'ce poste de travail ne peut pas être supprimé!.');
        }else {
            Fonction::destroy($fonction->id);
            session()->flash('message', 'Le poste de travail a été supprimé avec succèss!.');
        }
        return redirect()->route('fonctions.index');
    }
}
