<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <br>

        <li class="nav-item">
            <a class="nav-link collapsed" id="recherche" href="/dashboard">
            <i class="bi bi-person"></i>
            <span>Accueil</span>
            </a>
        </li>

        @if (Auth::user()->isAdmin())
            <!-- Catégories-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Catégories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showCategorie">
                            <i class="bi bi-circle"></i><span>Liste des catégories</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addCategorie">
                            <i class="bi bi-circle"></i><span>Enregistrer une catégorie</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Produit-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showProduit">
                        <i class="bi bi-circle"></i><span>Liste des produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addProduitStock">
                        <i class="bi bi-circle"></i><span>Ajouter des produits au stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addProduit">
                        <i class="bi bi-circle"></i><span>Enregistrer un nouveau produit</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Recettes-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav4" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Recettes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showRecettes">
                            <i class="bi bi-circle"></i><span>Liste de nos recettes</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addRecettes">
                            <i class="bi bi-circle"></i><span>Enregistrez une recette</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Ventes-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav41" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Ventes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav41" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showVentesDays">
                        <i class="bi bi-circle"></i><span>Voir les ventes du jour</span>
                        </a>
                    </li>
                    <li>
                        <a href="/showVentePeriode">
                        <i class="bi bi-circle"></i><span>Voir les ventes sur une période</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addVentes">
                        <i class="bi bi-circle"></i><span>Enregistrer une vente</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Constantes-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav42" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Dépenses</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav42" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showConstantes">
                        <i class="bi bi-circle"></i><span>Liste des dépenses pour le mois</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addConstantes">
                        <i class="bi bi-circle"></i><span>Ajouter les dépenses pour un mois</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Caisse-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav12" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Caisse</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav12" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/recevoirCredit">
                            <i class="bi bi-circle"></i><span>Voir etat caisse</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/OperationCompte">
                            <i class="bi bi-circle"></i><span>OperationCompte</span>
                        </a>
                    </li> --}}
                </ul>
            </li>

        @elseif (Auth::user()->isGerant())
            <!-- Catégories-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Catégories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showCategorie">
                            <i class="bi bi-circle"></i><span>Liste des catégories</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addCategorie">
                            <i class="bi bi-circle"></i><span>Enregistrer une catégorie</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Produit-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showProduit">
                        <i class="bi bi-circle"></i><span>Liste des produits</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addProduitStock">
                        <i class="bi bi-circle"></i><span>Ajouter des produits au stock</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addProduit">
                        <i class="bi bi-circle"></i><span>Enregistrer un nouveau produit</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Recettes-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav4" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Recettes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showRecettes">
                            <i class="bi bi-circle"></i><span>Liste de nos recettes</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addRecettes">
                            <i class="bi bi-circle"></i><span>Enregistrez une recette</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Ventes-->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav41" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Ventes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav41" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/showVentesDays">
                        <i class="bi bi-circle"></i><span>Voir les ventes du jour</span>
                        </a>
                    </li>
                    <li>
                        <a href="/showVentePeriode">
                        <i class="bi bi-circle"></i><span>Voir les ventes sur une période</span>
                        </a>
                    </li>
                    <li>
                        <a href="/addVentes">
                        <i class="bi bi-circle"></i><span>Enregistrer une vente</span>
                        </a>
                    </li>
                </ul>
            </li>

        @endif


    </ul>
</aside><!-- End Sidebar-->
