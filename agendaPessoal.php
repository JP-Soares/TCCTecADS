<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||AgednaPessoal</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/styleAgendaPessoal.css">
        <link rel="stylesheet" href="assets/style/btnVoltar.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <script src="assets/js/btnVoltar.js"></script>
    </head>
    <body>
        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <?php
            session_start();
            include_once("assets/php/conexao.php");

            $sqlVerifyAgenda = mysqli_query($con, "SELECT * FROM agenda WHERE id_cuidador = ".$_SESSION["id"]);

            if(mysqli_num_rows($sqlVerifyAgenda) > 0){
                while($dadosAgenda = mysqli_fetch_assoc($sqlVerifyAgenda)){
                    // echo"<br>Dia: ".$dadosAgenda["dia_semana"];
                    // echo"<br>Turno: ".$dadosAgenda["turno"];
                    // echo"<br>Hora Inicio: ".$dadosAgenda["hora_inicio"];
                    // echo"<br>Hora Saida: ".$dadosAgenda["hora_saida"];
                    // echo"<br>Preco: ".$dadosAgenda["preco_turno"]."<br><br>";
    
                    $dia[] = $dadosAgenda["dia_semana"];
                    $turno[] = $dadosAgenda["turno"];
                    $hora_inicio[] = $dadosAgenda["hora_inicio"];
                    $hora_saida[] = $dadosAgenda["hora_saida"];
                    $preco[] = $dadosAgenda["preco_turno"];
    
                } 
            }
            

            // Array para armazenar os IDs de agenda cadastrados na tabela consulta
            $idsAgendaCadastrados = array();

            // Consulta para obter os IDs de agenda cadastrados na tabela consulta
            $sqlConsulta = "SELECT id_agenda FROM consulta WHERE id_cuidador = " . $_SESSION['id'];
            $resultConsulta = $con->query($sqlConsulta);

            // Verifica se a consulta foi bem-sucedida e preenche o array
            if ($resultConsulta) {
                while ($row = $resultConsulta->fetch_assoc()) {
                    $idsAgendaCadastrados[] = $row['id_agenda'];
                }
            }

        ?>

        <div id="container-agenda">
            <form id="form" name="" method="POST" action="assets/php/cadastrarAgenda.php">
                <h1>Faça sua programação semanal!</h1>

                <table class="tabela-agenda" border="1">
                    <tr>
                        <td><input type="checkbox" value="domingo" name="diaSemana[]" onclick="dia_semana(this);" id="dom" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom"){ ?> checked <?php } } } ?>/><p>Domingo</p></td>
                        <td><input type="checkbox" value="segunda" name="diaSemana[]" onclick="dia_semana(this);" id="seg" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg"){?> checked <?php } } } ?>/><p>Segunda-Feira</p></td>
                        <td><input type="checkbox" value="terca" name="diaSemana[]" onclick="dia_semana(this);" id="ter" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter"){?> checked <?php } } } ?>/><p>Terça-Feira</p></td>
                        <td><input type="checkbox" value="quarta" name="diaSemana[]" onclick="dia_semana(this);" id="qua" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua"){?> checked <?php } } } ?>/><p>Quarta-Feira</p></td>
                        <td><input type="checkbox" value="quinta" name="diaSemana[]" onclick="dia_semana(this);" id="qui" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui"){?> checked <?php } } } ?>/><p>Quinta-Feira</p></td>
                        <td><input type="checkbox" value="sexta" name="diaSemana[]" onclick="dia_semana(this);" id="sex" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex"){?> checked <?php } } } ?>/><p>Sexta-Feira</p></td>
                        <td><input type="checkbox" value="sabado" name="diaSemana[]" onclick="dia_semana(this);" id="sab" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab"){?> checked <?php } } } ?>/><p>Sábado</p></td>
                    </tr>

                    <tr class="dias-agenda">
                        <!--Domingo-->
                        <td id="domingo"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" class="m" id="manhaCheck0" value="manha0" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m"){?> checked <?php } } } ?>/>
                            <div id="manha0"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled > 
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                            </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled >
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="precoTurno" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>" />
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div><br>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde0" id="tardeCheck0" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t"){?> checked <?php } } } ?>/>
                        <div id="tarde0"><label>Hora de início: </label><select class="horaSelect" disabled name="horaInicio[]" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[2].disabled = false; </script> <?php } } } ?> 
                            <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[3].disabled = false; </script> <?php } } } ?>
                                <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite0" id="noiteCheck0" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n"){?> checked <?php } } } ?>/>
                            <div id="noite0"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[4].disabled = false; </script> <?php } } } ?>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                            </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[5].disabled = false; </script> <?php } } } ?>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                        <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        </td>

                        <!--Segunda-->
                        <td id="segunda"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" class="m" id="manhaCheck1" value="manha1" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha1"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[6].disabled = false; </script> <?php } } } ?>
                            <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[7].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde1" id="tardeCheck1" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                            <div id="tarde1"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[8].disabled = false; </script> <?php } } } ?>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                                <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                            </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[9].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite1" id="noiteCheck1" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                            <div id="noite1"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[10].disabled = false; </script> <?php } } } ?>
                            <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                            </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[11].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>
                        
                        <!--Terca-->
                        <td id="terca"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck2" value="manha2" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha2"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[12].disabled = false; </script> <?php } } } ?>
                        <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[13].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde2" id="tardeCheck2" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde2"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[14].disabled = false; </script> <?php } } } ?>
                        <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[15].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite2" id="noiteCheck2" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite2"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[16].disabled = false; </script> <?php } } } ?>
                        <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[17].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Quarta-->
                        <td id="quarta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck3" value="manha3" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha3"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[18].disabled = false; </script> <?php } } } ?>
                        <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[19].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde3" id="tardeCheck3" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t"){?> checked <?php } } } ?> />    
                        <div id="tarde3"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[20].disabled = false; </script> <?php } } } ?>
                        <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[21].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input type="checkbox" value="noite3" id="noiteCheck3" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite3"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[22].disabled = false; </script> <?php } } } ?>
                        <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[23].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Quinta-->
                        <td id="quinta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck4" value="manha4" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha4"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[24].disabled = false; </script> <?php } } } ?>
                        <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[25].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" id="tardeCheck4" value="tarde4" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde4"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[26].disabled = false; </script> <?php } } } ?>
                        <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[27].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" id="noiteCheck4" value="noite4" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite4"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[28].disabled = false; </script> <?php } } } ?>
                        <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[29].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Sexta-->
                        <td id="sexta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck5" class="m" value="manha5" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha5"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[30].disabled = false; </script> <?php } } } ?>
                        <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[31].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" id="tardeCheck5" value="tarde5" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde5"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "y"){ ?> <script> document.querySelectorAll('.horaSelect')[32].disabled = false; </script> <?php } } } ?>
                        <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "y"){ ?> <script> document.querySelectorAll('.horaSelect')[33].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" id="noiteCheck5" value="noite5" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite5"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[34].disabled = false; </script> <?php } } } ?>
                        <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[35].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Sabado-->
                        <td id="sabado"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck6" class="m" value="manha6" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha6"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[36].disabled = false; </script> <?php } } } ?>
                        <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                            <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                            <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                            <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                            <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                            <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                            <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                            <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                            <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                            <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                            <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_inicio[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "m"){ ?> <script> document.querySelectorAll('.horaSelect')[37].disabled = false; </script> <?php } } } ?>
                                <option value="01:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "01:00:00"){ ?> selected <?php break; } } } ?>>01:00</option>
                                <option value="02:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "02:00:00"){ ?> selected <?php break; } } } ?>>02:00</option>
                                <option value="03:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "03:00:00"){ ?> selected <?php break; } } } ?>>03:00</option>
                                <option value="04:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "04:00:00"){ ?> selected <?php break; } } } ?>>04:00</option>
                                <option value="05:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "05:00:00"){ ?> selected <?php break; } } } ?>>05:00</option>
                                <option value="06:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "06:00:00"){ ?> selected <?php break; } } } ?>>06:00</option>
                                <option value="07:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "07:00:00"){ ?> selected <?php break; } } } ?>>07:00</option>
                                <option value="08:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "08:00:00"){ ?> selected <?php break; } } } ?>>08:00</option>
                                <option value="09:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "09:00:00"){ ?> selected <?php break; } } } ?>>09:00</option>
                                <option value="10:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "10:00:00"){ ?> selected <?php break; } } } ?>>10:00</option>
                                <option value="11:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "11:00:00"){ ?> selected <?php break; } } } ?>>11:00</option>
                                <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m" && $hora_saida[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde6" id="tardeCheck6" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde6"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[38].disabled = false; </script> <?php } } } ?>
                        <option value="12:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "12:00:00"){ ?> selected <?php break; } } } ?>>12:00</option>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                            <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                            <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                            <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                            <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_inicio[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "t"){ ?> <script> document.querySelectorAll('.horaSelect')[39].disabled = false; </script> <?php } } } ?>
                            <option value="13:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "13:00:00"){ ?> selected <?php break; } } } ?>>13:00</option>
                                <option value="14:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "14:00:00"){ ?> selected <?php break; } } } ?>>14:00</option>
                                <option value="15:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "15:00:00"){ ?> selected <?php break; } } } ?>>15:00</option>
                                <option value="16:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "16:00:00"){ ?> selected <?php break; } } } ?>>16:00</option>
                                <option value="17:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "17:00:00"){ ?> selected <?php break; } } } ?>>17:00</option>
                                <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t" && $hora_saida[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite6" id="noiteCheck6" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite6"><label>Hora de início: </label><select class="horaSelect" name="horaInicio[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[40].disabled = false; </script> <?php } } } ?>
                        <option value="18:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "18:00:00"){ ?> selected <?php break; } } } ?>>18:00</option>
                                <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_inicio[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                        </select>
                            <label>Hora de saída: </label><select class="horaSelect" name="horaSaida[]" disabled <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] != "n"){ ?> <script> document.querySelectorAll('.horaSelect')[41].disabled = false; </script> <?php } } } ?>
                            <option value="19:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "19:00:00"){ ?> selected <?php break; } } } ?>>19:00</option>
                                <option value="20:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "20:00:00"){ ?> selected <?php break; } } } ?>>20:00</option>
                                <option value="21:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "21:00:00"){ ?> selected <?php break; } } } ?>>21:00</option>
                                <option value="22:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "22:00:00"){ ?> selected <?php break; } } } ?>>22:00</option>
                                <option value="23:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "23:00:00"){ ?> selected <?php break; } } } ?>>23:00</option>
                                <option value="00:00" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n" && $hora_saida[$i] == "00:00:00"){ ?> selected <?php break; } } } ?>>00:00</option>
                            </select>
                            <label>Preço (R$):</label><input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                        <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>
                    </tr>

                </table><br><br>
                <button id="btnEnviar" type="submit">Confirmar!</button>

            </form>
        </div>

        <style>
            #domingo, #segunda, #terca, #quarta, #quinta, #sexta, #sabado{
                visibility: hidden;
            }

            #manha0, #manha1, #manha2, #manha3, #manha4, #manha5, #manha6, #tarde0, #tarde1, #tarde2, #tarde3, #tarde4, #tarde5, #tarde6, 
            #noite0, #noite1, #noite2, #noite3, #noite4, #noite5, #noite6{
                visibility: hidden;
            }

            .spnPreco{
                display: none;
            }
        </style>

        <?php
            if(!empty($turno)){
                for($i = 0; $i < count($turno); $i++){
                    if($dia[$i] == "dom"){
                        ?> <style> #domingo{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha0{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde0{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite0{ visibility: visible; } </style><?php
                        }
                    }
                    
                    if($dia[$i] == "seg"){
                        ?> <style> #segunda{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha1{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde1{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite1{ visibility: visible; } </style><?php
                        }
                    }

                    if($dia[$i] == "ter"){
                        ?> <style> #terca{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha2{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde2{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite2{ visibility: visible; } </style><?php
                        }
                    }

                    if($dia[$i] == "qua"){
                        ?> <style> #quarta{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha3{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde3{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite3{ visibility: visible; } </style><?php
                        }
                    }

                    if($dia[$i] == "qui"){
                        ?> <style> #quinta{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha4{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde4{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite4{ visibility: visible; } </style><?php
                        }
                    }

                    if($dia[$i] == "sex"){
                        ?> <style> #sexta{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha5{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde5{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite5{ visibility: visible; } </style><?php
                        }
                    }

                    if($dia[$i] == "sab"){
                        ?> <style> #sabado{ visibility: visible; } </style> <?php
                        if($turno[$i] == "m"){
                            ?> <style> #manha6{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "t"){
                            ?> <style> #tarde6{ visibility: visible; } </style><?php
                        }

                        if($turno[$i] == "n"){
                            ?> <style> #noite6{ visibility: visible; } </style><?php
                        }
                    }
                }
            }

        ?>

        <script src="assets/js/btnVoltar.js"></script>

        <script>
            function dia_semana(checkbox){
                const dia = document.getElementById(checkbox.value);
                if(checkbox.checked){
                    dia.style.visibility = "visible";
                }else if(checkbox.checked == false){

                    if(checkbox.value == "domingo"){
                        const checkManha = document.getElementById("manhaCheck0").checked = false;
                        const checkTarde = document.getElementById("tardeCheck0").checked = false;
                        const checkNoite = document.getElementById("noiteCheck0").checked = false;

                        document.querySelectorAll('.horaSelect')[0].disabled = true;
                        document.querySelectorAll('.horaSelect')[1].disabled = true;
                        document.querySelectorAll('.horaSelect')[2].disabled = true;
                        document.querySelectorAll('.horaSelect')[3].disabled = true;
                        document.querySelectorAll('.horaSelect')[4].disabled = true;
                        document.querySelectorAll('.horaSelect')[5].disabled = true;

                        const manha0 = document.getElementById("manha0").style.visibility = "hidden";
                        const tarde0 = document.getElementById("tarde0").style.visibility = "hidden";
                        const noite0 = document.getElementById("noite0").style.visibility = "hidden";
                    }

                    if(checkbox.value == "segunda"){
                        const checkManha = document.getElementById("manhaCheck1").checked = false;
                        const checkTarde = document.getElementById("tardeCheck1").checked = false;
                        const checkNoite = document.getElementById("noiteCheck1").checked = false;

                        document.querySelectorAll('.horaSelect')[6].disabled = true;
                        document.querySelectorAll('.horaSelect')[7].disabled = true;
                        document.querySelectorAll('.horaSelect')[8].disabled = true;
                        document.querySelectorAll('.horaSelect')[9].disabled = true;
                        document.querySelectorAll('.horaSelect')[10].disabled = true;
                        document.querySelectorAll('.horaSelect')[11].disabled = true;

                        const manha1 = document.getElementById("manha1").style.visibility = "hidden";
                        const tarde1 = document.getElementById("tarde1").style.visibility = "hidden";
                        const noite1 = document.getElementById("noite1").style.visibility = "hidden";
                    }

                    if(checkbox.value == "terca"){
                        const checkManha = document.getElementById("manhaCheck2").checked = false;
                        const checkTarde = document.getElementById("tardeCheck2").checked = false;
                        const checkNoite = document.getElementById("noiteCheck2").checked = false;

                        document.querySelectorAll('.horaSelect')[12].disabled = true;
                        document.querySelectorAll('.horaSelect')[13].disabled = true;
                        document.querySelectorAll('.horaSelect')[14].disabled = true;
                        document.querySelectorAll('.horaSelect')[15].disabled = true;
                        document.querySelectorAll('.horaSelect')[16].disabled = true;
                        document.querySelectorAll('.horaSelect')[17].disabled = true;

                        const manha2 = document.getElementById("manha2").style.visibility = "hidden";
                        const tarde2 = document.getElementById("tarde2").style.visibility = "hidden";
                        const noite2 = document.getElementById("noite2").style.visibility = "hidden";
                    }

                    if(checkbox.value == "quarta"){
                        const checkManha = document.getElementById("manhaCheck3").checked = false;
                        const checkTarde = document.getElementById("tardeCheck3").checked = false;
                        const checkNoite = document.getElementById("noiteCheck3").checked = false;

                        document.querySelectorAll('.horaSelect')[18].disabled = true;
                        document.querySelectorAll('.horaSelect')[19].disabled = true;
                        document.querySelectorAll('.horaSelect')[20].disabled = true;
                        document.querySelectorAll('.horaSelect')[21].disabled = true;
                        document.querySelectorAll('.horaSelect')[22].disabled = true;
                        document.querySelectorAll('.horaSelect')[23].disabled = true;

                        const manha3 = document.getElementById("manha3").style.visibility = "hidden";
                        const tarde3 = document.getElementById("tarde3").style.visibility = "hidden";
                        const noite3 = document.getElementById("noite3").style.visibility = "hidden";
                    }

                    if(checkbox.value == "quinta"){
                        const checkManha = document.getElementById("manhaCheck4").checked = false;
                        const checkTarde = document.getElementById("tardeCheck4").checked = false;
                        const checkNoite = document.getElementById("noiteCheck4").checked = false;

                        document.querySelectorAll('.horaSelect')[24].disabled = true;
                        document.querySelectorAll('.horaSelect')[25].disabled = true;
                        document.querySelectorAll('.horaSelect')[26].disabled = true;
                        document.querySelectorAll('.horaSelect')[27].disabled = true;
                        document.querySelectorAll('.horaSelect')[28].disabled = true;
                        document.querySelectorAll('.horaSelect')[29].disabled = true;

                        const manha4 = document.getElementById("manha4").style.visibility = "hidden";
                        const tarde4 = document.getElementById("tarde4").style.visibility = "hidden";
                        const noite4 = document.getElementById("noite4").style.visibility = "hidden";
                    }

                    if(checkbox.value == "sexta"){
                        const checkManha = document.getElementById("manhaCheck5").checked = false;
                        const checkTarde = document.getElementById("tardeCheck5").checked = false;
                        const checkNoite = document.getElementById("noiteCheck5").checked = false;

                        document.querySelectorAll('.horaSelect')[30].disabled = true;
                        document.querySelectorAll('.horaSelect')[31].disabled = true;
                        document.querySelectorAll('.horaSelect')[32].disabled = true;
                        document.querySelectorAll('.horaSelect')[33].disabled = true;
                        document.querySelectorAll('.horaSelect')[34].disabled = true;
                        document.querySelectorAll('.horaSelect')[35].disabled = true;

                        const manha5 = document.getElementById("manha5").style.visibility = "hidden";
                        const tarde5 = document.getElementById("tarde5").style.visibility = "hidden";
                        const noite5 = document.getElementById("noite5").style.visibility = "hidden";
                    }

                    if(checkbox.value == "sabado"){
                        const checkManha = document.getElementById("manhaCheck6").checked = false;
                        const checkTarde = document.getElementById("tardeCheck6").checked = false;
                        const checkNoite = document.getElementById("noiteCheck6").checked = false;

                        document.querySelectorAll('.horaSelect')[36].disabled = true;
                        document.querySelectorAll('.horaSelect')[37].disabled = true;
                        document.querySelectorAll('.horaSelect')[38].disabled = true;
                        document.querySelectorAll('.horaSelect')[39].disabled = true;
                        document.querySelectorAll('.horaSelect')[40].disabled = true;
                        document.querySelectorAll('.horaSelect')[41].disabled = true;

                        const manha6 = document.getElementById("manha6").style.visibility = "hidden";
                        const tarde6 = document.getElementById("tarde6").style.visibility = "hidden";
                        const noite6 = document.getElementById("noite6").style.visibility = "hidden";
                    }

                    dia.style.visibility = "hidden";
                }
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
            // Verificar estado inicial dos checkboxes e chamar a função turno se necessário
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        turno(checkbox);
                    }
                });
            });

            function turno(checkbox){
                const turno = document.getElementById(checkbox.value);

                const domingo = document.getElementById("domingo");
                const segunda = document.getElementById("segunda");
                const terca = document.getElementById("terca");
                const quarta = document.getElementById("quarta");
                const quinta = document.getElementById("quinta");
                const sexta = document.getElementById("sexta");
                const sabado = document.getElementById("sabado");

                if(checkbox.checked){
                    turno.style.visibility = "visible";
                    //domingo
                    if(checkbox.value == "manha0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[0].disabled = false;
                        document.querySelectorAll('.horaSelect')[1].disabled = false;
                    }
                    if(checkbox.value == "tarde0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[2].disabled = false;
                        document.querySelectorAll('.horaSelect')[3].disabled = false;
                    }
                    if(checkbox.value == "noite0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[4].disabled = false;
                        document.querySelectorAll('.horaSelect')[5].disabled = false;
                    }

                    //segunda
                    if(checkbox.value == "manha1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[6].disabled = false;
                        document.querySelectorAll('.horaSelect')[7].disabled = false;
                    }
                    if(checkbox.value == "tarde1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[8].disabled = false;
                        document.querySelectorAll('.horaSelect')[9].disabled = false;
                    }
                    if(checkbox.value == "noite1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[10].disabled = false;
                        document.querySelectorAll('.horaSelect')[11].disabled = false;
                    }

                    //terca
                    if(checkbox.value == "manha2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[12].disabled = false;
                        document.querySelectorAll('.horaSelect')[13].disabled = false;
                    }
                    if(checkbox.value == "tarde2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[14].disabled = false;
                        document.querySelectorAll('.horaSelect')[15].disabled = false;
                    }
                    if(checkbox.value == "noite2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[16].disabled = false;
                        document.querySelectorAll('.horaSelect')[17].disabled = false;
                    }

                    //quarta
                    if(checkbox.value == "manha3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[18].disabled = false;
                        document.querySelectorAll('.horaSelect')[19].disabled = false;
                    }
                    if(checkbox.value == "tarde3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[20].disabled = false;
                        document.querySelectorAll('.horaSelect')[21].disabled = false;
                    }
                    if(checkbox.value == "noite3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[22].disabled = false;
                        document.querySelectorAll('.horaSelect')[23].disabled = false;
                    }

                    //quinta
                    if(checkbox.value == "manha4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[24].disabled = false;
                        document.querySelectorAll('.horaSelect')[25].disabled = false;
                    }
                    if(checkbox.value == "tarde4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[26].disabled = false;
                        document.querySelectorAll('.horaSelect')[27].disabled = false;
                    }
                    if(checkbox.value == "noite4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[28].disabled = false;
                        document.querySelectorAll('.horaSelect')[29].disabled = false;
                    }

                    //sexta
                    if(checkbox.value == "manha5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[30].disabled = false;
                        document.querySelectorAll('.horaSelect')[31].disabled = false;
                    }
                    if(checkbox.value == "tarde5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[32].disabled = false;
                        document.querySelectorAll('.horaSelect')[33].disabled = false;
                    }
                    if(checkbox.value == "noite5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[34].disabled = false;
                        document.querySelectorAll('.horaSelect')[35].disabled = false;
                    }

                    //sabado
                    if(checkbox.value == "manha6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[36].disabled = false;
                        document.querySelectorAll('.horaSelect')[37].disabled = false;
                    }
                    if(checkbox.value == "tarde6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[38].disabled = false;
                        document.querySelectorAll('.horaSelect')[39].disabled = false;
                    }
                    if(checkbox.value == "noite6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[40].disabled = false;
                        document.querySelectorAll('.horaSelect')[41].disabled = false;
                    }
                }else{
                    turno.style.visibility = "hidden";

                    //domingo
                    if(checkbox.value == "manha0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[0].disabled = true;
                        document.querySelectorAll('.horaSelect')[1].disabled = true;
                    }
                    if(checkbox.value == "tarde0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[2].disabled = true;
                        document.querySelectorAll('.horaSelect')[3].disabled = true;
                    }
                    if(checkbox.value == "noite0" && domingo.contains(turno)){
                        document.querySelectorAll('.horaSelect')[4].disabled = true;
                        document.querySelectorAll('.horaSelect')[5].disabled = true;
                    }

                    //segunda
                    if(checkbox.value == "manha1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[6].disabled = true;
                        document.querySelectorAll('.horaSelect')[7].disabled = true;
                    }
                    if(checkbox.value == "tarde1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[8].disabled = true;
                        document.querySelectorAll('.horaSelect')[9].disabled = true;
                    }
                    if(checkbox.value == "noite1" && segunda.contains(turno)){
                        document.querySelectorAll('.horaSelect')[10].disabled = true;
                        document.querySelectorAll('.horaSelect')[11].disabled = true;
                    }

                    //terca
                    if(checkbox.value == "manha2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[12].disabled = true;
                        document.querySelectorAll('.horaSelect')[13].disabled = true;
                    }
                    if(checkbox.value == "tarde2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[14].disabled = true;
                        document.querySelectorAll('.horaSelect')[15].disabled = true;
                    }
                    if(checkbox.value == "noite2" && terca.contains(turno)){
                        document.querySelectorAll('.horaSelect')[16].disabled = true;
                        document.querySelectorAll('.horaSelect')[17].disabled = true;
                    }

                    //quarta
                    if(checkbox.value == "manha3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[18].disabled = true;
                        document.querySelectorAll('.horaSelect')[19].disabled = true;
                    }
                    if(checkbox.value == "tarde3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[20].disabled = true;
                        document.querySelectorAll('.horaSelect')[21].disabled = true;
                    }
                    if(checkbox.value == "noite3" && quarta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[22].disabled = true;
                        document.querySelectorAll('.horaSelect')[23].disabled = true;
                    }

                    //quinta
                    if(checkbox.value == "manha4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[24].disabled = true;
                        document.querySelectorAll('.horaSelect')[25].disabled = true;
                    }
                    if(checkbox.value == "tarde4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[26].disabled = true;
                        document.querySelectorAll('.horaSelect')[27].disabled = true;
                    }
                    if(checkbox.value == "noite4" && quinta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[28].disabled = true;
                        document.querySelectorAll('.horaSelect')[29].disabled = true;
                    }

                    //sexta
                    if(checkbox.value == "manha5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[30].disabled = true;
                        document.querySelectorAll('.horaSelect')[31].disabled = true;
                    }
                    if(checkbox.value == "tarde5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[32].disabled = true;
                        document.querySelectorAll('.horaSelect')[33].disabled = true;
                    }
                    if(checkbox.value == "noite5" && sexta.contains(turno)){
                        document.querySelectorAll('.horaSelect')[34].disabled = true;
                        document.querySelectorAll('.horaSelect')[35].disabled = true;
                    }

                    //sabado
                    if(checkbox.value == "manha6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[36].disabled = true;
                        document.querySelectorAll('.horaSelect')[37].disabled = true;
                    }
                    if(checkbox.value == "tarde6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[38].disabled = true;
                        document.querySelectorAll('.horaSelect')[39].disabled = true;
                    }
                    if(checkbox.value == "noite6" && sabado.contains(turno)){
                        document.querySelectorAll('.horaSelect')[40].disabled = true;
                        document.querySelectorAll('.horaSelect')[41].disabled = true;
                    }
                }
            }

        </script>

    </body>
</html>