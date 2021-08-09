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
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
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
                                CLIENTS
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
                                    <form action="{{ route('clients.update', $data->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <label for="name">Nom</label>
                                                        <input id="name" type="text" name="nom" class="form-control  {{  $errors->first('nom','is-invalid') }}" value="{{ old('nom') ? old('nom') : $data->nom }}" placeholder="NOM DU CLIENT">
                                                        {!! $errors->first('nom','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="group-form">
                                                        <label for="lastname">Prénoms</label>
                                                        <input id="lastname" type="text" name="prenom" class="form-control  {{  $errors->first('prenom','is-invalid') }}" value="{{ old('prenom') ? old('prenom') : $data->prenom }}" placeholder="PRENOMS DU CLIENT">
                                                        {!! $errors->first('prenom','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Genre</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @php old('sexe') ? $t = old('sexe') : $t = $data->sexe @endphp
                                                            <div class="form-check">
                                                                <input id="genreh" name="sexe" {{ $t == 'H' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('sexe','is-invalid') }}" value="H" type="radio">
                                                                <label class="form-check-label" for="genreh">Homme</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input id="genref" name="sexe" {{ $t == 'F' ? 'checked' : '' }} class="form-check-input  {{  $errors->first('sexe','is-invalid') }}" value="F" type="radio">
                                                                <label class="form-check-label" for="genref">Femme</label>
                                                            </div>
                                                        </div>
                                                        {!! $errors->first('sexe','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="entite">Entité</label>
                                                        <select id="entite" name="entite" class="custom-select {{  $errors->first('entite','is-invalid') }}">
                                                            @php old('entite') ? $t = old('entite') : $t = $data->entite_id @endphp
                                                            @foreach ($datas as $item)
                                                                <option {{ $t == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->libelle }}</option>
                                                            @endforeach
                                                        </select>
                                                        {!! $errors->first('entite','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="tel">Numéro Principal</label>
                                                        <input id="tel" name="tel" type="number" class="form-control  {{  $errors->first('tel','is-invalid') }}" value="{{ old('tel') ? old('tel') : $data->tel }}" placeholder="N° Telephone DU CLIENT">
                                                        {!! $errors->first('tel','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mobile">Numéro Secondaire</label>
                                                        <input id="mobile" type="number" name="mobile" class="form-control {{  $errors->first('mobile','is-invalid') }}" value="{{ old('mobile') ? old('mobile') : $data->mobile }}" placeholder="N° Mobile DU CLIENT">
                                                        {!! $errors->first('mobile','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="group-form">
                                                        <label for="mail">Adresse email</label>
                                                        <input id="mail" type="email" name="email" class="form-control  {{  $errors->first('email','is-invalid') }}" value="{{ old('email') ? old('email') : $data->email }}" placeholder="Adresse Email DU CLIENT">
                                                        {!! $errors->first('email','<span style="color: red">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </div>
                                                <div class="col-md-6" style="text-align: right">
                                                    <a href="{{ route('clients.index') }}" class="btn btn-danger">Retour</a>
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






