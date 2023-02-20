<?php

$host = 'localhost';
$user = 'id20334737_adm';
$pass = '7s5hhhLre{xu_Cpc';
$bd = 'id20334737_escolabd';

$conn = mysqli_connect($host, $user, $pass, $bd);


if (!empty($_POST['text'])) {
        $text = $_POST['text'];
    
        $sql = mysqli_query($conn,"SELECT * FROM comunicados WHERE nome LIKE '%$text%'");

}else{
        $sql = mysqli_query($conn,"SELECT * FROM comunicados ORDER BY data DESC");
}

?>

<div class="text">

<?php while($var = mysqli_fetch_assoc($sql)){?>
        <div class="eventos">
                <h2><?php 
                        echo $var['nome']; 
                ?></h2>
                <p><?php 
                        echo "Data do evento: " . $var['data']; 
                ?></p>
                <?php if (!empty($var['conteudo_imagem'])) { ?>
                        <div class="img-box"><img src="data:<?php echo $var['tipo_imagem']; ?>;base64,<?php echo base64_encode($var['conteudo_imagem']); ?>" alt="Imagem"></div>
                <?php } ?>
                <p><?php 
                        echo $var['texto']; 
                ?></p>
                <p><?php 
                        echo "Data da postagem: " . $var['tempo'];
                ?></p>    
        </div>
<?php }?>
</div>