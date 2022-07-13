@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main" style="background-image: url('assets/img/resto1.jpeg');background-size: cover;background-repeat: no-repeat;">
        <div class="pagetitle">
          <h1>Tableau de bord</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a style="color: #ffffff" href="/home">Accueil</a></li>
              <li class="breadcrumb-item active" style="color: #ffffff">Tableau de bord</li>
            </ol>
          </nav>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-xxl-3 col-md-3">
                  <div class="card info-card sales-card" style="background-color: rgb(41, 160, 41)">

                    <div class="card-body">
                      <h5 class="card-title" style="color: rgb(255, 255, 255)">Catégories</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="color: rgb(180, 196, 44)" class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                          <h6 style="color: rgb(255, 255, 255)">{{ $categories }}</h6>
                          <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $categories }}</span>
                          <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                            @if( $categories == 1 || $categories == 0)
                                catégorie
                            @else
                                catégories
                            @endif
                          </span>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-3 col-md-3">
                  <div class="card info-card revenue-card" style="background-color: rgb(180, 196, 44)">

                    <div class="card-body">
                      <h5 style="color: rgb(255, 255, 255)" class="card-title">Produits</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i style="color: rgb(180, 196, 44)" class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="color: rgb(255, 255, 255)">{{ $produits }}</h6>
                            <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $produits }}</span>
                            <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                @if( $produits == 1 || $produits == 0)
                                    produit
                                @else
                                    produits
                                @endif
                            </span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card" style="background-color: rgb(24, 192, 142)">

                      <div class="card-body">
                        <h5 style="color: rgb(255, 255, 255)" class="card-title">Recettes</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i style="color: rgb(24, 192, 142)" class="bi bi-people"></i>

                          </div>
                          <div class="ps-3">
                              <h6 style="color: rgb(255, 255, 255)">{{ $recettes }}</h6>
                              <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $recettes }}</span>
                              <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                @if( $recettes == 1 || $recettes == 0)
                                    recette
                                @else
                                    recettes
                                @endif
                              </span>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>

                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card" style="background-color: rgb(63, 77, 209)">

                      <div class="card-body">
                        <h5 style="color: rgb(255, 255, 255)" class="card-title">Ventes du jour</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i style="color: rgb(63, 77, 209)" class="bi bi-people"></i>

                          </div>
                          <div class="ps-3">
                              <h6 style="color: rgb(255, 255, 255)">{{ $ventesmois }}</h6>
                              <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $ventesmois }}</span>
                              <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                @if( $ventesmois == 1 || $ventesmois == 0)
                                    vente
                                @else
                                    ventes
                                @endif
                              </span>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>


                <!-- Recent Sales -->
                <!-- Recent Sales -->
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
            </div><!-- End Left side columns -->
        </section>
      </main>

@endsection
