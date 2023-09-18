<?php
if(isset($_POST['submit']))
{
    // print_r('Nome: '.$_POST['name']);
    // print_r('<br>');
    // print_r('Email: '. $_POST['email']);
    // print_r('<br>');
    // print_r('Telefone: '.$_POST['telefone']);
    // print_r('<br>');
    // print_r('Sexo: '.$_POST['genero']);
    // print_r('<br>');
    // print_r('Data de Nascimento: '.$_POST['data_nascimento']);
    // print_r('<br>');
    // print_r('Cidade: '.$_POST['cidade']);
    // print_r('<br>');
    // print_r('Estado: '.$_POST['estado']);
    // print_r('<br>');
    // print_r('Endereço: '.$_POST['endereco']);
    // print_r('<br>');

    include_once('config.php');

    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,sexo,data_nasc,cidade,estado,endereco) 
    VALUES ('$nome','$senha','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
        }
        .box{
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.4);
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 15px;
            width: 30%;
            color: white;
            box-shadow: 0px 0px 5px 0px #aaa;
        }
        fieldset{
            border:3px solid #333;
        }
        legend{
            border:1px solid #333;
            padding: 10px;
            text-align: center;
            background-color: #333;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .label_input{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5px;
        }
        .inputUser:focus ~ .label_input,
        .inputUser:valid ~ .label_input{
            top:-20px;
            font-size: 12px;
            color: #333;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: rgb(155, 155, 155);
            width: 100%;
            border: none;
            padding: 15px;
            color: black;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;  
        }
        #submit:hover{
            background-color: rgb(117, 114, 114);
        }
        .back{
            color: black;
            background-color: rgb(117, 114, 114);
            border: none;
            padding: 15px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
<a class="back" href="login2.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend> <b>Formulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="name" id="name" class="inputUser" required>
                    <label for="name" class="label_input">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="label_input">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="label_input">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="nome" class="label_input">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" name="genero" id="" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>  
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="telefone" class="inputUser" required>
                    <label for="telefone" class="label_input">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="label_input">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="label_input"> Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>