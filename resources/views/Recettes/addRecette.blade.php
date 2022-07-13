@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Enregistrer une recette</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item">Recettes</li>
            <li class="breadcrumb-item active">Enregistrer une recette</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <a href="/showRecette" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste des recettes</a>
            </div>
        </div>

        <div class="row">
            <form class="row g-3" action="/addRecettes" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="nomRecette" class="form-label">Nom de la recette<span style="color: red">*</span> </label>
                    <input type="text" min="3" class="form-control" required id="nomRecette" name="nomRecette">
                    @if ($errors->has('nomRecette'))
                        <p>{{ $errors->first('nomRecette')}}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="prix" class="form-label">Prix de la recette<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="prix" name="prix">
                    @if ($errors->has('prix'))
                        <p>{{ $errors->first('prix')}}</p>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Créer la recette</button>
                </div>
            </form>
            </div>
        </div>
        </section>
    </main>
@endsection
