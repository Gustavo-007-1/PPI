<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nexum</title>
    <link rel="stylesheet" href="./assets/css.css">

</head>
<body>
    <div class="fundo">
        <div class="tela_login">
            
            <form action="login.php" method="POST">
                <div class="fonte_titulo">
                    <br> <div class="div_fantasma"> </div> <label>LOGIN</label><img src="./assets/imagens/IF.png" class="logo_IF">   <br> <br> <br>
                </div>
                <div>
                    <label>CPF</label> <br> 
                    <input class="tabela" type="text" name="cpf"> <br> <br>
                </div>
                <div>
                    <label>Senha</label> <br> 
                    <input class="tabela" type="password" name="senha">
                </div>
                <div>
                    <br> <button class="botao_verde" type="submit">Entrar</button> <br>
                </div>
                <div > 
                    <a class="botao_cancelar" href="https://www.google.com"> Cancelar </a> <br> <br>
                </div>
                <div>
                    <a href = "https://www.youtube.com/watch?v=yxUxNjZuIDA" class="botao_esqueci_senha">Esqueci minha senha </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>