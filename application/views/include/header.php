<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>CodeIgniter Bootstrap</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/jquery-1.9.1.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>    
    <script src="<?php echo base_url('assets/js/jquery.blockUI.js') ?>"></script>    
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/funcoesGerais.js') ?>"></script>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" style="z-index:2;">
      <div class="navbar-inner" style="z-index:3;">
        <div class="container-fluid" style="z-index:4;">
          <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="brand">
            <img src="<?php echo base_url('assets/img/logoFiesc.png') ?>" style="margin-right:30px;"/>
            Sistema de alocação de salas
          </a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logado como <a class="navbar-link" href="#">Arquelau Pasta</a>
            </p>            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div><br><br>

    <div class="well sidebar-nav" style="width:15%; float:left; margin-right: 50px;">
      <ul class="nav nav-list">
        <li><a href="<?php echo base_url("blocos"); ?>">Cadastro de Blocos</a></li>
        <li><a href="<?php echo base_url("departamentos"); ?>">Cadastro de Departamentos</a></li>
        <li><a href="<?php echo base_url("salas"); ?>">Listagem de Salas</a></li>
        <li><a href="<?php echo base_url("locacao"); ?>">Locação de Salas</a></li>
        <li><a href="#">Logar</a></li>
        <li><a href="#">Sair</a></li>
      </ul>
    </div>