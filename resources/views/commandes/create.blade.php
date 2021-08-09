@extends('layouts.master')
@section('content')
<!-- Content Header (Page header file d'adrien) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Commandes</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('commandes.index') }}">Commandes</a></li>
                    <li class="breadcrumb-item active">Ajouter</li>
                </ol>
            </div><!-- /.col -->
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-6">
                            <h3 class="card-title">
                                COMMANDES
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" style="text-align: center">FORMULAIRE D'AJOUT</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('commandes.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="client">Clients</label>
                                                        <select id="client" name="client" class="custom-select {{  $errors->first('client','is-invalid') }}">
                                                            @foreach ($client as $item)
                                                            <option {{ old('client') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ strtoupper($item->nom).' '.ucwords($item->prenom) }}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('client','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="group-form">
                                                        <label for="depart">Ville de Départ</label>
                                                        <input id="depart" type="text" name="depart" class="form-control  {{  $errors->first('depart','is-invalid') }}" value="{{ old('depart') ? old('depart') : '' }}" placeholder="Lieu où le camion doit aller recupéré la marchandise (Ville,commune,quatier)">
                                                        {!! $errors->first('depart','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="group-form">
                                                        <label for="arrive">Ville d'Arrivée</label>
                                                        <input id="arrive" type="text" name="arrive" class="form-control  {{  $errors->first('arrive','is-invalid') }}" value="{{ old('arrive') ? old('arrive') : '' }}" placeholder="Lieu où le camion doit aller livré la marchandise (Ville,commune,quatier)">
                                                        {!! $errors->first('arrive','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="marchandise">Marchandise</label>
                                                        <input id="marchandise" name="marchandise" type="text" class="form-control  {{  $errors->first('marchandise','is-invalid') }}" value="{{ old('marchandise') ? old('marchandise') : '' }}" placeholder="Le nom de la marchandise à transporter">
                                                        {!! $errors->first('marchandise','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="camion">Type de Camion souhaité</label>
                                                        <input id="camion" name="camion" type="text" class="form-control  {{  $errors->first('camion','is-invalid') }}" value="{{ old('camion') ? old('camion') : '' }}" placeholder="Le type de camion souhaité">
                                                        {!! $errors->first('camion','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="dateLivraison">Date de livraison souhaité</label>
                                                        <input id="dateLivraison" name="dateLivraison" type="date" class="form-control  {{  $errors->first('dateLivraison','is-invalid') }}" value="{{ old('dateLivraison') ? old('dateLivraison') : '' }}" placeholder="">
                                                        {!! $errors->first('dateLivraison','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="tel">Numéro Principal</label>
                                                        <input id="tel" name="tel" type="number" class="form-control  {{  $errors->first('tel','is-invalid') }}" value="{{ old('tel') ? old('tel') : '' }}" placeholder="N° Telephone DU CLIENT">
                                                        {!! $errors->first('tel','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mobile">Numéro Secondaire</label>
                                                        <input id="mobile" type="number" name="mobile" class="form-control {{  $errors->first('mobile','is-invalid') }}" value="{{ old('mobile') ? old('mobile') : '' }}" placeholder="N° Mobile DU CLIENT">
                                                        {!! $errors->first('mobile','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mail">Adresse email</label>
                                                        <input id="mail" type="email" name="email" class="form-control  {{  $errors->first('email','is-invalid') }}" value="{{ old('email') ? old('email') : '' }}" placeholder="Adresse Email DU CLIENT">
                                                        {!! $errors->first('email','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="type">Type de l'entité</label>
                                                        <select id="type" name="type" class="custom-select">
                                                            <option>Vous Etre :</option>
                                                            <option value="Entreprise">Une Entreprise</option>
                                                            <option value="Cooperative">Une Coopérative</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="autre">Intitulée de la cooperative ou de l'entreprise</label>
                                                    <div class="group-form">
                                                        <input id="autre" type="text" name="intitule" class="form-control" placeholder="NOM DE LA COOPERATIVE OU DE L'ENTREPRISE">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('commandes.index') }}" class="btn btn-danger">Retour</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                            </div>
                        </div>


                    </div>
                </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection






