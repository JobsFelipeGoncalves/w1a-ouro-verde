<?php

    session_start();
    ob_start();

    include_once('../config/configuracao.php');          
    include_once('../config/conexao.php');          

    

    //recebe os campos do formulário
    $recebeDados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //remove os espeços do inicio e final dos campos
    $recebeDados = array_map("trim", $recebeDados);

    //recebe os campos do formulários
    $email = $recebeDados['emailLogin'];
    $senha = $recebeDados ['senhaLogin'];

    $seleciona = "SELECT * FROM contas WHERE email = '$email' LIMIT 1";
                $acao = $conexao -> prepare($seleciona);
                $acao -> execute();

                while($registo = $acao -> fetch(PDO::FETCH_ASSOC)){

                    if(password_verify($recebeDados ['senhaLogin'], $registo['senha'])){

                       $_SESSION['nomeSessao'] = $registo['nome'];
                       $_SESSION['emailSessao'] = $registo['email'];
                       $_SESSION['idSessao'] = $registo['id'];

                        echo '<div class = "gm-mensagens">
                                    <div class="row">
                                        <div class="col text-left">
                                            <div class="alert alert-success show" role="alert">
                                                Ok! Entrando no painel...
                                            </div>
                                        </div>
                                    </div>    
                               </div>';

                        echo '<script type="text/javascript">
                                setTimeout(function() { window.location.href = "../app/dash.php?acao=inicio&gm=v3_lite"; }, 1000);
                              </script>';

                    }else{ #else verificação de senha

                        $_SESSION['msg'] = '
                            <div class = "gm-mensagens">
                                <div class="row">
                                    <div class="col">
                                        <div class="alert alert-danger show" role="alert">
                                            <strong>Ops!</strong> O email ou senha estão incorretos.
                                        </div>
                                    </div>
                                </div>    
                            </div>         
                        ';
                    }

                }

                if(isset($_SESSION['msg'])){

                    echo $_SESSION['msg']; 
                    unset($_SESSION['msg']);

                }              

?>