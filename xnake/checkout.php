<?php
session_start();
require_once 'includes/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];

    switch ($payment_method) {
        case 'pix':
            $message = "Pedido finalizado com pagamento via PIX.";
            break;
        case 'boleto':
            $message = "Pedido finalizado com pagamento via Boleto.";
            break;
        case 'cartao':
            $message = "Pedido finalizado com pagamento via Cartão de Crédito.";
            break;
        default:
            $message = "Método de pagamento inválido.";
            break;
    }

    $_SESSION['cart'] = array();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Finalizar Pedido</title>
    <link rel="stylesheet" href="css/outros.css">
    <link rel="icon" href="./images/xnakelogopreta.png" type="image/x-icon">
</head>
<body>
     
    <div class="centraliza">
        <div class="xnake"><img src="images/xnakelogopreta.png" alt="logo xnake"></div>
    </div>
    <div class="centraliza">
        <h1 id="nome-carrinho" class="titulo-colecao">Método de Pagamento</h1>
    </div>

    <div class="container-item">
        <div class="container">

            <form method="POST" action="checkout.php">
            <label>
                <input type="radio" name="payment_method" value="pix" required> PIX
            </label><br>
            <label>
                <input type="radio" name="payment_method" value="boleto" required> Boleto
            </label><br>
            <label>
                <input type="radio" name="payment_method" value="cartao" required> Cartão de Crédito
            </label><br>

            <div class="centraliza">
                <div class="botaof">
                    <a id="voltar" href="cart.php">Voltar</a>
                </div>
                <div class="botaof">
                    <a id="continuar" href="index.php">Continuar Comprando</a>
                </div>
                <div class="botaof">
                    <button id="finalizar" type="submit">Finalizar Pedido</button>
                </div>
             </div>
            </form>
         </div>
    </div>

    <?php if ($message):?>
        <script>
            alert('<?php echo $message; ?>');
        </script>
    <?php endif; ?>

</body>
</html>
