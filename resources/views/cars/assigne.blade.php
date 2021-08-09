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
                    <li class="breadcrumb-item active">Assigner</li>
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
                                        <h3 class="card-title" style="text-align: center">FORMULAIRE D'ASSIGNATION</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('assigne.chauffeurs.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="vehicule" value="{{ $id }}">
                                            <label for="chauffeur">Choisissez Le Chauffeur</label>
                                            <select id="chauffeur" name="chauffeur" class="custom-select {{  $errors->first('chauffeur','is-invalid') }}">
                                                @if ($datas == null)
                                                    <option >Aucun Chauffeur disponible pour l'instant</option>
                                                @else
                                                    @foreach ($datas as $item)
                                                    <option {{ old('chauffeur') == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            {!! $errors->first('chauffeur','<span style="color: red">:message</span>') !!}
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                @if ($datas != null)
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Assigner</button>
                                                    </div>
                                                @endif
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('cars.show',$id) }}" class="btn btn-danger">Retour</a>
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
