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
                        <li class="breadcrumb-item"><a href="#">Tableau de Bord</a></li>
                        <li class="breadcrumb-item active">Vehicules</li>
                    </ol>
                </div><!-- /.col -->
            </div>
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
                            <div class="col-md-10 col-lg-10 col-sm-6">
                                <h3 class="card-title">
                                    LISTES DES Vehicules
                                </h3>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-6">
                                <a href="{{ route('cars.create') }}" class="btn btn-primary"> <i class="fas fa-plus"> </i> Ajouter un Vehicules </a>
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
                                        <th>Immatriculation</th>
                                        <th>Type de vehicule</th>
                                        <th colspan="4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($datas->isEmpty())
                                        <tr>
                                            <td colspan="7">Aucun Véhicule Enregistré pour l'instant.</td>
                                        </tr>
                                    @else
                                    @php
                                        $t = 0;
                                    @endphp
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $t += 1 }}</td>
                                                <td>{{ strtoupper($item->immatriculation) }}</td>
                                                <td> {{ ucwords($item->typevehicule->libelle) }} </td>
                                                <td>
                                                    <a href="{{ route('cars.show',$item->id) }}" class="btn btn-info" title="Plus d'information">
                                                        <i class="fas fa-plus"> </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('cars.edit',$item->id) }}" class="btn btn-primary" title="Modifier Le Véhicule">
                                                        <i class="fas fa-edit"> </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('cars.destroy',$item->id) }}"
                                                        onsubmit="return confirm('Etre vous sûre de vouloir supprimer ce Véhicule ?')"
                                                        method="post">
                                                        {{ csrf_field() }}{{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger" title="Supprimer Le Véhicule"><i class="fas fa-edit"> </i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                          </div>
                    </div>
                    <div class="card-footer clearfix">
                        @if ($datas->isNotEmpty())
                            {{ $datas->links('vendor.pagination.default') }}
                        @endif
                      </div>
                    <!-- /.card -->
                </div>

                {{-- <div class="modal fade" id="modal-default"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title"  id="staticBackdropLabel">FORMULAIRE D'AJOUT D'UN VEHICULE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="group-form">
                                            <input type="text" class="form-control form-control-border" placeholder="IMMATRICULATION DU VEHICULE">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" id="exampleSelectBorder">
                                              <option>TYPE DU VEHICULE :</option>
                                              <option>BEN</option>
                                              <option>FRIGO</option>
                                              <option value="">AUTRE</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control-border" id="exampleSelectBorder">
                                              <option>CE VEHICULE APPARTIENT A :</option>
                                              <option>Mr X.</option>
                                              <option>Mr Y.</option>
                                              <option value="">Mle Z.</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-form">
                                            <input type="text" class="form-control form-control-border" placeholder="TYPE DU VEHICULE">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary">Enregistrer le Client</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div> --}}
            </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
