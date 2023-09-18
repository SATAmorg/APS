<?php
session_start();
  //  print_r($_REQUEST);
  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
  {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('email: '.$email);
        // print('<br>');
        // print_r('senha: '.$senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['$email']);
            unset($_SESSION['$senha']);
            header('location: login2.php');
            //print_r('Senha ou Email incorretos');
        }
        else
        {
            $_SESSION['$email'] = $email;
            $_SESSION['$senha'] = $senha;
            header('location: loja-logado.php');
            //print_r('Conectado');
        }
  }
  else
  {
    header('location: login2.php');
  }

?>