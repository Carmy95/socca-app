<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/logo-socca.jpeg')}}" alt="SOCCA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SOCCA Entreprise</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de Bord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cars.index') }}" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehicules
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('proprio.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Proprietaires
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('chauffeurs.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Chauffeurs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('commandes.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Commandes
              </p>
            </a>
          </li>
          <hr>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Paramètres
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('fonctions.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Poste de Travail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('typevehicules.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catégorie des Vehicules</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('statuscommandes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status des Commandes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('statusfactures.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status des Factures</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
