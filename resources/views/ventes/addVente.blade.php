@extends('layouts.base')
@section('contenu')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Enregistrer une vente</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Accueil</a></li>
                <li class="breadcrumb-item">Ventes</li>
                <li class="breadcrumb-item active">Enregistrer une vente</li>
            </ol>
        </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <a href="/showVentesDays" class="btn btn-block btn-primary float-right" style="margin-bottom: 5px;float: right">Liste des ventes de la journée</a>
                </div>
            </div>

            <div class="row">
                <form class="row g-3" id="model_form" method="post">
                    <div class="col-md-6">
                        <label for="nomClient" class="form-label">Nom du client<span>(Facultatif)</span> </label>
                        <input type="text" class="form-control" value="client" id="nomClient" name="nomClient" placeholder="Client">
                        @if ($errors->has('nomClient'))
                            <p>{{ $errors->first('nomClient')}}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="typeCommande" class="form-label">Type Commande<span style="color: red">*</span> </label>
                        <select name="typeCommande" required id="typeCommande" class="form-control">
                            <option value="Emporté">Emporté</option>
                            <option value="Gozem">Gozem</option>
                            <option value="Sur place">Sur place</option>
                        </select>
                        @if ($errors->has('typeCommande'))
                            <p>{{ $errors->first('typeCommande')}}</p>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer la vente</button>
                    </div>
                </form>

                <div align="right" style="margin-bottom:5px;">
                    <button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
                </div>

                <form class="row g-3" id="user_form" method="post">
                    <h2 class="card-title text-center">Remplir les prodits commandés par le client</h2>
                    @csrf
                    <input type="hidden" name="" id="model_id">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="user_data">
                            <tr>
                                <th>Commande</th>
                                <th>Prix</th>
                                <th>Details</th>
                                <th>Supprimer</th>
                            </tr>
                        </table>
                    </div>

                    <div class="text-center">
                        <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Enregistrer la vente" />
                    </div>
                </form><!-- End Multi Columns Form -->

                <div id="user_dialog" title="Add Data">
                    <div class="form-group">
                        <label>Commande</label>
                        <select name="commande" required id="commande" class="form-control">
                            <option value="">Sélectionnez le produit</option>
                            @foreach($recettes as $recette)
                                <option value="{{ $recette->nom }}">{{ $recette->nom }}</option>
                            @endforeach
                            @foreach($boissons as $boisson)
                                <option value="{{ $boisson->nom }}">{{ $boisson->nom }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('commande'))
                        <p>{{ $errors->first('commande')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Prix(FCFA)</label>
                        <input required type="number" min="0" name="prix" id="prix" class="form-control" />
                        @if ($errors->has('prix'))
                            <p>{{ $errors->first('prix')}}</p>
                        @endif
                    </div>
                    <div class="form-group" align="center">
                        <input type="hidden" name="row_id" id="hidden_row_id" />
                        <button type="button" name="save" id="save" class="btn btn-info">Ajouter</button>
                    </div>
                </div>

                <div id="action_alert" title="Action">

                </div>
            </div>
        </section>
    </main>
@endsection
