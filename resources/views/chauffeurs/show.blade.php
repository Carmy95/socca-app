@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header file d'adrien) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Information du Chauffeur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('chauffeurs.index') }}">Chauffeurs</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div>
            @if (session()->has('message'))
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="alert alert-success" style="text-align: center;">
                            {{ session()->get('message') }}
                        </div>
                    </div>
                </div>
            @endif
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-6">
                                <h3 class="card-title">
                                    INFORMATION PERSONNELLE
                                </h3>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <a href="{{ route('chauffeurs.edit',$datas->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"> </i> Modifier les Informations
                                </a>
                                @if (!$datas->chauffeurvehicule)
                                    <a href="{{ route('chauffeurs.assigne',$datas->id) }}" class="btn btn-primary">
                                        <i class="fas fa-user"> </i> Assigner un Véhicule
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 35px; border-right: 1px solid #007bff">
                                    <p>{{ $datas->sexe == 'H' ? 'Mr' : 'Mlle/Mme' }}. {{ strtoupper($datas->nom) }} <span style="font-style: italic;">{{ ucwords($datas->prenom) }}</span></p>
                                    <p>Née le : {{ $datas->date2naissance->format('d/m/Y') }}</p>
                                    <p>Télephone : {{ $datas->tel }} {{ $datas->mobile ? ' / '.$datas->mobile : ''}}</p>
                                    <p>Adresse email : <span style="font-size: 25px; font-style: italic">{{ $datas->email ? $datas->email : 'Aucun' }}</span></p>
                                    <p>Proffession : {{ strtoupper($datas->fonction->libelle) }}</p>
                                    <p>Conduit le Véhicule immatriculé : <br>{{ ($datas->chauffeurvehicule) ? strtoupper($datas->chauffeurvehicule->vehicule->immatriculation) : 'Pas encore assigné'  }}</p>
                                </div>
                                <div class="col-md-6" style="font-size: 35px; text-align:center;padding-top:3%; border-left: 1px solid #007bff">
                                    <img src="{{ asset('storage/'.$datas->photo.'') }}" alt="photo{{ $datas->nom }}" style="border-radius: 100%; border: solid 4px #007bff;width:250px; height:250px; border-raduis:100%; ">
                                </div>
                            </div>
                          </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- <section class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-6">
                                <h3 class="card-title">
                                    INFORMATION COMMANDE
                                </h3>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-plus"> </i> Etablire une Commande
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right" style="margin-bottom: 2%">
                                    <div class="input-group input-group-md" style="width: 550px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Numero de Commande</th>
                                        <th>Status</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($bons->isEmpty())
                                        <tr>
                                            <td colspan="4">Aucune Commande Enregistré pour ce Chauffeur pour l'instant.</td>
                                        </tr>
                                    @else
                                        @php
                                            $t = 0;
                                        @endphp
                                        @foreach ($bons as $item)
                                            <tr>
                                                <td>{{ $t = $t + 1 }}</td>
                                                <td>{{ $item->numero }}</td>
                                                <td><span class="badge bg-warning">{{ $item->entite->libelle }} </span></td>
                                               <td>
                                                 <a href="{{ route('Chauffeurs.show',$item->id) }}" class="btn btn-info" title="Plus d'information">
                                                     <i class="fas fa-plus"> </i>
                                                 </a>
                                              </td>
                                                <td>
                                                    <a href="{{ route('Chauffeurs.edit',$item->id) }}" class="btn btn-primary" title="Modifier Le Chauffeur">
                                                        <i class="fas fa-edit"> </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                          </div>
                    </div>
                    <div class="card-footer clearfix">
                        @if ($bons->isNotEmpty())
                            {{ $bons->links('vendor.pagination.default') }}
                        @endif
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section> --}}
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
