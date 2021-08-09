@extends('layouts.master')
@section('content')
<!-- Content Header (Page header file d'adrien) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Propriétaire</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('proprio.index') }}">Propriétaire</a></li>
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
                                Propriétaire
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
                                    <form action="{{ route('proprio.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="name">Nom</label>
                                                        <input id="name" type="text" name="nom" class="form-control  {{  $errors->first('nom','is-invalid') }}" value="{{ old('nom') ? old('nom') : '' }}" placeholder="NOM DU PROPRIETAIRE">
                                                        {!! $errors->first('nom','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="group-form">
                                                        <label for="lastname">Prénoms</label>
                                                        <input id="lastname" type="text" name="prenom" class="form-control  {{  $errors->first('prenom','is-invalid') }}" value="{{ old('prenom') ? old('prenom') : '' }}" placeholder="PRENOMS DU PROPRIETAIRE">
                                                        {!! $errors->first('prenom','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="date">Date de naissance</label>
                                                        <input id="date" name="date2naissance" type="date" value="{{ old('date2naissance') ? old('date2naissance') : '' }}" class="form-control  {{  $errors->first('date2naissance','is-invalid') }}" class="form-control  {{  $errors->first('date2naissance','is-invalid') }}" placeholder="DATE DE NAISSANCE DU PROPRIETAIRE">
                                                        {!! $errors->first('date2naissance','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Genre</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input id="genreh" name="sexe" {{ old('sexe') == 'H' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('sexe','is-invalid') }}" value="H" type="radio">
                                                                <label class="form-check-label" for="genreh">Homme</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input id="genref" name="sexe" {{ old('sexe') == 'F' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('sexe','is-invalid') }}" value="F" type="radio">
                                                                <label class="form-check-label" for="genref">Femme</label>
                                                            </div>
                                                        </div>
                                                        {!! $errors->first('sexe','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Etre vous Chauffeur ?</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input id="chauffeurO" name="chauffeur" {{ old('chauffeur') == 'Oui' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('chauffeur','is-invalid') }}" value="Oui" type="radio">
                                                                <label class="form-check-label" for="chauffeurO">OUI</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input id="chauffeurN" name="chauffeur" {{ old('chauffeur') == 'Non' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('chauffeur','is-invalid') }}" value="Non" type="radio">
                                                                <label class="form-check-label" for="chauffeurN">NON</label>
                                                            </div>
                                                        </div>
                                                        {!! $errors->first('chauffeur','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="tel">Numéro Principal</label>
                                                        <input id="tel" name="tel" type="number" class="form-control  {{  $errors->first('tel','is-invalid') }}" value="{{ old('tel') ? old('tel') : '' }}" placeholder="N° Telephone DU PROPRIETAIRE">
                                                        {!! $errors->first('tel','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mobile">Numéro Secondaire</label>
                                                        <input id="mobile" type="number" name="mobile" class="form-control {{  $errors->first('mobile','is-invalid') }}" value="{{ old('mobile') ? old('mobile') : '' }}" placeholder="N° Mobile DU PROPRIETAIRE">
                                                        {!! $errors->first('mobile','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mail">Adresse email</label>
                                                        <input id="mail" type="email" name="email" class="form-control  {{  $errors->first('email','is-invalid') }}" value="{{ old('email') ? old('email') : '' }}" placeholder="Adresse Email DU PROPRIETAIRE">
                                                        {!! $errors->first('email','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="autre">Photo</label>
                                                    <div class="group-form">
                                                    <input id="autre" type="file" name="avatar" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('proprio.index') }}" class="btn btn-danger">Retour</a>
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






