<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||AgednaPessoal</title>
    </head>
    <body>
        <button onclick="goBack();">Voltar</button>

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

        ?>

        <div id="container-agenda">
            <form id="form" name="" method="POST" action="assets/php/cadastrarAgenda.php">
                <h1>Faça sua programação semanal</h1>

                <table border="1">
                    <tr>
                        <td><input type="checkbox" value="domingo" name="diaSemana[]" onclick="dia_semana(this);" id="dom" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "dom"){ ?> checked <?php } } } ?>/><p>Domingo</p></td>
                        <td><input type="checkbox" value="segunda" name="diaSemana[]" onclick="dia_semana(this);" id="seg" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "seg"){?> checked <?php } } } ?>/><p>Segunda-Feira</p></td>
                        <td><input type="checkbox" value="terca" name="diaSemana[]" onclick="dia_semana(this);" id="ter" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "ter"){?> checked <?php } } } ?>/><p>Terça-Feira</p></td>
                        <td><input type="checkbox" value="quarta" name="diaSemana[]" onclick="dia_semana(this);" id="qua" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qua"){?> checked <?php } } } ?>/><p>Quarta-Feira</p></td>
                        <td><input type="checkbox" value="quinta" name="diaSemana[]" onclick="dia_semana(this);" id="qui" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "qui"){?> checked <?php } } } ?>/><p>Quinta-Feira</p></td>
                        <td><input type="checkbox" value="sexta" name="diaSemana[]" onclick="dia_semana(this);" id="sex" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sex"){?> checked <?php } } } ?>/><p>Sexta-Feira</p></td>
                        <td><input type="checkbox" value="sabado" name="diaSemana[]" onclick="dia_semana(this);" id="sab" <?php if(!empty($dia)){for($i = 0; $i < count($dia); $i++){ if($dia[$i] == "sab"){?> checked <?php } } } ?>/><p>Sábado</p></td>
                    </tr>

                    <tr>
                        <!--Domingo-->
                        <td id="domingo"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" class="m" id="manhaCheck0" value="manha0" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m"){?> checked <?php } } } ?>/>
                            <div id="manha0"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="precoTurno" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>" />
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div><br>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde0" id="tardeCheck0" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t"){?> checked <?php } } } ?>/>
                        <div id="tarde0"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite0" id="noiteCheck0" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n"){?> checked <?php } } } ?>/>
                            <div id="noite0"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                        <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "dom" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                        <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        </td>

                        <!--Segunda-->
                        <td id="segunda"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" class="m" id="manhaCheck1" value="manha1" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha1"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde1" id="tardeCheck1" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                            <div id="tarde1"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite1" id="noiteCheck1" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                            <div id="noite1"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "seg" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>
                        
                        <!--Terca-->
                        <td id="terca"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck2" value="manha2" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha2"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde2" id="tardeCheck2" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde2"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite2" id="noiteCheck2" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite2"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "ter" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Quarta-->
                        <td id="quarta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck3" value="manha3" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha3"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde3" id="tardeCheck3" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t"){?> checked <?php } } } ?>"/>    
                        <div id="tarde3"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input type="checkbox" value="noite3" id="noiteCheck3" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite3"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qua" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Quinta-->
                        <td id="quinta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck4" value="manha4" class="m" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha4"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" id="tardeCheck4" value="tarde4" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde4"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" id="noiteCheck4" value="noite4" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite4"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "qui" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Sexta-->
                        <td id="sexta"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck5" class="m" value="manha5" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha5"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" id="tardeCheck5" value="tarde5" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde5"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" id="noiteCheck5" value="noite5" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite5"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sex" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        </td>

                        <!--Sabado-->
                        <td id="sabado"><label>Manhã<label><input name="turnoTrabalho[]" type="checkbox" id="manhaCheck6" class="m" value="manha6" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m"){?> checked <?php } } } ?>/>    
                        <div id="manha6"><label>Hora de início: </label><select class="horaInicioManha" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "m"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Tarde<label><input name="turnoTrabalho[]" type="checkbox" value="tarde6" id="tardeCheck6" class="t" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t"){?> checked <?php } } } ?>/>    
                        <div id="tarde6"><label>Hora de início: </label><select class="horaInicioTarde" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "t"){ echo$preco[$i]; } } } ?>"/>
                            <span class="spnPreco" oninput="validarPreco();">Digite um valor válido!</span></div>
                        <br>
                        <label>Noite<label><input name="turnoTrabalho[]" type="checkbox" value="noite6" id="noiteCheck6" class="n" onclick = "turno(this);" <?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n"){?> checked <?php } } } ?>/>    
                        <div id="noite6"><label>Hora de início: </label><select class="horaInicioNoite" name="horaInicio[]"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaida[]"></select>
                            <input type="number" class="preco" name="preco[]" value="<?php if(!empty($turno)){for($i = 0; $i < count($turno); $i++){ if($dia[$i] == "sab" && $turno[$i] == "n"){ echo$preco[$i]; } } } ?>"/>
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

                        const manha0 = document.getElementById("manha0").style.visibility = "hidden";
                        const tarde0 = document.getElementById("tarde0").style.visibility = "hidden";
                        const noite0 = document.getElementById("noite0").style.visibility = "hidden";
                    }

                    if(checkbox.value == "segunda"){
                        const checkManha = document.getElementById("manhaCheck1").checked = false;
                        const checkTarde = document.getElementById("tardeCheck1").checked = false;
                        const checkNoite = document.getElementById("noiteCheck1").checked = false;

                        const manha1 = document.getElementById("manha1").style.visibility = "hidden";
                        const tarde1 = document.getElementById("tarde1").style.visibility = "hidden";
                        const noite1 = document.getElementById("noite1").style.visibility = "hidden";
                    }

                    if(checkbox.value == "terca"){
                        const checkManha = document.getElementById("manhaCheck2").checked = false;
                        const checkTarde = document.getElementById("tardeCheck2").checked = false;
                        const checkNoite = document.getElementById("noiteCheck2").checked = false;

                        const manha2 = document.getElementById("manha2").style.visibility = "hidden";
                        const tarde2 = document.getElementById("tarde2").style.visibility = "hidden";
                        const noite2 = document.getElementById("noite2").style.visibility = "hidden";
                    }

                    if(checkbox.value == "quarta"){
                        const checkManha = document.getElementById("manhaCheck3").checked = false;
                        const checkTarde = document.getElementById("tardeCheck3").checked = false;
                        const checkNoite = document.getElementById("noiteCheck3").checked = false;

                        const manha3 = document.getElementById("manha3").style.visibility = "hidden";
                        const tarde3 = document.getElementById("tarde3").style.visibility = "hidden";
                        const noite3 = document.getElementById("noite3").style.visibility = "hidden";
                    }

                    if(checkbox.value == "quinta"){
                        const checkManha = document.getElementById("manhaCheck4").checked = false;
                        const checkTarde = document.getElementById("tardeCheck4").checked = false;
                        const checkNoite = document.getElementById("noiteCheck4").checked = false;

                        const manha4 = document.getElementById("manha4").style.visibility = "hidden";
                        const tarde4 = document.getElementById("tarde4").style.visibility = "hidden";
                        const noite4 = document.getElementById("noite4").style.visibility = "hidden";
                    }

                    if(checkbox.value == "sexta"){
                        const checkManha = document.getElementById("manhaCheck5").checked = false;
                        const checkTarde = document.getElementById("tardeCheck5").checked = false;
                        const checkNoite = document.getElementById("noiteCheck5").checked = false;

                        const manha5 = document.getElementById("manha5").style.visibility = "hidden";
                        const tarde5 = document.getElementById("tarde5").style.visibility = "hidden";
                        const noite5 = document.getElementById("noite5").style.visibility = "hidden";
                    }

                    if(checkbox.value == "sabado"){
                        const checkManha = document.getElementById("manhaCheck6").checked = false;
                        const checkTarde = document.getElementById("tardeCheck6").checked = false;
                        const checkNoite = document.getElementById("noiteCheck6").checked = false;

                        const manha6 = document.getElementById("manha6").style.visibility = "hidden";
                        const tarde6 = document.getElementById("tarde6").style.visibility = "hidden";
                        const noite6 = document.getElementById("noite6").style.visibility = "hidden";
                    }

                    dia.style.visibility = "hidden";
                }
            }
        </script>

        <script>
            function turno(checkbox){
                const turno = document.getElementById(checkbox.value);

                if(checkbox.checked){
                    turno.style.visibility = "visible";
                }else{
                    turno.style.visibility = "hidden";
                }
            }
        </script>

        <script>
            function hora_inicio(){
                const hora_inicioValues = <?php echo json_encode($hora_inicio); ?>;

                const selectInicioManha = document.querySelectorAll('.horaInicioManha');
                const selectInicioTarde = document.querySelectorAll('.horaInicioTarde');
                const selectInicioNoite = document.querySelectorAll('.horaInicioNoite');

                for(let indice = 0; indice <= selectInicioManha.length; indice++){
                    for(let i = 0; i <= 11; i++){//hora de inicio turno manha
                        let option = document.createElement('option');
                        
                        if(i >= 10){
                            // console.log(`${i}:00`);
                            option.value = `${i}:00:00`;
                            option.textContent = `${i}:00`;
                        }else{
                            option.value = `0${i}:00`;
                            option.textContent = `0${i}:00`;
                            // console.log(`0${i}:00`);
                        }

                        selectInicioManha[indice].appendChild(option);

                    }
                    
                    if(indice == 6){
                        break;
                    }
                }
            

                for(let indice = 0; indice <= selectInicioTarde.length; indice++){
                    for(let a = 12; a >= 12 && a <= 17; a++){//hora inicio turno tarde
                        let option = document.createElement('option');
                        option.value = `${a}:00:00`;
                        option.textContent = `${a}:00`;
                        // console.log(`${a}:00`);

                        selectInicioTarde[indice].appendChild(option);
                    }

                    if(indice == 6){
                        break;
                    }
                }
                for(let indice = 0; indice <= selectInicioNoite.length; indice++){
                    for(let b = 18; b >= 12 && b <= 23; b++){//hora inicio turno noite
                        let option = document.createElement('option');
                        option.value = `${b}:00:00`;
                        option.textContent = `${b}:00`;
                        // console.log(`${b}:00`);

                        selectInicioNoite[indice].appendChild(option);
                    }

                    if(indice == 6){
                        break;
                    }
                }
                
            }
        </script>

        <script>

            function hora_saida(){
                const selectSaidaManha = document.querySelectorAll('.horaSaidaManha');
                const selectSaidaTarde = document.querySelectorAll('.horaSaidaTarde');
                const selectSaidaNoite = document.querySelectorAll('.horaSaidaNoite');

                for(let indice = 0; indice <= selectSaidaManha.length; indice++){
                    for(let i = 1; i <= 12; i++){//hora de saida turno manha
                        let option = document.createElement('option');
                        if(i >= 10){
                            option.value = `${i}:00:00`;
                            option.textContent = `${i}:00`;
                            // console.log(`${i}:00`);
                        }else{
                            option.value = `0${i}:00`;
                            option.textContent = `0${i}:00`;
                            // console.log(`0${i}:00`);
                        }

                        selectSaidaManha[indice].appendChild(option);
                    }

                    if(indice == 6){
                        break;
                    }
                }


                for(let indice = 0; indice <= selectSaidaTarde.length; indice++){
                    console.log("",indice);
                    for(let a = 13; a >= 13 && a <= 18; a++){//hora saida turno tarde
                        let option = document.createElement('option');
                        option.value = `${a}:00:00`;
                        option.textContent = `${a}:00`;
                        // console.log(`${a}:00`);

                        selectSaidaTarde[indice].appendChild(option);
                    }

                    if(indice == 6){
                        break;
                    }
                }


                for(let indice = 0; indice <= selectSaidaNoite.length; indice++){
                    for(let b = 19; b >= 19 && b <= 24; b++){//hora saida turno noite
                        let option = document.createElement('option');
                        option.value = `${b}:00:00`;
                        option.textContent = `${b}:00`;
                        // console.log(`${b}:00`);

                        selectSaidaNoite[indice].appendChild(option);
                    }
                }
            }

            const form = document.getElementById("form");

            hora_inicio();
            hora_saida();
        </script>

    </body>
</html>