<?php
//Tela de Login
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../view/TeladeLogin.css">
    <title>Hospital Goiás</title>
    <link rel="shortcut icon" href="../imagens/logo_tittle.png">
    <style>
        .btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.btn-outline-light {
    background: white;
    color: black;
    border-color: #ced4da;
    margin-right: 20px;
    font-size: 0.9rem;
    text-decoration: none;
}

.btn-outline-light:hover {
    border-color: #ced4da;
}

.btn-personalizado {
    margin-right: 37px;
    width: 168px;
    font-size: 0.9rem;
    background-color: #03e9f4;
    color: white;
}

.btn-personalizado:hover {
    color: white;
}

    </style>
</head>
<body>
    <div class="login">
        <h2>Cadastro</h2>
        <form method="post" action="V_Cadastro.php">
        <div class="principal">
                <input type="text" name="nome" required="" autocomplete="off">
                <label>Nome</label>
            </div>
            <div class="principal">
                <input type="text" name="usuario" required="" autocomplete="off">
                <label>Username</label>
            </div>

            <div class="principal">
                <input type="password" name="senha" required="" autocomplete="off">
                <label>Senha</label>
            </div>


            <?php
                        if(isset($_SESSION['status_cadastro'])):
                            ?>
                    <div class="noti">
                      <p>Cadastro efetuado!</p>

                    </div>
                    <?php 
endif;
unset($_SESSION['status_cadastro']);
                    ?>
                    <?php
                    if(isset($_SESSION['usuario_existe'])):
                    ?>
                    <div class="noti">
                        <p>O usuário escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
endif;
unset($_SESSION['usuario_existe']);
                    ?>


       


					<div>
						<button type="submit" class="btn btn-personalizado" id="#">Registrar</button>
                        <a href="P_login.php"> <p class="btn btn-outline-light" id="#">Voltar</p> </a>
					</div>
    
        </form>
        
    
</body>
</html>