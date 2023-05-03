<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'lib/vendor/phpmailer/phpmailer/src/Exception.php';
  require 'lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'lib/vendor/phpmailer/phpmailer/src/SMTP.php';

  require 'lib/vendor/autoload.php';


  
  if(isset($_POST['acao'])){


    $arquivo = $_FILES['arquivo'];
    $nome = $_POST['nome'];
    $email_cliente = $_POST['email'];
    $telefone =  $_POST['fone'];
    $msg =  $_POST['msg'];
    $link_logo = $_POST['img_url'];
    $link_url = $_POST['base_url'];

    $arquivoNovo = explode('.', $_FILES['arquivo']['name']);

    if($arquivoNovo[sizeof($arquivoNovo)-1] != "pdf"){
      echo "

                	<div style = 'width: 100%;
                      height: 100vh;
                      text-align: center;
                      background-color: #ededed;
            		'>
          
			          <img src='http://fatcred.com.br/require/img/marcas/logo_c.png' width = '200px' style = 'margin: 30px;''>
			          <h1>Ops!</h1><br>
			          <p> Envie o seu currículo no formato de PDF.</p><br>
			          <a href = 'http://fatcred.com.br/trabalhe-conosco' 
			             style ='
			             padding: 6px 18px;
			            font-size: var(--f-14);
			            color: #fff;
			            background-color: #F37135;
			            font-weight: 500;
			            line-height: 1.5;
			            text-align: center;
			            text-decoration: none;
			            border-radius: 6px;
			            display: inline-block;
			            vertical-align: middle;
			            cursor: pointer;
			            -webkit-user-select: none;
			            -moz-user-select: none;
			            user-select: none;
			             '>Ok! Enviar novamente</a>
			        </div>

                ";
      die("");

    }else{
      
      move_uploaded_file($_FILES['arquivo']['tmp_name'], "../require/pdf/" . $_FILES['arquivo']['name']);


         //geração da data da publicação
         $dia = date('d'); $mes = date('m'); $ano = date('Y'); $hora = date('H:i:s');
         $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
         date_default_timezone_set('America/Campo_Grande');
         $data = $dia." de ".$meses[$mes-1]." de ".$ano." às ".$hora;


         if(!empty($nome) && !empty($email_cliente) && !empty($telefone) && !empty($msg) ){

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.uni5.net';                     //Set the SMTP server to send through  smtp.fatcred.com.br
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication -- true
                $mail->Username   = 'relacionamento@fatcred.com.br';                     //SMTP username
                $mail->Password   = 'Relfc!101020';                               //SMTP password
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->SMTPSecure = 'ssl';    // SSL REQUERIDO pelo GMail ssl tls

                //Recipients
                $mail->setFrom('relacionamento@fatcred.com.br', 'Trabalhe conosco - Fatcred');
                $mail->addAddress('relacionamento@fatcred.com.br', 'Trabalhe conosco');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional

              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = $nome.' quer fazer parte da equipe';
              $mail->Body    = '
                                <div style = "padding: 30px; margin: 10px;">
                                     <img src = "'. $link_logo .'marcas/logo_c.png" style = "width: 150px;">
                                     <hr>
                                     <h3>Você recebeu um novo contato!</h3>
                                     <p style = "padding: 20px; margin: 10px; background-color: #fafafa; ">
                                       <strong>Nome:</strong> '. $nome .'<br>
                                       <strong>Telefone:</strong> '. $telefone .'<br>
                                       <strong>E-mail:</strong> '. $email_cliente .'<br>
                                       <strong>Mensagem:</strong> '. $msg .'<br>
                                       <strong>Currículo:</strong> <a href = "'. $link_url .'require/pdf/'.$_FILES['arquivo']['name'].'">Ver currículo</a><br>
                                     </p>
                                     <p style = "font-size: 12px. font-style:italic">Entrou em contato em '. $data .'</p>
                                  </div>

                                ';

              $mail->AltBody = "
                                Você recebeu um novo contato!
                                Nome: ". $nome ."\n
                                Telefone: ". $telefone ."\n
                                E-mail: ". $email_cliente ."\n\n
                                Mensagem: ". $msg ."\n\n
                                Currículo: ". $link_url ."require/pdf/".$_FILES['arquivo']['name']."\n\n


                                Em ". $data ."
                                ";
              if($mail->send()){

                echo "

                	<div style = 'width: 100%;
                      height: 100vh;
                      text-align: center;
                      background-color: #ededed;
            		'>
          
			          <img src='http://fatcred.com.br/require/img/marcas/logo_c.png' width = '200px' style = 'margin: 30px;''>
			          <h1>Formulario enviado com sucesso!</h1><br>
			          <p> Seu currículo já esta em nosso banco de talentos.</p><br>
			          <a href = 'http://fatcred.com.br/' 
			             style ='
			             padding: 6px 18px;
			            font-size: var(--f-14);
			            color: #fff;
			            background-color: #F37135;
			            font-weight: 500;
			            line-height: 1.5;
			            text-align: center;
			            text-decoration: none;
			            border-radius: 6px;
			            display: inline-block;
			            vertical-align: middle;
			            cursor: pointer;
			            -webkit-user-select: none;
			            -moz-user-select: none;
			            user-select: none;
			             '>Voltar a página inicial</a>
			        </div>

                ";

              }

          } catch (Exception $e) {

              //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              echo "

                	<div style = 'width: 100%;
                      height: 100vh;
                      text-align: center;
                      background-color: #ededed;
            		'>
          
			          <img src='http://fatcred.com.br/require/img/marcas/logo_c.png' width = '200px' style = 'margin: 30px;''>
			          <h1>Algo deu errado!</h1><br>
			          <p> Um erro inesperado ocorreu. Entre em contato com a gente</p><br>
			          <a href = 'http://fatcred.com.br/#mensagem' 
			             style ='
			             padding: 6px 18px;
			            font-size: var(--f-14);
			            color: #fff;
			            background-color: #F37135;
			            font-weight: 500;
			            line-height: 1.5;
			            text-align: center;
			            text-decoration: none;
			            border-radius: 6px;
			            display: inline-block;
			            vertical-align: middle;
			            cursor: pointer;
			            -webkit-user-select: none;
			            -moz-user-select: none;
			            user-select: none;
			             '>Ok! Enviar novamente</a>
			        </div>

                ";
          }

         }else{
           echo '
                <div class = "respostas-retorno centro alert alert-warning"> Preencha todos os campos.</div>
           ';
         }






    }
  }
?>