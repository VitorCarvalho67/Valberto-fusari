<?php

    session_start();

    //print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' and tipo = 'adm' ";

        $result = $conexao->query($sql);

        // print_r($sql);
        //print_r($result);
        if(mysqli_num_rows($result) < 1)
        {
            //print_r('N E');
            $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' and tipo = 'aluno' ";

            $result = $conexao->query($sql);

            if(mysqli_num_rows($result) < 1){
                unset($_SESSION['senha']);
                unset($_SESSION['email']);
                unset($_SESSION['tipo']);

                header('location: login.php'); 
            }
            else{
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo'] = 'aluno';
                header('location: aluno.php');
            }
            
        }
        else{
            //print_r('Existe');
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo'] = 'adm';
            header('location: adm.php');
        }
    }
    else{
            header('location: login.php');
    }
?>