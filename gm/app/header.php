<?php
    if(!isset($_SESSION['idSessao']) AND !isset($_SESSION['emailSessao'])){

        ob_start();
        unset( $_SESSION['idSessao'], $_SESSION['emailSessao']);

            echo '
                <script type="text/javascript">
                    setTimeout(function() { window.location.href = "../login/?acao=entrar&login=invalido&sessao=encerrado&status=loginInvalido"; }, 0000);
                </script>       
            ';

    }
?>

    <!-- header -->
    <header class = "header fixed-top">

        <!-- menu -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <!-- btn menu -->
                        <button class="botao-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" title = "Recursos">            
                            <span class="material-icons-round f-30">widgets</span> 
                        </button>
                    </div>

                    <div class="col-11 col-sm-6 centro">
                        <a class="navbar-brand" href="<?= $URL_BASE ?>app/dash.php?acao=inicio&gm=v3_lite">
                            <img src="<?= $URL_IMG ?>/marcas/gerencie_mais/gerencie_mais.png" alt="" width = "230px">
                        </a>
                    </div>

                    <div class="col-1 col-md-3">
                        &nbsp;
                    </div>

                </div>
            </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">

            <div class="offcanvas-header">


              <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Gerencie mais</h3>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

            </div>

             

            <div class="offcanvas-body links-menu">

                <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link c-a" href="contas_.php?funcao=editar&id=<?= $idUserLogado ?>&urlRetorno=<?= $URL_ATUAL ?>">
                        <span class="material-symbols-rounded icones">
                            account_circle
                        </span>
                    Meu perfil</a>
                  </li>

                <p class="c-cinza-5 maiusculo f-14 m-3 mb-0">
                    Início
                </p>
                  <li class="nav-item">
                    <a class="nav-link" href="dash.php?acao=inicio&gm=v3_lite">
                        <span class="material-symbols-rounded icones">
                            dashboard
                        </span>
                    Painel</a>
                  </li>
                </ul>

                <p class="c-cinza-5 maiusculo f-14 m-3 mb-0">
                    Conteúdos
                </p>
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="destaques.php?aba=publicado&acao=lista">
                        <span class="material-symbols-rounded icones">
                        vrpano
                        </span>
                        Destaques
                    </a>
                  </li>
<!--                   <li class="nav-item">
                    <a class="nav-link" href="depoimentos.php?aba=publicado&acao=lista">
                        <span class="material-symbols-rounded icones">
                        comment
                        </span>
                    Depoimentos</a>
                  </li> -->
               
                  <li class="nav-item">
                    <a class="nav-link" href="seo.php?acao=lista">
                        <span class="material-symbols-rounded icones">
                            query_stats
                        </span>
                    Otimização de busca</a>
                  </li>
                </ul>

                <?php if($nivelUserLogadoS == "Administrador"){ ?>
                <p class="c-cinza-5 maiusculo f-14 m-3 mb-0">
                    Contas
                </p>

                 <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="contas.php?aba=ativo&acao=lista">
                            <span class="material-symbols-rounded icones">
                            manage_accounts
                            </span>
                        Contas de acesso</a>
                      </li>
                    </ul>
                 <?php } ?>
                    <hr>
                     <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="?encerrar=sair&acao=sair">
                            <span class="material-symbols-rounded icones">
                            logout
                            </span>
                        Sair</a>
                      </li>
                    </ul>
            </div>

        </div><!-- offcanvas -->
    </header>


    <!-- espaco extra -->
    <div class="espaco-extra"></div>


    <?php
    if(isset($_GET['encerrar'])){

        if($_GET['encerrar'] == "sair"){

            @session_start();
            ob_start();
            unset( $_SESSION['nomeSessao'], $_SESSION['emailSessao'], $_SESSION['idSessao']);

                echo '
                    <script type="text/javascript">
                        setTimeout(function() { window.location.href = "../login/?acao=entrar&login=invalido&Sessao=encerrado"; }, 1000);
                    </script>       
                ';

        }

    }
    ?>