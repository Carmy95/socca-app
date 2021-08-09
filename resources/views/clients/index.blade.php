@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header file d'adrien) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                        <li class="breadcrumb-item active">Clients</li>
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
                                    LISTE DES CLIENTS
                                </h3>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <a href="{{ route('clients.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"> </i> Ajouter un client
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
                                        <th>Nom</th>
                                        <th>Prénoms</th>
                                        <th>Telphone</th>
                                        <th>Entité</th>
                                        <th colspan="3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($datas->isEmpty())
                                        <tr>
                                            <td colspan="8">Aucun Client Enregistré pour l'instant.</td>
                                        </tr>
                                    @else
                                    @php
                                        $t = 0;
                                    @endphp
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $t += 1 }}</td>
                                                <td>{{ strtoupper($item->nom) }}</td>
                                                <td> {{ ucwords($item->prenom) }} </td>
                                                <td>{{ $item->tel }}</td>
                                                <td><span class="badge bg-warning">{{ $item->entite->libelle }} </span></td>
                                               <td>
                                                 <a href="{{ route('clients.show',$item->id) }}" class="btn btn-info" title="Plus d'information">
                                                     <i class="fas fa-plus"> </i>
                                                 </a>
                                              </td>
                                                <td>
                                                    <a href="{{ route('clients.edit',$item->id) }}" class="btn btn-primary" title="Modifier Le Client">
                                                        <i class="fas fa-edit"> </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('clients.destroy',$item->id) }}"
                                                        onsubmit="return confirm('Etre vous sûre de vouloir supprimer ce client ?')"
                                                        method="post">
                                                        {{ csrf_field() }}{{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger" title="Supprimer Le Client"><i class="fas fa-edit"> </i></button>
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
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
