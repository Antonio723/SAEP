<?php


?>
<link rel="stylesheet" href="/SAEP/componentes/header/header.css">

<?php
if (isset($_SESSION["mensagem"])) {
?>
    <div class="mensagem">
        <?= $_SESSION["mensagem"]; ?>
    </div>
    <script lang="javascript">
        setTimeout(() => {
            document.querySelector('.mensagem').style.display = "none";
        }, 2000)
    </script>
<?php
    unset($_SESSION["mensagem"]);
}
?>

<header class="header">
    <figure>
        <a href="/SAEP">
            <img src="/imgs/logo.png" />
        </a>
    </figure>
    <?php
    if (!isset($_SESSION["usuarioId"])) {
        header("location: /SAEP/login.php");
    }else {
    ?>
        <nav>
            <ul>
                <a id="menu-admin" onclick="logout()">Sair</a>
            </ul>
        </nav>
        <form id="form-logout" style="display: none;" method="POST" action="/SAEP/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="logout" />
        </form>
    <?php
    }
    ?>
</header>
<script lang="javascript">
    function logout() {
        document.querySelector('#form-logout').submit();
    }
    document.querySelector("#menu-admin").addEventListener("click", toggleLogin);

    function toggleLogin() {
        let containerLogin = document.querySelector("#container-login");
        let formContainer = document.querySelector("#container-login > form");
        let h1Container = document.querySelector("#container-login > h1");

        if (containerLogin.style.opacity == 0) {
            formContainer.style.display = "flex";
            h1Container.style.display = "block";
            containerLogin.style.opacity = 1;
            containerLogin.style.height = "200px";
        } else {
            formContainer.style.display = "none";
            h1Container.style.display = "none";
            containerLogin.style.opacity = 0;
            containerLogin.style.height = "0px";
        }
    }

</script>