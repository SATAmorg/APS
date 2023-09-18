<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['$email']);
        unset($_SESSION['$senha']);
        header('lodation: login2.php');
    }
    //$logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
    <style>
        /* Estilos CSS aprimorados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            position: relative;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative; /* Adicionado */
        }

        h1 {
            margin: 0;
        }

        .d-flex {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            position: absolute;
            top: 20px;
            right: 100px; /* Ajustado para evitar sobreposição */
        }

        .d-flex:hover {
            background-color: #0056b3;
        }

        /* Ícone do carrinho */
        .cart-icon {
            position: absolute;
            top: 25px;
            right: 20px; /* Ajustado para evitar sobreposição */
            font-size: 24px;
            cursor: pointer;
        }

        .cart-icon i {
            color: #007bff;
        }

        /* Conteúdo do carrinho */
        #cart-content {
            position: absolute;
            top: 60px;
            right: 20px;
            background-color: white;
            border: 1px solid #ccc;
            width: 250px;
            padding: 10px;
            border-radius: 5px;
            display: none;
            box-shadow: 0px 0px 5px 0px #aaa;
        }

        #cart-content .total {
            text-align: right;
            margin-bottom: 10px;
        }

        #cart-content button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        #cart-content button:hover {
            background-color: #1e7e34;
        }

        /* Lista de produtos */
        #product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .product-item {
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            width: 200px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px #aaa;
            position: relative; /* Adicionado */
        }

        .product-item img {
            max-width: 100%;
            height: auto;
        }

        .product-item h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #333;
        }

        .product-item p {
            font-size: 1rem;
            color: #777;
        }

        .product-item button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .product-item button:hover {
            background-color: #1e7e34;
        }
        a{
            text-decoration: none;
        }
        
    </style>
    <title>Comércio Eletrônico</title>
</head>
<body>
<?php
        echo "<h1>Bem vindo</h1>";
    ?>
    <header>
        <h1>Comércio Eletrônico</h1>
        <div class="cart-icon" id="cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a class="d-flex" href="sair.php">Sair</a>
        <button class="login-button" id="logout-button" style="display: none;">Logout</button>
    </header>
    
    <div id="product-list">
        <!-- Lista de produtos será preenchida com JavaScript -->
    </div>

    <div id="cart-content">
        <div class="total">
            Total: R$ <span id="cart-total">0.00</span>
        </div>
        <button id="checkout-button">Finalizar Compra</button>
    </div>
    
    <div id="cart">
        <h2>Carrinho de Compras</h2>
        <ul id="cart-items">
            <!-- Itens do carrinho serão preenchidos com JavaScript -->
        </ul>
    </div>

    
    <script>
        // Dados de exemplo (você precisa de um servidor e um banco de dados real)
        const products = [
            { id: 1, name: 'Iphone 11 Branco 64GB ' , price: 2699, image: 'iphone.jpg' },
            { id: 2, name: 'S23 ultra 5G Preto 256GB', price: 7199, image: 's23.jpg' },
            { id: 3, name: 'Xaomi 12S ultra 5G 512GB', price: 7416.14, image: 'xaomi.jpg' }
        ];

        const cart = [];

        let currentUser = null;

        // Função para calcular o total do carrinho
        function calculateCartTotal() {
            let total = 0;
            cart.forEach(item => {
                total += item.price;
            });
            return total.toFixed(2);
        }

        // Função para exibir a lista de produtos
        function displayProducts() {
            const productList = document.getElementById('product-list');
            productList.innerHTML = '';

            products.forEach(product => {
                const productItem = document.createElement('div');
                productItem.className = 'product-item';
                productItem.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p>Preço: R$ ${product.price.toFixed(2)}</p>
                    <button onclick="addToCart(${product.id})">Adicionar ao Carrinho</button>
                `;
                productList.appendChild(productItem);
            });
        }

        // Função para adicionar um produto ao carrinho
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            if (product) {
                cart.push(product);
                updateCart();
            }
        }

        // Função para atualizar o carrinho
        function updateCart() {
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            cartItems.innerHTML = '';

            let total = 0;

            cart.forEach(item => {
                const cartItem = document.createElement('li');
                cartItem.innerText = `${item.name} - R$ ${item.price.toFixed(2)}`;
                cartItems.appendChild(cartItem);
                total += item.price;
            });

            cartTotal.textContent = total.toFixed(2);
        }

        // Função para mostrar ou ocultar o conteúdo do carrinho
        function toggleCartContent() {
            const cartContent = document.getElementById('cart-content');
            if (cartContent.style.display === 'block') {
                cartContent.style.display = 'none';
            } else {
                cartContent.style.display = 'block';
            }
        }

        // Event listeners
        document.getElementById('logout-button').addEventListener('click', () => {
            logout();
        });

        document.getElementById('cart-icon').addEventListener('click', () => { /////////////
            toggleCartContent();
        });

        // Event listener para o botão "Finalizar Compra"
        document.getElementById('checkout-button').addEventListener('click', () => {
            // Obtenha o valor total do carrinho
            const cartTotal = calculateCartTotal();

            // Armazene o valor do carrinho no localStorage
            localStorage.setItem('cartTotal', cartTotal);

            // Redirecione para a página pix.html
            window.location.href = 'pix.html';
        });

        // Inicialização
        displayProducts();
    </script>
</body>
</html>
