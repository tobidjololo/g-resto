@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    @include('layouts.partials.modal_details_ventes')
    <main id="main" class="main">
        <div class="pagetitle">
          <h1>Les ventes</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
              <li class="breadcrumb-item">Ventes</li>
              <li class="breadcrumb-item active">Liste des ventes</li>
            </ol>
          </nav>
        </div>

        <section class="section">
          <div class="row">
            <div class="col-lg-12">
                <a href="/addVentes" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Enregistrer une vente</a>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="card recent-sales">
                    <div class="card-body">
                        <h5 class="card-title">Liste des ventes de la journée</h5>
                        <table class="table datatable">
                            <thead>
                            <tr>
                                @php
                                    $i = 0
                                @endphp
                                <th scope="col">N°</th>
                                <th scope="col">Clients</th>
                                <th scope="col">Type Commande</th>
                                <th scope="col">Montant(FCFA)</th>
                                <th scope="col">Date-Heure</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($ventes as $vente)
                                    <tr>
                                        @php
                                            $i = $i + 1
                                        @endphp
                                        <td>{{ $i }}</td>
                                        <td>{{ $vente->client }}</td>
                                        <td>{{ $vente->typeCommande }}</td>
                                        <td>{{ $vente->somme }} FCFA</td>
                                        <td>{{ $vente->created_date }}</td>
                                        <td><a class="btn btn-warning" href="#" onclick="details({{$vente->id}})">Details</a></td>
                                   </tr>
                               @empty
                                <tr><td  colspan="7" class="text-center">Pas de ventes effectué pour l'instant</td></tr>
                              @endforelse
                            </tbody>
                        </table>
                        <h6 class="card-title pull-left text-decoration-underline text-danger text-end">Total vendu aujourd'hui : {{ $somme }} FCFA</h6>
                    </div>
                </div>
            </div><!-- End Recent Sales -->
          </div>
        </section>
    </main>
@endsection
