@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Enregistrer une dépense</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item">Dépenses</li>
            <li class="breadcrumb-item active">Enregistrer une dépense</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <a href="/showConstantes" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste des dépenses</a>
            </div>
        </div>

        <div class="row">
            <form class="row g-3" action="/addConstantes" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="nomConstante" class="form-label">Nom de la dépense<span style="color: red">*</span> </label>
                    <input type="text" min="3" class="form-control" required id="nomConstante" name="nomConstante">
                    @if ($errors->has('nomConstante'))
                        <p>{{ $errors->first('nomConstante')}}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="prix" class="form-label">Valeur de la dépense<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="prix" name="prix">
                    @if ($errors->has('prix'))
                        <p>{{ $errors->first('prix')}}</p>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer la dépense</button>
                </div>
            </form>
            </div>
        </div>
        </section>
    </main>
@endsection
