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
            <form class="row g-3" action="/addProduit" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="nomProduit" class="form-label">Nom du produit<span style="color: red">*</span> </label>
                    <input type="text" min="3" class="form-control" required id="nomProduit" name="nomProduit">
                    @if ($errors->has('nomProduit'))
                        <p>{{ $errors->first('nomProduit')}}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="quantiteStock" class="form-label">Quantité Stock<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="quantiteStock" name="quantiteStock">
                    @if ($errors->has('quantiteStock'))
                        <p>{{ $errors->first('quantiteStock')}}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="quantiteAlert" class="form-label">Quantité alerte<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="quantiteAlert" name="quantiteAlert">
                    @if ($errors->has('quantiteAlert'))
                        <p>{{ $errors->first('quantiteAlert')}}</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="prix" class="form-label">Prix<span style="color: red">*</span> </label>
                    <input type="number" class="form-control" required id="prix" name="prix">
                    @if ($errors->has('prix'))
                        <p>{{ $errors->first('prix')}}</p>
                    @endif
                </div>

                <div class="col-md-12">
                    <label for="categorie" class="form-label">Catégorie de produit<span style="color: red">*</span> </label>
                    <select name="categorie" required id="categorie" class="form-control">
                      <option value="">Sélectionnez la catégorie</option>
                      @foreach($categories  as $categorie)
                          <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                      @endforeach
                      @if ($errors->has('categorie'))
                        <p>{{ $errors->first('categorie')}}</p>
                      @endif
                    </select>
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
