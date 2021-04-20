<template>
    <div id="wrapper">
        <menu-layout />

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" @click="sidebarToggle" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <button id="school_years" @click="modal" class="btn btn-sm mr-3 bg-purple">
                    <span class="text-sm">2018 - 2019</span>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="Recherche d'une personne"
                            aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <span class="badge badge-danger badge-counter">3</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header bg-green border-0">
                        Centre de message
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="http://127.0.0.1:8000/img/man.png" style="max-width: 60px" alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                            having.</div>
                            <div class="small text-gray-500">Leonel Piastio · à l'instant</div>
                        </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="#" style="max-width: 60px" alt="">
                            <div class="status-indicator bg-default"></div>
                        </div>
                        <div>
                            <div class="text-truncate">Bonjour Monsieur,
                            Tous les professeurs sont déjà réunis. On attend que vous, Merci</div>
                            <div class="small text-gray-500">Md· Zoely · 58min</div>
                        </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Voir plus de message</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger badge-counter">38+</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header bg-green border-0">
                        Notifications
                        <a href="#" class="text-white float-right"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">50% des employés ont déjà été payé ce mois de juin 2019.</span>
                        </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            Les étudiants dans la classe de 6ème B sont tous notés.
                        </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            La classe de 6ème B a un taux de réussite de 56%.
                        </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Voir plus de notification</a>
                    </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle bg-white" src="http://127.0.0.1:8000/img/boy.png" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Etablissement
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Absence / retard
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Frais de scolarité
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400"></i>
                        Problème / Solution
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                        Configuration
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- Logout -->
                        <form @submit.prevent="logout">
                            <button class="dropdown-item" type="submit">
                                <i class="fas fa-door-open fa-sm fa-fw mr-2 text-gray-400"></i>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                    </li>
                </ul>
                </nav>
                <!-- Topbar -->

                <!-- Page Content -->
                <main class="container-fluid" id="container-wrapper">
                        <slot></slot>
                </main>
        </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>copyright &copy; 2021 - développé par
                    <b><a href="http://digilancetuls.com" target="_blank" class="text-success">Digilancetuls</a></b>
                    </span>
                </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
        </div>

<div v-show="cd">
            <!--Insertion du nouvelle année scolaire-->
<div class="row mr-0">
  <div class="form-group col-4">
    <select class="custom-select" name="" id="">
      <option value="0" selected>Année initiale</option>
        <option value="545">545</option>
    </select>
  </div>
  <div class="form-group col-2"><i class="fas fa-minus fa-fw"></i></div>
  <div class="form-group col-4">
    <select class="custom-select" name="" id="">
      <option value="0" selected>Année finale</option>
        <option value="545">545</option>
    </select>
  </div>
  <div class="form-group col-2">
    <button type="button" id="addYear" class="btn btn-success">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>
</div>
<!--Liste des années scolaires disponibles de l'école-->

    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>Année scolaire</th>
            <th>Argent acquis</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">2019-2020</a></td>
            <td>5 000,24 Ar</td>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
          <tr>
            <td><a href="#">2018-2019</a></td>
            <td>5 245,86 Ar</td>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt" aria-hidden="true"></i></a></td>
          </tr>
          <tr>
            <td><a href="#">2018-2019</a></td>
            <td>4 210,59 Ar</td>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt    "></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer"></div>
</div>
</template>

<script>
    import MenuLayout from '@/Layouts/MenuLayout';
    import Annee from '@/Pages/Section/Annee';

    export default {
        components: {
            MenuLayout,
            Annee
        },
        data(){
            return {
                cd:false
            }
        },
        mounted(){

        },
        methods: {
            modal(){
                $.dialog({
                        title: 'Année scolaire',
                        typeAnimated: true,
                        type: 'blue',
                        theme: 'modern',
                        closeIcon: true,
                        columnClass: 'col-xs-12 col-md-12 col-lg-8',
                        contentLoaded: function(data, status, xhr){
                            if(status=='success'){
                                this.setContentAppend(Annee);
                            }else{
                                this.setContentAppend('<br>Erreur! veuillez actualisé la page');
                            }
                        }
                });
            },
            year(){
                this.modal(this.$inertia.get(this.route('annee.index')));
            },
            logout() {
                this.$inertia.post(route('logout'));
            }
        }
    }
</script>
