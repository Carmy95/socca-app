@extends('layouts.master')
@section('content')
<!-- Content Header (Page header file d'adrien) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Etats des Commandes</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('statuscommandes.index') }}">Etats des Commandes</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
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
                                ETATS DES COMMANDES
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" style="text-align: center">FORMULAIRE DE MODIFICATION</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('statuscommandes.update', $data->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="_method" value="PUT">
                                            <label for="poste">Intitulée de l'Etat</label>
                                            <input type="text" class="form-control {{  $errors->first('libelle','is-invalid') }}" id="poste" name="libelle" value="{{ $data->libelle }}" placeholder="INTITULEE DE L'ETAT DE LA COMMANDE">
                                            {!! $errors->first('libelle','<span style="color: red">:message</span>') !!}
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('statuscommandes.index') }}" class="btn btn-danger">Retour</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
