<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusfactureRequest;
use App\Models\Statusfacture;
use Illuminate\Http\Request;

class StatusfactureController extends Controller
{
    public function init()
    {
        $statfac = Statusfacture::all();
        if ($statfac->isEmpty()) {
            $statfac = [];
            $statfac[] = ['libelle' => 'Solder'];
            $statfac[] = ['libelle' => 'Avancer'];
            $statfac[] = ['libelle' => 'A Payer'];
            foreach ($statfac as $value) {
                $statfacs = new Statusfacture();
                $statfacs->libelle = $value['libelle'];
                $statfacs->save();
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
        $datas = Statusfacture::all();
        if ($datas == null) {
            $datas = 0;
        }else{
            $datas = Statusfacture::paginate(5);
        }
        return view('statusfactures.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusfactures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusfactureRequest $request)
    {
        $data = new Statusfacture();
        $data->libelle = $request->input('libelle');
        $data->save();
        session()->flash('message', 'Ce état a été ajouter avec succèss!.');
        return redirect()->route('statusfactures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statusfacture  $statusfacture
     * @return \Illuminate\Http\Response
     */
    public function show(Statusfacture $statusfacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statusfacture  $statusfacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Statusfacture $statusfacture)
    {
        $data = Statusfacture::findOrFail($statusfacture->id);
        return view('statusfactures.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statusfacture  $statusfacture
     * @return \Illuminate\Http\Response
     */
    public function update(StatusfactureRequest $request, Statusfacture $statusfacture)
    {
        $data =  Statusfacture::findOrFail($statusfacture->id);
        $data->update([
            'libelle' => $request->input('libelle')
        ]);
        session()->flash('message', 'Ce état a été modifié avec succèss!.');
        return redirect()->route('statusfactures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statusfacture  $statusfacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statusfacture $statusfacture)
    {
        Statusfacture::destroy($statusfacture->id);
        session()->flash('message', 'Ce etat été supprimé avec succèss!.');
        return redirect()->route('statusfactures.index');
    }
}
