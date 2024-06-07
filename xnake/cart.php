<?php
include 'includes/db.php';
include 'includes/cart.php';

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    add_to_cart($_GET['id']);
    header("Location: cart.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    remove_from_cart($_GET['id']);
    header("Location: cart.php");
    exit();
}

$cart_items = get_cart();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="icon" href="./images/xnakelogopreta.png" type="image/x-icon">
    <link rel="stylesheet" href="css/outros.css">
</head>
<body>
    
    <div class="centraliza">
        <div class="xnake"><img src="images/xnakelogopreta.png" alt="logo xnake"></div>
    </div>
    <div class="centraliza">
        <h1 id="nome-carrinho" class="titulo-colecao">Meu Carrinho</h1>
    </div>

    <div class="container-item">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?php echo $item['nome']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['preco']; ?></td>
                            <td><?php echo $item['preco'] * $item['quantity']; ?></td>
                            <td class="remover">
                                <a id="remover" href="cart.php?action=remove&id=<?php echo $item['id']; ?>">Limpar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="centraliza">
        <div class="botaof">
            <a id="continuar" href="index.php">Continuar Comprando</a>
        </div>
        <div class="botaof">
            <a id="finalizar" href="checkout.php">Pagamento</a>
        </div>
        </div>
    </div>
</body>
</html>
