<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||AgednaPessoal</title>
    </head>
    <body>
    <button onclick="goBack();">Voltar</button>
        <div id="container-agenda">
            <form id="form" name="" method="POST" action="assets/php/cadastrarAgenda.php">
                <h1>Faça sua programação semanal</h1>

                <table border="1">
                    <tr>
                        <td><input type="checkbox" value="domingo" onclick="dia_semana(this);" id="dom"/><p>Domingo</p></td>
                        <td><input type="checkbox" value="segunda" onclick="dia_semana(this);" id="seg"/><p>Segunda-Feira</p></td>
                        <td><input type="checkbox" value="terca" onclick="dia_semana(this);" id="ter"/><p>Terça-Feira</p></td>
                        <td><input type="checkbox" value="quarta" onclick="dia_semana(this);" id="qua"/><p>Quarta-Feira</p></td>
                        <td><input type="checkbox" value="quinta" onclick="dia_semana(this);" id="qui"/><p>Quinta-Feira</p></td>
                        <td><input type="checkbox" value="sexta" onclick="dia_semana(this);" id="sex"/><p>Sexta-Feira</p></td>
                        <td><input type="checkbox" value="sabado" onclick="dia_semana(this);" id="sab"/><p>Sábado</p></td>
                    </tr>

                    <tr>
                        <!--Domingo-->
                        <td id="domingo"><label>Manhã<label><input type="checkbox" />
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaDom"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaDom"></select>
                            <input type="number" name="precoDomM"/><br>
                        <br>
                        <label>Tarde<label><input type="checkbox" />
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeDom"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeDom"></select>
                            <input type="number" name="precoDomT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteDom"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteDom"></select>
                        <input type="number" name="precoDomN"/>
                        </td>

                        <!--Segunda-->
                        <td id="segunda"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaSeg"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaSeg"></select>
                            <input type="number" name="precoSegM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeSeg"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeSeg"></select>
                            <input type="number" name="precoSegT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteSeg"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteSeg"></select>
                            <input type="number" name="precoSegN"/>
                        <br>
                        </td>
                        
                        <!--Terca-->
                        <td id="terca"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaTer"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaTer"></select>
                            <input type="number" name="precoTerM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeTer"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeTer"></select>
                            <input type="number" name="precoTerT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteTer"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteTer"></select>
                            <input type="number" name="precoTerN"/>
                        <br>
                        </td>

                        <!--Quarta-->
                        <td id="quarta"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaQua"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaQua"></select>
                            <input type="number" name="precoQuaM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeQua"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeQua"></select>
                            <input type="number" name="precoQuaT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteQua"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteQua"></select>
                            <input type="number" name="precoQuaN"/>
                        <br>
                        </td>

                        <!--Quinta-->
                        <td id="quinta"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaQui"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaQui"></select>
                            <input type="number" name="precoQuiM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeQui"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeQui"></select>
                            <input type="number" name="precoQuiT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteQui"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteQui"></select>
                            <input type="number" name="precoQuiN"/>
                        <br>
                        </td>

                        <!--Sexta-->
                        <td id="sexta"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaSex"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaSex"></select>
                            <input type="number" name="precoSexM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeSex"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeSex"></select>
                            <input type="number" name="precoSexT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteSex"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteSex"></select>
                            <input type="number" name="precoSexN"/>
                        <br>
                        </td>

                        <!--Sabado-->
                        <td id="sabado"><label>Manhã<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioManha" name="horaInicioManhaSab"></select>
                            <label>Hora de saída: </label><select class="horaSaidaManha" name="horaSaidaManhaSab"></select>
                            <input type="number" name="precoSabM"/>
                        <br>
                        <label>Tarde<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioTarde" name="horaInicioTardeSab"></select>
                            <label>Hora de saída: </label><select class="horaSaidaTarde" name="horaSaidaTardeSab"></select>
                            <input type="number" name="precoSabT"/>
                        <br>
                        <label>Noite<label><input type="checkbox" />    
                            <label>Hora de início: </label><select class="horaInicioNoite" name="horaInicioNoiteSab"></select>
                            <label>Hora de saída: </label><select class="horaSaidaNoite" name="horaSaidaNoiteSab"></select>
                            <input type="number" name="precoSabN"/>
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
        </style>

        <script src="assets/js/btnVoltar.js"></script>

        <script>
            function dia_semana(checkbox){
                const dia = document.getElementById(checkbox.value);
                if(checkbox.checked){
                    dia.style.visibility = "visible";
                }else{
                    dia.style.visibility = "hidden";
                }
            }

            function hora_inicio(){

                const selectInicioManha = document.querySelectorAll('.horaInicioManha');
                const selectInicioTarde = document.querySelectorAll('.horaInicioTarde');
                const selectInicioNoite = document.querySelectorAll('.horaInicioNoite');

                for(let indice = 0; indice <= selectInicioManha.length; indice++){
                    for(let i = 0; i <= 11; i++){//hora de inicio turno manha
                        let option = document.createElement('option');
                        
                        if(i >= 10){
                            // console.log(`${i}:00`);
                            option.value = `${i}:00`;
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
                        option.value = `${a}:00`;
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
                        option.value = `${b}:00`;
                        option.textContent = `${b}:00`;
                        // console.log(`${b}:00`);

                        selectInicioNoite[indice].appendChild(option);
                    }

                    if(indice == 6){
                        break;
                    }
                }
                
            }

            function hora_saida(){
                const selectSaidaManha = document.querySelectorAll('.horaSaidaManha');
                const selectSaidaTarde = document.querySelectorAll('.horaSaidaTarde');
                const selectSaidaNoite = document.querySelectorAll('.horaSaidaNoite');

                for(let indice = 0; indice <= selectSaidaManha.length; indice++){
                    for(let i = 1; i <= 12; i++){//hora de saida turno manha
                        let option = document.createElement('option');
                        if(i >= 10){
                            option.value = `${i}:00`;
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
                    console.log("teste",indice);
                    for(let a = 13; a >= 13 && a <= 18; a++){//hora saida turno tarde
                        let option = document.createElement('option');
                        option.value = `${a}:00`;
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
                        option.value = `${b}:00`;
                        option.textContent = `${b}:00`;
                        // console.log(`${b}:00`);

                        selectSaidaNoite[indice].appendChild(option);
                    }
                }
            }

            hora_inicio();
            hora_saida();
        </script>

    </body>
</html>