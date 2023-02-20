<?php
session_start();
//print_r($_SESSION);

if ((!isset($_SESSION['email']) || !isset($_SESSION['senha'])) || ($_SESSION['tipo'] == 'aluno')) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
    exit;
}
$logado = $_SESSION['email'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');
$data_atual = date("d-m-Y H:i");

$host = 'localhost';
$user = 'id20334737_adm';
$pass = '7s5hhhLre{xu_Cpc';
$bd = 'id20334737_escolabd';

$conn = mysqli_connect($host, $user, $pass, $bd);

if(isset($_POST['submit'])){
    
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $imagem = $_FILES['imagem']['tmp_name'];
    $texto = $_POST['texto'];
    $tempo = $data_atual;

    

    if ($nome != "" && $texto != "") {

        $conteudo_imagem = file_get_contents($imagem);

        $stmt = $conn->prepare("INSERT INTO comunicados (nome, data, texto, tempo, tipo_imagem, conteudo_imagem) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $data, $texto, $tempo, $_FILES['imagem']['type'], $conteudo_imagem);
        if ($stmt->execute()) {
            echo "<script> alert('Postagem inserida com sucesso'); </script>";
        } else {
           echo "<script> alert('Erro ao inserir postagem: " . mysqli_error($conn) . "'); </script>";
        }
    } else {
        echo "<script> alert('Preencha todos os campos'); </script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adm comunicados</title>
    <link rel="stylesheet" href="./style/adm.css">
</head>
<body>
    <nav>
        <div>ADM</div>
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
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Nova postagem de evento</h2>
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">

            <label for="data">Data:</label>
            <input type="date" id="data" name="data">

            <label for="imagem">Imagem de sua postagem: (menor que 100Kb)</label>
            <input type="file" id="imagem" name="imagem">
            
            <label for="texto">Sobre o evento:</label>
            <textarea type="text" id="texto" name="texto"></textarea>
            
            <input type="submit" value="POSTAR" id="submit" name="submit" class="btn">
        </form>
    </main>  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="jquery-3.6.1.min.js"></script>
<script src="script/nav.js"></script>
</html>