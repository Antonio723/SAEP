<?php

session_start();
require("../config/database.php");

$sql = " SELECT * FROM tbl_produto";

$row = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Produtos</title>
</head>

<body>
    <?php
    include("../componentes/header/header.php");
    ?>
    <div class="content">

        <section class="produtos-container">

            <?php
            if (isset($_SESSION["usuarioId"])) {
                //mostar os botoes somente caso o usuario esteja logado
            ?>
                <header>
                    <button onclick="javascript:window.location.href ='./novo/'">Novo Produto</button>
                    <button onclick="javascript:window.location.href ='../categorias'">Adicionar Categoria</button>
                </header>
            <?php
            }
            ?>

            <main>
                <?php
                while ($produto = mysqli_fetch_array($row)) {
                ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="/SAEP/images/<?= $produto["image"] ?>" alt="produto">
                        </div>
                        <div class="card-content">
                            <h3><?= $produto["name"] . $produto["id"] ?> </h3>
                            <p>R$ <?= $produto["price"] ?></p>
                            </br>
                            <p><b>Descrição</b></p>
                            <p><?= $produto["description"] ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-button" onclick="deletar(<?= $produto['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </div>
                            <div class="card-footer-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                    <path d="M16 5l3 3" />
                                    <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999" />
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <form id="form-deletar" method="POST" action="/SAEP/produtos/novo/acoes.php">
                    <input type="hidden" name="acao" value="deletar" />
                    <input id="produtoId" type="hidden" name="produtoId" />
                </form>
            </main>
        </section>
    </div>
</body>
<script lang="javascript">
    function deletar(produtoId) {
        if (confirm("Deseja realmente excluir este produto?")) {
            document.querySelector('#produtoId').value = produtoId;
            document.querySelector('#form-deletar').submit();
        }
    }
</script>


</html>