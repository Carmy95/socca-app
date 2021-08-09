<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatuscommandeRequest;
use App\Models\Statuscommande;
use Illuminate\Http\Request;

class StatuscommandeController extends Controller
{
    public function init()
    {
        $statcom = Statuscommande::all();
        if ($statcom->isEmpty()) {
            $statcom = [];
            $statcom[] = ['libelle'=> 'En Cours'];
            $statcom[] = ['libelle'=> 'Commande Valdée'];
            $statcom[] = ['libelle'=> 'Commande Refusée'];
            foreach ($statcom as $value) {
                $statcoms = new Statuscommande();
                $statcoms->libelle = $value['libelle'];
                $statcoms->save();
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
        $datas = Statuscommande::all();
        if ($datas == null) {
            $datas = 0;
        }else{
            $datas = Statuscommande::paginate(5);
        }
        return view('statuscommandes.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuscommandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatuscommandeRequest $request)
    {
        $data = new Statuscommande();
        $data->libelle = $request->input('libelle');
        $data->save();
        session()->flash('message', 'Ce état a été ajouter avec succèss!.');
        return redirect()->route('statuscommandes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statuscommande  $statuscommande
     * @return \Illuminate\Http\Response
     */
    public function show(Statuscommande $statuscommande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statuscommande  $statuscommande
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuscommande $statuscommande)
    {
        $data = Statuscommande::findOrFail($statuscommande->id);
        return view('statuscommandes.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statuscommande  $statuscommande
     * @return \Illuminate\Http\Response
     */
    public function update(StatuscommandeRequest $request, Statuscommande $statuscommande)
    {
        $data =  Statuscommande::findOrFail($statuscommande->id);
        $data->update([
            'libelle' => $request->input('libelle')
        ]);
        session()->flash('message', 'Ce état a été modifié avec succèss!.');
        return redirect()->route('statuscommandes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statuscommande  $statuscommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuscommande $statuscommande)
    {
        Statuscommande::destroy($statuscommande->id);
        session()->flash('message', 'Ce etat a été supprimé avec succèss!.');
        return redirect()->route('statuscommandes.index');
    }
}
