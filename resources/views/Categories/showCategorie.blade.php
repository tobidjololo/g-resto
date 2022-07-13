@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Les catégories de produit</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Categorie</li>
              <li class="breadcrumb-item active">Liste des categories</li>
            </ol>
          </nav>
        </div>

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="/addCategorie" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Enregistrer une categorie</a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Liste des categories</h5>
                  <table class="table ">
                    <thead>
                      <tr>
                        @php
                            $i = 0
                        @endphp
                        <th scope="col">N°</th>
                        <th scope="col">Nom categorie</th>
                        <th scope="col">Date de création</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $categorie)
                		    <tr>
                                @php
                                    $i = $i + 1
                                @endphp
                                <td>{{ $i }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{ $categorie->created_date }}</td>
                		    </tr>
                		@empty
                		    <tr><td  colspan="3" class="text-center">Pas de categories enregistrés pour l'instant</td></tr>
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
