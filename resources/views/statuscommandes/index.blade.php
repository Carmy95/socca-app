@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header file d'adrien) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Les Etats des Commandes</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                        <li class="breadcrumb-item active">Etat des commandes</li>
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
                                    LISTE DES ETATS DES COMMANDES
                                </h3>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                <a href="{{ route('statuscommandes.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"> </i> Ajouter un Etat de commande
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
                                        <th>Intitul??</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($datas->isEmpty())
                                        <tr>
                                            <td colspan="7">Aucun Etat de Commande Enregistr??e pour l'instant.</td>
                                        </tr>
                                    @else
                                        @foreach ($datas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->libelle }}</td>
                                                <td>
                                                    <a href="{{ route('statuscommandes.edit',$item->id) }}" class="btn btn-primary" title="Modifier L'Etat de commande">
                                                        <i class="fas fa-edit"> </i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('statuscommandes.destroy',$item->id) }}"
                                                        onsubmit="return confirm('Etre vous s??re de vouloir supprimer ce ??tat de commande ?')"
                                                        method="post">
                                                        {{ csrf_field() }}{{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger" title="Supprimer L'Etat de Commande"><i class="fas fa-edit"> </i></button>
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
