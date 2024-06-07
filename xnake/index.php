<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xnake PE</title>
    <link rel="icon" href="./images/xnakelogopreta.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1 /slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>

<body>
<!-- Navbar -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><a id="logo-text" href="">XNAKE</a></label>
        <ul>
            <li><a id="nav-buton" href="#colecao-ink">Coleção INK</a></li>
            <li><a id="nav-buton" href="cart.php">Ver Carrinho</a></li>
        </ul>
    </nav>

<!-- Carrossel -->
    <div class="Carrossel">
        <div class="carousel">
            <div><img src="./images/Camada_6.png" alt="Imagem 1"></div>
            <div><img src="./images/graffiti_painel.png" alt="Imagem 2"></div>
        </div>
    </div>

<?php
include 'includes/db.php';
include 'includes/cart.php';

$result = $conn->query("SELECT * FROM produtos");
$produtos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Titulo coleção -->
<section>
    <div class="centraliza">
        <h1 id="colecao-ink" class="titulo-colecao">- Coleção INK -</h1>
    </div>

<!-- Itens INK -->
<div class="itens">
    <?php foreach ($produtos as $produto): ?>
        <div class="container-item">
            <img id="img-item" src="images/<?php echo $produto['imagem']; ?>" alt="">
            <h1 id="text-item"><?php echo $produto['nome']; ?></h1>
            <p id="desc-item">Em Estoque.</p>
            <div class="butons-itens">
                <a id="buton-compra" href="cart.php?action=add&id=<?php echo $produto['id']; ?>">Comprar</a>
                <a id="buton-carro" href="cart.php?action=add&id=<?php echo $produto['id']; ?>">
                    <img id="carrinho" src="images/Carrinho.png" alt="">
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</section>

<script src="js/script.js"></script>
</body>
</html>
