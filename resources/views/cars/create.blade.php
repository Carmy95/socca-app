@extends('layouts.master')
@section('content')
<!-- Content Header (Page header file d'adrien) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vehicules</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cars.index') }}">Véhicules</a></li>
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
                                Véhicules
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" style="text-align: center">FORMULAIRE D'AJOUT</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label for="imma">N° d'immatriculation</label>
                                            <input type="text" class="form-control {{  $errors->first('imma','is-invalid') }}" value="{{ old('imma') ? old('imma') : '' }}" id="imma" name="imma" placeholder="N° d'Immatriculation">
                                            {!! $errors->first('imma','<span style="color: red">:message</span>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Type du Véhicule</label>
                                            <select id="type" name="type" class="custom-select {{  $errors->first('type','is-invalid') }}">
                                                @foreach ($data as $datas)
                                                <option {{ old('type') == $datas->id ? 'selected' : '' }} value="{{ $datas->id }}">{{ strtoupper($datas->libelle) }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('type','<span style="color: red">:message</span>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="proprio">Proprétaire du Véhicule</label>
                                            <select id="proprio" name="proprio" class="custom-select {{  $errors->first('proprio','is-invalid') }}">
                                                <option> CE VEHICULE APPARTIENT A :</option>
                                                @foreach ($proprio as $item)
                                                <option {{ old('proprio') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ strtoupper($item->nom).' '.ucwords($item->prenom) }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('proprio','<span style="color: red">:message</span>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo du Véhicule</label>
                                            <input id="photo" type="file" name="avatar" class="form-control">
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('cars.index') }}" class="btn btn-danger">Retour</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>


                    </div>
                </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
