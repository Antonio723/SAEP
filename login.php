<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <a id="menu-admin">Login</a>
        </ul>
    </nav>
    <div class="container-login" id="container-login">
        <h1>Fazer login</h1>
        <form method="POST" action="/SAEP/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="login" />
            <input type="text" name="usuario" placeholder="Usuário" />
            <input type="password" name="senha" placeholder="Senha" />
            <button>Entrar</button>
        </form>
    </div>
</body>

</html>