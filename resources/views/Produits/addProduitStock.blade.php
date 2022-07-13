@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Enregistrer un produit</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
            <li class="breadcrumb-item">Produit</li>
            <li class="breadcrumb-item active">Enregistrer un produit</li>
            </ol>
        </nav>
        </div>

        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <a href="/showProduit" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste des produits</a>
            </div>
        </div>

        <div class="row">
            <form class="row g-3" action="/addProduitStock" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="nomProduit" class="form-label">Nom du produit<span style="color: red">*</span> </label>
                    <select name="nomProduit" required id="nomProduit" class="form-control">
                        <option value="">Sélectionnez la catégorie</option>
                        @foreach($produits  as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                        @endforeach
                        @if ($errors->has('nomProduit'))
                          <p>{{ $errors->first('nomProduit')}}</p>
                        @endif
                      </select>
                </div>

                <div class="col-md-6">
                    <label for="quantiteStock" class="form-label">Quantité Stock<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="quantiteStock" name="quantiteStock">
                    @if ($errors->has('quantiteStock'))
                        <p>{{ $errors->first('quantiteStock')}}</p>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer le produit</button>
                </div>
            </form>
            </div>
        </div>
        </section>
    </main>
@endsection
