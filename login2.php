<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
        }

        h1 {
            margin: 0;
        }
        div{
            background-color: rgba(0, 0, 0, 0.4);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 60px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .inputSubmit{
            background-image: rgb(155, 155, 155);
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
        }
        .inputSubmit:hover{
            background-color: rgb(117, 114, 114);
            cursor: pointer;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .back{
            color: black;
            background-color: rgb(117, 114, 114);
            border: none;
            padding: 15px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            color: white;
        }


    </style>
</head>
<body>
    <header>
        <h1>Comércio Eletrônico</h1>
        
    </header>
    <a class="back" href="loja.php">Voltar</a>
    <div>
        <h1><b>Login</b></h1>
        <form action="testlogin.php" method="POST">
        <input type="text" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        <br><br>
        <a href="formulario.php">Não tem uma conta? Registre aqui</a>
        </form>
    </div>
</body>
</html>