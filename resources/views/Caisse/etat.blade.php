@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main" style="background-image: url('assets/img/resto1.jpeg');background-size: cover;background-repeat: no-repeat;">
        <div class="pagetitle">
          <h1>Caisse</h1>
          <nav>
            <ol class="breadcrumb" >
              <li class="breadcrumb-item"><a style="color: #ffffff" href="/home">Accueil</a></li>
              <li class="breadcrumb-item active" style="color: #ffffff">Caisse</li>
            </ol>
          </nav>
        </div>
        <section class="section dashboard">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card" style="background-color: rgb(24, 192, 142)">

                      <div class="card-body">
                        <h5 style="color: rgb(255, 255, 255)" class="card-title">Caisse</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i style="color: rgb(24, 192, 142)" class="bi bi-box"></i>

                          </div>
                          <div class="ps-3">
                              <h6 style="color: rgb(255, 255, 255)">{{ $valeur }}</h6>
                              <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $valeur }}</span>
                              <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                FCFA
                              </span>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card" style="background-color: rgb(63, 77, 209)">

                      <div class="card-body">
                        <h5 style="color: rgb(255, 255, 255)" class="card-title">Vente du jour</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i style="color: rgb(63, 77, 209)" class="bi bi-basket"></i>

                          </div>
                          <div class="ps-3">
                              <h6 style="color: rgb(255, 255, 255)">{{ $recetteJour }}</h6>
                              <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $recetteJour }}</span>
                              <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                FCFA
                              </span>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card" style="background-color: rgb(148, 223, 27)">

                      <div class="card-body">
                        <h5 style="color: rgb(255, 255, 255)" class="card-title">Achat du jour</h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i style="color: rgb(148, 223, 27)" class="bi bi-box"></i>

                          </div>
                          <div class="ps-3">
                              <h6 style="color: rgb(255, 255, 255)">{{ $achat }}</h6>
                              <span style="color: rgb(255, 255, 255)" class="pt-1 fw-bold">{{ $achat }}</span>
                              <span style="color: rgb(255, 255, 255)" class="pt-2 ps-1">
                                FCFA
                              </span>
                          </div>
                        </div>
                      </div>

                    </div>
                </div>


                <div class="col-12">
                    <div class="card recent-sales">
                        <div class="card-body">
                            <h5 class="card-title">Liste des transactions effectués</h5>
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    @php
                                            $i = 0
                                        @endphp
                                    <th scope="col">N°</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Opérant</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Etat caise</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($caisses as $caisse)
                                        <tr>
                                            @php
                                                $i = $i + 1
                                            @endphp
                                            <td>{{ $i }}</td>
                                            <td>{{ $caisse->typeOperation }}</td>
                                            <td>{{ $caisse->nomOpérant }} {{ $caisse->prenomOpérant }}</td>
                                            <td>{{ $caisse->montant }}</td>
                                            <td>{{ $caisse->solde }}</td>
                                            <td>{{ $caisse->created_date }}</td>
                                        </tr>
                                    @empty
                                        <tr><td  colspan="3" class="text-center">Pas de transactions effectués pour l'instant</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              </div>
            </div>
        </section>
      </main>

@endsection
