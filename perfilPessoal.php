<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Perfil</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/styleMenu.css">
        <link rel="stylesheet" href="assets/style/stylePerfilPessoal.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <?php
            include_once("assets/php/conexao.php");
            session_start();

            if($_SESSION["situacaoLogin"] != true){
                exit();
            }
        ?>
        <script src="assets/js/menu.js"></script>
    </head>
    <body>
        <nav>

            <ul>
                <?php


                    if(isset($_SESSION["situacaoLogin"]) == true){
                        ?> <div class="menu-right1"><li class="itens-menu"><a id="abrir-menu" onclick="abrirMenu();"><img class="iconsMenu" src="assets/img/perfilicon.png" /></a></li>
                            <!-- Menu Lateral -->
                        <div class="menu-lateral">
                            <li class="itens-menu"><a href="index.php"><img class="iconsMenu" src="assets/img/home.png" /><span>Home</span></a></li>
                            <li class="itens-menu"><a href="perfilPessoal.php"><img class="iconsMenu" src="assets/img/perfilMenu.png" /><span>Perfil</span></a></li>
                            <?php if($_SESSION["usuario"] == "cuidador"){ ?> <li class="itens-menu"><a href="agendaPessoal.php"><img class="iconsMenu" src="assets/img/agenda.png" /><span>Agenda Pessoal</a></span></li><?php } ?>
                            <!-- <li class="itens-menu"><a href="#"><img class="iconsMenu" src="assets/img/configuracoes.png" /><span>Configurações</span></a></li> -->

                            <li class="itens-menu"><a href="assets/php/logout.php"><img class="iconsMenu" src="assets/img/logout.png"><span>Sair</span></a></li>
                            <li class="itens-menu"><a class="fechar-menu-button" onclick="fecharMenu()"><img class="iconsMenu" src="assets/img/close.png"></a></li>
                        </div>
                        <?php
                            if($_SESSION["usuario"] == "responsavel"){
                                ?> <li class="itens-menu"><a href="pesquisa.php"><img class="iconsMenu" src="assets/img/searchicon.png" /></a></li></div>
                                <?php
                            }else{
                                ?> </div> <?php
                            }

                    }else{
                        ?>
                        <div class="menu-right2"><li class="itens-menu"><a href="opUsuario.php?tipo=login">Login</a></li>
                        <li class="itens-menu"><a href="opUsuario.php?tipo=cadastro">Cadastro</a></li></div>
                        <?php
                    }
                ?>
                <div class="menu-left"><li class="itens-menu"><a href="#">Ajuda</a></li></div>
            </ul>
        </nav>

        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="container-perfil">
            <div class="container-perfil-conteudo">
                <div class="profile-image">
                    <img src="sua-imagem.jpg" alt="Sua Imagem">
                </div>

                <p class="dados-perfil">Nome: <?php echo$_SESSION["nome"]; ?></p>
                <p class="dados-perfil">Idade: <?php echo$_SESSION["dtNasc"]; ?></p>
                <p class="dados-perfil">Telefone: <?php echo$_SESSION["telefone"]; ?></p>
                
                <?php //se for cuidador mostrará os seguintes dados
                    if($_SESSION["usuario"] == "cuidador"){
                        ?> <p class="dados-perfil"><?php echo$_SESSION["registroProfissional"]; ?></p>
                        <p class="dados-perfil"><?php echo$_SESSION["descricao"]; ?></p>
                    <?php } ?>

                <p><a class="perfilMenu" href="updatePerfil.php">Editar Dados do Perfil</a></p>

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
        </div>

    </body>
</html>