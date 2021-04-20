<template>
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http:\\digilancetuls.com" target="_blank">
          <div class="sidebar-brand-icon">
            <img src="http://127.0.0.1:8000/img/logo/logo.png">
          </div>
          <div class="sidebar-brand-text mx-3 text-green">DigilanSchools</div>
        </a>
        <hr class="sidebar-divider m-0 p-0">
        <a class="sidebar-brand d-flex align-items-center justify-content-center text-dark" href="http:\\seraphins.mg" target="_blank">
          <div class="sidebar-brand-icon">
            <img src="http://127.0.0.1:8000/img/logo/seraf.png">
          </div>
          <div class="sidebar-brand-text mx-3 text-primary"><span class="h6">Les séraphins</span></div>
        </a>
        <hr class="sidebar-divider m-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Scolarite
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#frequent"
            aria-expanded="true" aria-controls="frequent">
            <i class="fas fa-tasks fa-fw"></i>
            <span>Tâches quotidiennes</span>
          </a>
          <div id="frequent" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tâches quotidiennes</h6>
              <a class="collapse-item" href="#">Absence / retard</a>
              <a class="collapse-item" href="popovers.html">Emploi du temps</a>
              <a class="collapse-item" href="progress-bar.html">Cachier de texte</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-user-edit"></i>
            <span>Inscription d'étudiant</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Employés</span>
          </a>
          <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Employés</h6>
              <a class="collapse-item" href="#">Ajouter un employés</a>
              <a class="collapse-item" href="#">Retard Absence Congé</a>
              <a class="collapse-item" href="#">Liste des employés</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#note"
            aria-expanded="true" aria-controls="note">
            <i class="fa fa-sticky-note" aria-hidden="true"></i>
            <span>Examens</span>
          </a>
          <div id="note" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Examens</h6>
              <a class="collapse-item exam" href="#">Salle d'examen</a>
              <a class="collapse-item notebul" href="#">Notes d'examen</a>
              <a class="collapse-item" href="#">Statistique des examens</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ecolage"
            aria-expanded="true" aria-controls="ecolage">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Trésorerie</span>
          </a>
          <div id="ecolage" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Trésorerie</h6>
              <a class="collapse-item" href="#">Frais de scolarité</a>
              <a class="collapse-item" href="#">Revenu et Dépense</a>
              <a class="collapse-item" href="#">Salaire des employés</a>
              <a class="collapse-item" href="#">Statistiques de trésorerie</a>
            </div>
          </div>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Autres
        </div>
        <li class="nav-item">
          <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-fax"></i>
            <span>Tarif scolaire (configuration)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-building"></i>
            <span>Liste des classes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-book"></i>
            <span>Liste des matières</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ui-colors.html">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Publier une annonce</span>
          </a>
        </li>
        <hr class="sidebar-divider">
        <div class="version">Version 1.0.1</div>
      </ul>
</template>

<script>
    export default {

    }
</script>
