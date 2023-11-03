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

                    $idade = $_SESSION["dtNasc"];
                    $dataAtual = new DateTime();
                    $idade = new DateTime($idade);
                    $idade = $dataAtual->diff($idade)->y;

                    switch ($_SESSION["estado"]) {
                        case "AC":
                            $_SESSION["estado"] = "Acre";
                            break;
                        case "AL":
                            $_SESSION["estado"] = "Alagoas";
                            break;
                        case "AP":
                            $_SESSION["estado"] = "Amapá";
                            break;
                        case "AM":
                            $_SESSION["estado"] = "Amazonas";
                            break;
                        case "BA":
                            $_SESSION["estado"] = "Bahia";
                            break;
                        case "CE":
                            $_SESSION["estado"] = "Ceará";
                            break;
                        case "DF":
                            $_SESSION["estado"] = "Distrito Federal";
                            break;
                        case "ES":
                            $_SESSION["estado"] = "Espírito Santo";
                            break;
                        case "GO":
                            $_SESSION["estado"] = "Goiás";
                            break;
                        case "MA":
                            $_SESSION["estado"] = "Maranhão";
                            break;
                        case "MT":
                            $_SESSION["estado"] = "Mato Grosso";
                            break;
                        case "MS":
                            $_SESSION["estado"] = "Mato Grosso do Sul";
                            break;
                        case "MG":
                            $_SESSION["estado"] = "Minas Gerais";
                            break;
                        case "PA":
                            $_SESSION["estado"] = "Pará";
                            break;
                        case "PB":
                            $_SESSION["estado"] = "Paraíba";
                            break;
                        case "PR":
                            $_SESSION["estado"] = "Paraná";
                            break;
                        case "PE":
                            $_SESSION["estado"] = "Pernambuco";
                            break;
                        case "PI":
                            $_SESSION["estado"] = "Piauí";
                            break;
                        case "RJ":
                            $_SESSION["estado"] = "Rio de Janeiro";
                            break;
                        case "RN":
                            $_SESSION["estado"] = "Rio Grande do Norte";
                            break;
                        case "RS":
                            $_SESSION["estado"] = "Rio Grande do Sul";
                            break;
                        case "RO":
                            $_SESSION["estado"] = "Rondônia";
                            break;
                        case "RR":
                            $_SESSION["estado"] = "Roraima";
                            break;
                        case "SC":
                            $_SESSION["estado"] = "Santa Catarina";
                            break;
                        case "SP":
                            $_SESSION["estado"] = "São Paulo";
                            break;
                        case "SE":
                            $_SESSION["estado"] = "Sergipe";
                            break;
                        case "TO":
                            $_SESSION["estado"] = "Tocantins";
                            break;
                        default:
                            $_SESSION["estado"] = "Estado não encontrado";
                            break;
                    }


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
                    <img src="<?php echo$_SESSION["foto"]; ?>" />
                </div>

                <p class="dados-perfil"><span>Nome: </span><?php echo$_SESSION["nome"]; ?></p>
                <p class="dados-perfil"><span>Idade: </span><?php echo$idade; ?></p>
                <p class="dados-perfil"><span>Telefone: </span><?php echo$_SESSION["telefone"]; ?></p>
                
                <?php //se for cuidador mostrará os seguintes dados
                    if($_SESSION["usuario"] == "cuidador"){
                        ?> <p class="dados-perfil"><span>Registro: </span><?php echo$_SESSION["registroProfissional"]; ?></p>
                        <p class="dados-perfil"><span>Descrição: </span><?php echo$_SESSION["descricao"]; ?></p>
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


        <!-- AQUI TEM QUE FAZER -->
        <?php
            if($_SESSION["usuario"] == "cuidador"){
                $sqlVerificarConsulta = mysqli_query($con, "SELECT * FROM consulta WHERE id_cuidador=".$_SESSION["id"]);
            }else if($_SESSION["usuario"] == "responsavel"){
                $sqlVerificarConsulta = mysqli_query($con, "SELECT * FROM consulta WHERE id_responsavel=".$_SESSION["id"]);
            }

            if(mysqli_num_rows($sqlVerificarConsulta) == 0){
                echo"<center><h1>Não há consultas agendadas no momento!</h1></center>";
            }else{
                ?>
                <br><br><br>
                <div class="container-consulta">
                    <h1>Consultas:</h1>
                        <table border="1">
                            <tr>
                                <td><p class="title-table">Idoso:</p></td>
                                <td><p class="title-table"><?php if($_SESSION["usuario"] == "cuidador"){ ?> Responsável: <?php }else{ ?> Cuidador: <?php } ?></p></td>
                                <td><p class="title-table">Turno da Consulta:</p></td>
                                <td><p class="title-table">Dia da consulta:</p></td>
                                <td><p class="title-table">Hora de início da consulta:</p></td>
                                <td><p class="title-table">Hora do término da consulta:</p></td>
                                <td><p class="title-table">Valor da consulta:</p></td>
                                <td><p class="title-table"><?php if($_SESSION["usuario"] == "cuidador"){ ?> Dados do Idoso: <?php }else{ ?> Situação da Consulta: <?php } ?></p></td>
                                <?php if($_SESSION["usuario"] == "cuidador"){ ?> <td colspan="2"><p class="title-table">Aceitar ou recusar consulta:</p></td> <?php } ?>
                            </tr>
                <?php
                //pega os dados da consulta
                while($dadosConsulta = mysqli_fetch_assoc($sqlVerificarConsulta)){
                    $id_consulta[] = $dadosConsulta["id_consulta"];
                    $id_agenda[] = $dadosConsulta["id_agenda"];
                    $id_cuidador[] = $dadosConsulta["id_cuidador"];
                    $id_idoso[] = $dadosConsulta["id_idoso"];
                    $id_responsavel[] = $dadosConsulta["id_responsavel"];
                    $status = $dadosConsulta["statusConsulta"];

                    $id_agenda_list = implode(',', $id_agenda);
                    $id_idoso_list = implode(',', $id_idoso);
                    $id_cuidador_list = implode(',', $id_cuidador);
                    $id_responsavel_list = implode(',', $id_responsavel);
                    $id_consulta_list = implode(',', $id_consulta);

                    //pega os dados da agenda
                    $sqlAgenda = mysqli_query($con, "SELECT * FROM agenda WHERE id_agenda IN ($id_agenda_list)");
                    while($dadosAgenda = mysqli_fetch_assoc($sqlAgenda)){
                        $hora_inicio = $dadosAgenda["hora_inicio"];
                        $hora_saida = $dadosAgenda["hora_saida"];
                        $turno = $dadosAgenda["turno"];
                        $diaSemana = $dadosAgenda["dia_semana"];

                        switch($diaSemana){
                            case "dom":
                                $diaSemana = "Domingo";
                                break;
                            case "seg":
                                $diaSemana = "Segunda-feira";
                                break;
                            case "ter":
                                $diaSemana = "Terça-feira";
                                break;
                            case "qua":
                                $diaSemana = "Quarta-feira";
                                break;
                            case "qui":
                                $diaSemana = "Quinta-feira";
                                break;
                            case "sex":
                                $diaSemana = "Sexta-feira";
                                break;
                            case "sab":
                                $diaSemana = "Sábado";
                                break;
                        }

                        switch($turno){
                            case "m":
                                $turno = "Manhã";
                                break;
                            case "t":
                                $turno = "Tarde";
                                break;
                            case "n":
                                $turno = "Noite";
                                break;
                        }

                        if($status == 1){
                            $status = "Consulta aceita pelo cuidador!";
                        }else{
                            $status = "Agurdando confirmação do cuidador!";
                        }

                        $precoTurno = $dadosAgenda["preco_turno"];
                    }


                    //Pega os dados do idoso
                    $sqlIdoso = mysqli_query($con, "SELECT id_idoso, nome FROM idoso WHERE id_idoso IN ($id_idoso_list)");
                    while($dadosIdoso = mysqli_fetch_assoc($sqlIdoso)){
                        $nome_idoso = $dadosIdoso["nome"];
                        $id_idoso_geral = $dadosIdoso["id_idoso"];
                    }

                    //Pega os dados do cuidador
                    if($_SESSION["usuario"] == "responsavel"){
                        $sqlCuidador = mysqli_query($con, "SELECT nome FROM cuidador WHERE id_cuidador IN ($id_cuidador_list)");
                        while($dadosCuidador = mysqli_fetch_assoc($sqlCuidador)){
                            $nome_cuidador = $dadosCuidador["nome"];
                        }
                    }


                    //Pega os dados do responsavel
                    if($_SESSION["usuario"] == "cuidador"){
                        $sqlresponsavel = mysqli_query($con, "SELECT nome FROM responsavel WHERE id_responsavel IN ($id_responsavel_list)");
                        while($dadosresponsavel = mysqli_fetch_assoc($sqlresponsavel)){
                            $nome_responsavel = $dadosresponsavel["nome"];
                        }
                    }
                ?>
    
                            <tr>
                                <td><p><?php echo $nome_idoso; ?></p></td>
                                <td><p><?php if($_SESSION["usuario"] == "responsavel"){ echo $nome_cuidador; } else{ echo $nome_responsavel; } ?></p></td>
                                <td><p><?php echo $turno; ?></p></td>
                                <td><p><?php echo $diaSemana; ?></p></td>
                                <td><p><?php echo $hora_inicio; ?></p></td>
                                <td><p><?php echo $hora_saida; ?></p></td>
                                <td><?php echo$precoTurno; ?></p></td>

                                <!-- FAZER ISSO AQUI -->
                                <?php
                                    if($_SESSION["usuario"] == "cuidador"){//mostra a oção de verificar os dados do idoso e os botões para aceitar ou não a consulta
                                        ?> <td><p><a class="verificarDadosIdoso" href="dadosIdosoCuidador.php?idIdoso=<?php echo$id_idoso_geral; ?>">Verificar Dados</a></p></td>
                                        <?php
                                        if($status == 0){//se a consulta ainda não foi aceita
                                        ?>
                                           <form method="POST" action="" name="">
                                                <td><p><a class="btnStatus" href="assets/php/statusConsulta.php?idConsulta=<?php echo$id_consulta_list; ?>&status=1"><img class="imgBtnStatus" src="assets/img/check.png" /></a></p></td>
                                                <td><p><a class="btnStatus" href="assets/php/statusConsulta.php?idConsulta=<?php echo$id_consulta_list; ?>&status=0"><img class="imgBtnStatus" src="assets/img/close.png" /></a></p></td>
                                           </form>
                                    <?php } else{ //se a consulta foi aceita
                                        ?>
                                            <td><p>Consulta aceita!</p></td>
                                        <?php
                                    } }

                                    if($_SESSION["usuario"] == "responsavel"){
                                        ?> <td><p>Consulta aceita!</p></td>

                                    <?php
                                    }
                                ?>
                            </tr>
                        
                <?php
                }
            }
        ?>
            </table>
        </div>

        <style>
            .imgBtnStatus{
                width: 3vw;
            }

            .imgBtnStatus:hover{
                opacity: 0.5;
            }
        </style>

    </body>
</html>