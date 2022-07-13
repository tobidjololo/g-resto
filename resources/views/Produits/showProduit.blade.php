@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Les produits du stock</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Produit</li>
              <li class="breadcrumb-item active">Liste des produits du stock</li>
            </ol>
          </nav>
        </div>

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="/addProduit" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Enregistrer un produit</a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Liste des produits</h5>
                  <table class="table ">
                    <thead>
                      <tr>
                        @php
                            $i = 0
                        @endphp
                        <th scope="col">N°</th>
                        <th scope="col">Nom produit</th>
                        <th scope="col">Quantité stock</th>
                        <th scope="col">Quantité alert</th>
                        <th scope="col">Prix(FCFA)</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Date de création</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($produits as $produit)
                		    <tr>
                                @php
                                    $i = $i + 1
                                @endphp
                                <td>{{ $i }}</td>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->quantiteStock }}</td>
                                <td>{{ $produit->quantiteAlert }}</td>
                                <td>{{ $produit->prix }}</td>
                                <td>{{ $produit->editor->nom }}</td>
                                <td>{{ $produit->created_date }}</td>
                		    </tr>
                		@empty
                		    <tr><td  colspan="3" class="text-center">Pas de produits enregistrés pour l'instant</td></tr>
                		@endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
@endsection
