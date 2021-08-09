<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonneRequest;
use App\Http\Requests\PersonneUpdateRequest;
use App\Models\Fonction;
use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexproprio()
    {
        $datas = Personne::where('fonction_id',1)->OrWhere('fonction_id',3)->paginate('10');
        return view('proprietaires.index',compact('datas'));
    }
    public function indexchauffeur()
    {
        $datas = Personne::where('fonction_id',2)->OrWhere('fonction_id',3)->paginate('10');
        return view('chauffeurs.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createproprio()
    {
        return view('proprietaires.create');
    }
    public function createchauffeur()
    {
        return view('chauffeurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request,int $fonction)
    {
        $data = new Personne();
        $data->nom = $request->input('nom');
        $data->prenom = $request->input('prenom');
        $data->sexe = $request->input('sexe');
        $data->tel = $request->input('tel');
        $data->mobile = $request->input('mobile');
        $data->email = $request->input('email');
        $data->date2naissance = $request->input('date2naissance');
        $data->fonction_id = $fonction;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $img = ['jpeg','png','jpg'];
            if (in_array($extension,$img)) {
                $filename = $file->store('avatars', 'public');
                $data->photo = $filename;
            }else {
                $data->photo = ($fonction==2) ? 'avatars/chauffeur.jpg' : 'avatars/proprio.png' ;
            }
        }else {
            $data->photo = ($fonction==2) ? 'avatars/chauffeur.jpg' : 'avatars/proprio.png' ;
        }
        $data->save();
    }
    public function storeproprio(PersonneRequest $request)
    {
        if ($request->input('chauffeur') == 'Oui') {
            $fonction = 3;
        }else {
            $fonction = 1;
        }
        $this->store($request,$fonction);
        session()->flash('message', 'Le Propriétaire a été enregistré avec success');
        return redirect()->route('proprio.index');
    }
    public function storechauffeur(PersonneRequest $request)
    {
        $fonction = 2;
        $this->store($request,$fonction);
        session()->flash('message', 'Le Chauffeur a été enregistré avec success');
        return redirect()->route('chauffeurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function showproprio(int $id)
    {
        $datas = Personne::findOrFail($id);
        return view('proprietaires.show',compact('datas'));
    }
    public function showchauffeur(int $id)
    {
        $datas = Personne::findOrFail($id);
        return view('chauffeurs.show',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function editproprio(int $id)
    {
        $data = Personne::findOrFail($id);
        return view('proprietaires.edit',compact('data'));
    }
    public function editchauffeur(int $id)
    {
        $data = Personne::findOrFail($id);
        return view('chauffeurs.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(PersonneUpdateRequest $request, Personne $personne)
    {
        $data =  Personne::findOrFail($personne->id);
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
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date2naissance' => $request->input('date2naisance'),
            'sexe' => $request->input('sexe'),
            'tel' => $request->input('tel'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
        ]);
        if ($data->fonction_id == 2) {
            session()->flash('message', 'Le Chauffeur a été Modifié avec success');
            return redirect()->route('chauffeurs.index');
        }else {
            session()->flash('message', 'Le Propriétaire a été Modfié avec success');
            return redirect()->route('proprio.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Personne::findOrFail($id);
        Personne::destroy($id);
        if ($data->fonction_id == 2) {
            session()->flash('message', 'Le Chauffeur a été supprimé avec succèss!.');
            return redirect()->route('chauffeurs.index');
        }else {
            session()->flash('message', 'Le Proprietaire a été supprimé avec succèss!.');
            return redirect()->route('proprio.index');
        }

    }
}
