<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <link rel="stylesheet" href="assets/style/styleMenu.css">

        <?php
            include_once("assets/php/conexao.php");
            session_start();

            if($_SESSION["situacaoLogin"] != true){
                exit();
            }
        ?>

    </head>
    <body>
        <nav>
        <ul>
            <li><?php
                    if(isset($_SESSION["situacaoLogin"])){
                        ?><p><a href="perfilPessoal.php">Perfil</a></li></p><?php
                    }else{
                        ?>
                        <li><p><a href="opUsuario.php?tipo=login">Login</a></p></li>
                        <li><p><a href="opUsuario.php?tipo=cadastro">Cadastro</a></p></li>
                        <?php
                    }
                ?>
                <?php
                    if(isset($_SESSION["usuario"]) == "responsavel"){
                ?>

                <li><p><a href="pesquisa.php">Pesquisa</a></p></li>

                <?php } ?></li>
        </ul>
    </nav>

        <div><br>
            <p><?php echo$_SESSION["id"]; ?></p>
            <p><?php echo$_SESSION["nome"]; ?></p>
            <p><?php echo$_SESSION["dtNasc"]; ?></p>
            
            <?php //se for cuidador mostrará os seguintes dados
                if($_SESSION["usuario"] == "cuidador"){
                    ?> <p><?php echo$_SESSION["registroProfissional"]; ?></p>
                    <p><?php echo$_SESSION["descricao"]; ?></p>
                <?php } ?>

            <p><a class="perfilMenu" href="updatePerfil.php">Editar Dados do Perfil</a></p>
            <p><a class="perfilMenu" href="assets/php/logOut.php">Sair</a></p>

            <?php
                if($_SESSION["usuario"] == "cuidador"){
                    ?> <p><a class="perfilMenu" href="agendaPessoal.php">Editar Agenda</a></p> 
                <?php }
            ?>

            <?php
                if($_SESSION["usuario"] == "responsavel"){
                    ?> <p><a class="perfilMenu" href="idosos.php">Gerenciar idosos</a></p>
                    <?php }
            ?>

        </div>

        <style>
            .perfilMenu{
                color: black;
            }
        </style>
    </body>
</html>