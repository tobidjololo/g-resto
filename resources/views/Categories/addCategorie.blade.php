@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Enregistrer une catégorie</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item">Catégorie</li>
            <li class="breadcrumb-item active">Enregistrer une catégorie</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <a href="/showCategorie" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste des catégories</a>
            </div>
        </div>

        <div class="row">
            <form class="row g-3" action="/addCategorie" method="post">
                @csrf
                <div class="col-md-12">
                    <label for="nomCategorie" class="form-label">Nom de la catégorie<span style="color: red">*</span> </label>
                    <input type="text" min="3" class="form-control" required id="nomCategorie" name="nomCategorie">
                    @if ($errors->has('nomCategorie'))
                        <p>{{ $errors->first('nomCategorie')}}</p>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Créer la catégorie</button>
                </div>
            </form>
            </div>
        </div>
        </section>
    </main>
@endsection
