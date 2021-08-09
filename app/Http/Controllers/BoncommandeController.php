<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeRequest;
use App\Models\Boncommande;
use App\Models\Client;
use Illuminate\Http\Request;

class BoncommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Boncommande::paginate(10);
        return view('commandes.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('commandes.create',compact(['client']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommandeRequest $request)
    {
        $data = Boncommande::all();
        if ($data->isEmpty()) {
            $code = $this->numero();
        }else {
            do {
                $code = $this->numero();
                $t = 0;
                foreach ($data as $item) {
                    if ($code == $item->numero) {
                        $t +=1;
                    }else {
                        $t +=0;
                    }
                }
            } while ($t >= 1);
        }
        $data = new Boncommande;
        $data->numero = $code;
        $data->client_id = $request->input('client');
        $data->depart = $request->input('depart');
        $data->arrive = $request->input('arrive');
        $data->typevehicule = $request->input('camion');
        $data->marchandise = $request->input('marchandise');
        $data->datelivraison = $request->input('dateLivraison');
        $data->statuscommande_id = 1;
        $data->save();
        session()->flash('message', 'La commande a été enregistré avec success');
        return redirect()->route('commandes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boncommande  $boncommande
     * @return \Illuminate\Http\Response
     */
    public function show(Boncommande $boncommande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boncommande  $boncommande
     * @return \Illuminate\Http\Response
     */
    public function edit(Boncommande $boncommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boncommande  $boncommande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boncommande $boncommande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boncommande  $boncommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boncommande $boncommande)
    {
        //
    }
    public function numero()
    {
        $string = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $taille = strlen($string);
        $code = '';
        for ($i=0; $i <= 6; $i++) {
            $code .= $string[rand(1,$taille)];
        }
        return $code;
    }
}
