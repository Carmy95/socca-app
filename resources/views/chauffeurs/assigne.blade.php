@extends('layouts.master')
@section('content')
<!-- Content Header (Page header file d'adrien) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Chauffeurs</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('chauffeurs.index') }}">Chauffeurs</a></li>
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
                                Chauffeur
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
                                    <form action="{{ route('assigne.cars.store') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" name="chauffeur" value="{{ $id }}">
                                            <label for="vehicule">Choisissez Le Véhicule</label>
                                            <select id="vehicule" name="vehicule" class="custom-select {{  $errors->first('vehicule','is-invalid') }}">
                                                @if ($datas == null)
                                                    <option> Aucun véhicule disponible pour l'instant</option>
                                                @else
                                                    @foreach ($datas as $item)
                                                        <option {{ old('vehicule') == $item['id'] ? 'selected' : '' }} value="{{ $item['id'] }}">{{ $item['nom'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            {!! $errors->first('vehicule','<span style="color: red">:message</span>') !!}
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
                                                    <a href="{{ route('chauffeurs.show',$id) }}" class="btn btn-danger">Retour</a>
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
