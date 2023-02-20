<?php

$host = 'localhost';
$user = 'id20334737_adm';
$pass = '7s5hhhLre{xu_Cpc';
$bd = 'id20334737_escolabd';

$conn = mysqli_connect($host, $user, $pass, $bd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
    <link rel="stylesheet" href="style/postagem.css">
</head>
<body>
    <nav>
        <div>Home</div>
        <div>
            <a href="index.html">Home</a>
            <a href="postagem.php">Postagem</a>
            <a href="login.php">Login</a>
            <button id="btn1"></button>
        </div>
    </nav>
    <div class="asideB" id="asideB">
        <aside id="aside">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="postagem.php">Postagem</a></li>
                <li><a href="aluno.php">Aluno</a></li>
                <li><a href="#logo">Suporte</a></li>     
            </ul>
        </aside>
        <button class="LeftBar" id="btn2"></button>
    </div>
    <main></main>

    <div class="pesquisa">
        <h2>Buscar postagens:</h2>
        <input type="search" name="text" id="text">
    </div>

    <div class="nomes"></div>
    <footer>
        <div class="logo">
            <h4>Nossa escola</h4>
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica</p>
        </div>
        <div class="sobre">
            <div>
                <h4>Our Service</h4>
                <p>Login</p>
                <p>Help Center</p>
                <p>About us</p>
            </div>
            <div>
                <h4>Company</h4>
                <p>Terms of Use</p>
                <p>Contact Us</p>
                <p>telephone</p>
            </div>
            <div>
                <h4>falow Us</h4>
                <p>Facebook</p>
                <p>Linkedln</p>
                <p>Instagram</p>
            </div>
        </div>
    </footer>
</body>
<script src="script/nav.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="jquery-3.6.1.min.js"></script>
<script>
    $('#text').keyup(function() {
        let text = $('#text').val();
        $.ajax({
            url: './ajax.test.php',
            method: 'post',
            data: 'text='+text,
            success:function(e) {
                $('.nomes').html(e);
            }
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: './ajax.test.php',
            method: 'post',
            data: 'text=',
            success:function(e) {
                $('.nomes').html(e);
            }
        });
    });
</script>
</html>