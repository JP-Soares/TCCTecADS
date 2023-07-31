<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <?php
            include_once("assets/php/conexao.php");
            session_start();

            if($_SESSION["situacaoLogin"] != true){
                exit();
            }
        ?>

    </head>
    <body>
        <div>
            <p><?php echo$_SESSION["id"]; ?></p>
            <p><?php echo$_SESSION["nome"]; ?></p>
            <p><?php echo$_SESSION["dtNasc"]; ?></p>
            
            <?php //se for cuidador mostrará os seguintes dados
                if($_SESSION["usuario"] == "cuidador"){
                    ?> <p><?php echo$_SESSION["registroProfissional"]; ?></p>
                    <p><?php echo$_SESSION["descricao"]; ?></p>
                <?php } ?>

            <p><a href="updatePerfil.php">Editar Dados do Perfil</a></p>
            <p><a href="assets/php/logOut.php">Sair</a></p>

            <?php
                if($_SESSION["usuario"] == "cuidador"){
                    ?> <p><a href="agendaPessoal.php">Editar Agenda</a></p> 
                <?php }
            ?>

        </div>
    </body>
</html>