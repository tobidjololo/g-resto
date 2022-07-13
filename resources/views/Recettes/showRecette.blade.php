@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Les recettes</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Recettes</li>
              <li class="breadcrumb-item active">Liste des recettes</li>
            </ol>
          </nav>
        </div>

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="/addRecettes" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Enregistrer une recette</a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Liste des recettes</h5>
                  <table class="table ">
                    <thead>
                      <tr>
                        @php
                            $i = 0
                        @endphp
                        <th scope="col">N°</th>
                        <th scope="col">Nom recette</th>
                        <th scope="col">Prix recette(FCFA)</th>
                        <th scope="col">Date de création</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($recettes as $recette)
                		    <tr>
                                @php
                                    $i = $i + 1
                                @endphp
                                <td>{{ $i }}</td>
                                <td>{{ $recette->nom }}</td>
                                <td>{{ $recette->prix }} FCFA</td>
                                <td>{{ $recette->created_date }}</td>
                		    </tr>
                		@empty
                		    <tr><td  colspan="3" class="text-center">Pas de recettes enregistrés pour l'instant</td></tr>
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
