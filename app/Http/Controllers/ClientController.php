<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Boncommande;
use App\Models\Client;
use App\Models\Entite;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Client::all();
        if ($datas == null) {
            $datas = 0;
        }else{
            $datas = Client::paginate(10);
        }
        return view('clients.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Entite::all();
        return view('clients.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        if ($request->input('entite') == 'autre' ) {
            if ($request->input('type') == null or $request->input('intitule') == null) {
                session()->flash('message', 'Desolée le client n\'a pas été enregistré');
                return redirect()->route('clients.index');
            }else{
                $entite = new EntiteController();
                $entite->store($request);
                $last = $entite->dernier();
                $id = $last->id;
            }
        }else {
            $id = $request->input('entite');
        }
        $data = new Client();
        $data->nom = $request->input('nom');
        $data->prenom = $request->input('prenom');
        $data->sexe = $request->input('sexe');
        $data->tel = $request->input('tel');
        $data->mobile = $request->input('mobile');
        $data->email = $request->input('email');
        $data->entite_id = $id;
        $data->save();
        session()->flash('message', 'Le client a été enregistré avec success');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $datas = Client::findOrFail($client->id);
        $bons = Boncommande::where('client_id',$client->id)->paginate(10);
        return view('clients.show',compact('datas','bons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data = Client::findOrFail($client->id);
        $datas = Entite::all();
        return view('clients.edit',compact('data','datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $data =  Client::findOrFail($client->id);
        $data->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'entite_id' => $request->input('entite')
        ]);
        session()->flash('message', 'Le client a été modifié avec success');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        session()->flash('message', 'Le Client a été supprimé avec succèss!.');
        return redirect()->route('clients.index');
    }
}
