<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelpOlder</title>
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/style/indexStyle.css">
    <link rel="stylesheet" href="assets/style/styleMenu.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

    <script src="assets/js/carrossel.js"></script>
    <script src="assets/js/menu.js"></script>

</head>
<body>

    <nav>

        <ul>
                <?php
                    session_start();


                    if(isset($_SESSION["situacaoLogin"]) == true){
                        ?> <div class="menu-right1"><li class="itens-menu"><a id="abrir-menu" onclick="abrirMenu();"><img class="iconsMenu" src="assets/img/perfilicon.png" /></a></li>
                            <!-- Menu Lateral -->
                        <div class="menu-lateral">
                            <li class="itens-menu"><a href="index.php"><img class="iconsMenu" src="assets/img/home.png" /><span>Home</span></a></li>
                            <li class="itens-menu"><a href="perfilPessoal.php"><img class="iconsMenu" src="assets/img/perfilMenu.png" /><span>Perfil</span></a></li>
                            <?php if($_SESSION["usuario"] == "cuidador"){ ?> <li class="itens-menu"><a href="agendaPessoal.php"><img class="iconsMenu" src="assets/img/agenda.png" /><span>Agenda Pessoal</a></span></li><?php } ?>
                            <li class="itens-menu"><a href="#"><img class="iconsMenu" src="assets/img/configuracoes.png" /><span>Configurações</span></a></li>

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

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/img/logo.png" alt="Imagem 1">
            </div>
            <div class="swiper-slide">
                <img src="assets/img/cuidadores.png" alt="Imagem 2">
            </div>
            <div class="swiper-slide">
                <img src="assets/img/nossoprojetoajuda.png" alt="Imagem 3">
            </div>
        </div>
        <div class="swiper-pagination custom-pagination"></div>
    </div>
    
    
    <section id="como-surgiu" class="conteudo">
        <div class="titulo">
            <h2>Como surgiu?</h2>
        </div>
        <div class="texto">
            <p>A partir da análise do crescimento na procura por cursos de cuidadores de idosos, e do recorrente envelhecimento da população brasileira, como aponta o 
                IPEA com os estudos de 2022, surge o projeto Help Older, que consiste em atender de forma eficiente o público que precisa de cuidados em casa.
            </p>
        </div>
    </section>
    <section id="o-que-e-o-helpolder" class="conteudo">
        <div class="titulo">
            <h2>O que é o HelpOlder?</h2>
        </div>
        <div class="texto">
            <p>Sua ideia é substituir outros meios de comunicação, como o Facebook, Instagram, Telegram e WhatsApp para a procura de cuidadores de idosos, ou seja, 
                integrar profissionais da área em uma única plataforma, integrando trabalhador e cliente. Dessa forma, o projeto concilia profissionais com certificação 
                para cuidar de idosos, profissionais da saúde, pessoas responsáveis por idosos e instituições de cuidados para idosos.</p>
        </div>
    </section>
    <section id="fase-do-projeto" class="conteudo">
        <div class="titulo">
            <h2>Fase do projeto</h2>
        </div>
        <div class="texto">
            <p>Atualmente o projeto se encontra em sua fase de prototipação. Ou seja, após a análise de sua ideia, e a viabilização do mesmo, o projeto encontra-se em desenvolvimento
                de seu protótipo, afim de analisar o funcionamento da plataforma.
            </p>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>