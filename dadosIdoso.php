<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||DadosIdoso</title>

        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/styleCadastro.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">
        <script src="assets/js/btnVoltar.js"></script>

        <?php
            include_once("assets/php/conexao.php");

            $idIdoso = $_GET["idIdoso"];

            $buscaIdoso = mysqli_query($con, "SELECT * FROM idoso WHERE id_idoso=".$idIdoso);
            while($dadosIdoso = mysqli_fetch_assoc($buscaIdoso)){
                $nome = $dadosIdoso["nome"];
                $cpf = $dadosIdoso["cpf"];
                $sexo = $dadosIdoso["sexo"];
                $dtNasc = $dadosIdoso["dtNasc"];
                $descricao = $dadosIdoso["descricao"];
                $telefone = $dadosIdoso["telefone"];
                $estado = $dadosIdoso["estado"];
                $cidade = $dadosIdoso["cidade"];
                $bairro = $dadosIdoso["bairro"];
                $rua = $dadosIdoso["rua"];
                $numero = $dadosIdoso["numero"];
                $complemento = $dadosIdoso["complemento"];
                $enfermidades = $dadosIdoso["enfermidades"];
            }
        ?>

    </head>
    <body>
        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Dados dos Idosos</h1>

        <div>
            <form id="form" method="POST" name="" action="assets/php/updateIdoso.php?idIdoso=<?php echo$idIdoso; ?>" >

                <?php 
                    $enfermidades = explode(", ",$enfermidades);
                ?>

                <h3>Preencha os campos abaixo</h3>
                
                <div id="container-dados-pessoais">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" value="<?php echo$nome; ?>" required /><br><br>
                    <label>CPF:</label>
                    <input type="text" id="txtCpf" name="cpf" placeholder="___.___.___-__" value="<?php echo$cpf; ?>" maxlength="14" oninput="formatCpf();" required /><br><br>
                    <label class="file-input-wrapper">
                        <input type="file" name="fotoPerfil" id="foto" />
                        <img id="imagemPreview" name="imgPrev" src="" alt="Clique aqui!" style="max-width: 100%;">
                    </label><br><br>
                    <label>Sexo:</label><br>
                    <label>Masculino</label><input type="radio" name="sexo" value="Masculino" <?php if($sexo == "Masculino"){ ?>checked <?php } ?> required />
                    <label>Feminino</label><input type="radio" name="sexo" value="Feminino" <?php if($sexo == "Feminino"){ ?> checked <?php } ?> required /><br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="dtNasc" id="txtDtNasc" value="<?php echo$dtNasc; ?>" onclick="validarDtNascIdoso();" required /><br>
                    <span id="spDtNasc">Data de nascimento inválida!</span>

                    <label>Telefone:</label>
                    <input type="tel" id="txtTel" name="telefone" oninput="formatTel();" onclick="formatTel();" placeholder="()____-____" value="<?php echo$telefone; ?>" maxlength="13" required /><br><br>
                    <label>Descrição:</label>
                    <textarea name="descricao" id="txtDescricao" placeholder="Escreva um pouco sobre ele(a)"><?php echo$descricao; ?></textarea><br><br>

                    <label>Enfermidades:</label><br>
                    <label>Enfermidade1</label><input type="checkbox" value="enfermidade1" name="enfermidades[]" <?php for($i = 0; $i < count($enfermidades); $i++){ if($enfermidades[$i] == "enfermidade1"){ ?> checked <?php } } ?> /><br>
                    <label>Enfermidade2</label><input type="checkbox" value="enfermidade2" name="enfermidades[]" <?php for($i = 0; $i < count($enfermidades); $i++){ if($enfermidades[$i] == "enfermidade2"){ ?> checked <?php } } ?> /><br>
                    <label>Enfermidade3</label><input type="checkbox" value="enfermidade3" name="enfermidades[]" <?php for($i = 0; $i < count($enfermidades); $i++){ if($enfermidades[$i] == "enfermidade3"){ ?> checked <?php } } ?> /><br>
                    <label>Enfermidade4</label><input type="checkbox" value="enfermidade4" name="enfermidades[]" <?php for($i = 0; $i < count($enfermidades); $i++){ if($enfermidades[$i] == "enfermidade4"){ ?> checked <?php } } ?> />

                </div>

                <div id="container-dados-endereco">
                    <h3>Preencha os dados de endereço:</h3>
                    <label>Estado:</label><select id="estado" name="estado">
                        <option <?php if($estado == 'AC'): ?> selected="selected"<?php endif; ?> value="AC">Acre</option>
                        <option <?php if($estado == 'AL'): ?> selected="selected"<?php endif; ?> value="AL">Alagoas</option>
                        <option <?php if($estado == 'AP'): ?> selected="selected"<?php endif; ?> value="AP">Amapá</option>
                        <option <?php if($estado == 'AM'): ?> selected="selected"<?php endif; ?> value="AM">Amazonas</option>
                        <option <?php if($estado == 'BA'): ?> selected="selected"<?php endif; ?> value="BA">Bahia</option>
                        <option <?php if($estado == 'CE'): ?> selected="selected"<?php endif; ?> value="CE">Ceará</option>
                        <option <?php if($estado == 'DF'): ?> selected="selected"<?php endif; ?> value="DF">Distrito Federal</option>
                        <option <?php if($estado == 'ES'): ?> selected="selected"<?php endif; ?> value="ES">Espírito Santo</option>
                        <option <?php if($estado == 'GO'): ?> selected="selected"<?php endif; ?> value="GO">Goiás</option>
                        <option <?php if($estado == 'MA'): ?> selected="selected"<?php endif; ?> value="MA">Maranhão</option>
                        <option <?php if($estado == 'MT'): ?> selected="selected"<?php endif; ?> value="MT">Mato Grosso</option>
                        <option <?php if($estado == 'MS'): ?> selected="selected"<?php endif; ?> value="MS">Mato Grosso do Sul</option>
                        <option <?php if($estado == 'MG'): ?> selected="selected"<?php endif; ?> value="MG">Minas Gerais</option>
                        <option <?php if($estado == 'PA'): ?> selected="selected"<?php endif; ?> value="PA">Pará</option>
                        <option <?php if($estado == 'PB'): ?> selected="selected"<?php endif; ?> value="PB">Paraíba</option>
                        <option <?php if($estado == 'PR'): ?> selected="selected"<?php endif; ?> value="PR">Paraná</option>
                        <option <?php if($estado == 'PE'): ?> selected="selected"<?php endif; ?> value="PE">Pernambuco</option>
                        <option <?php if($estado == 'PI'): ?> selected="selected"<?php endif; ?> value="PI">Piauí</option>
                        <option <?php if($estado == 'RJ'): ?> selected="selected"<?php endif; ?> value="RJ">Rio de Janeiro</option>
                        <option <?php if($estado == 'RN'): ?> selected="selected"<?php endif; ?> value="RN">Rio Grande do Norte</option>
                        <option <?php if($estado == 'RS'): ?> selected="selected"<?php endif; ?> value="RS">Rio Grande do Sul</option>
                        <option <?php if($estado == 'RO'): ?> selected="selected"<?php endif; ?> value="RO">Rondônia</option>
                        <option <?php if($estado == 'RR'): ?> selected="selected"<?php endif; ?> value="RR">Roraima</option>
                        <option <?php if($estado == 'SC'): ?> selected="selected"<?php endif; ?> value="SC">Santa Catarina</option>
                        <option <?php if($estado == 'SP'): ?> selected="selected"<?php endif; ?> value="SP">São Paulo</option>
                        <option <?php if($estado == 'SE'): ?> selected="selected"<?php endif; ?> value="SE">Sergipe</option>
                        <option <?php if($estado == 'TO'): ?> selected="selected"<?php endif; ?> value="TO">Tocantins</option>
                        <option <?php if($estado == 'EX'): ?> selected="selected"<?php endif; ?> value="EX">Estrangeiro</option>
                    </select><br><br>

                    <label>Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite a cidade aqui" value="<?php echo$cidade; ?>" required/><br><br>
                    <label>Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro aqui" value="<?php echo$bairro; ?>" required/><br><br>
                    <label>Rua:</label>
                    <input type="text" name="rua" placeholder="Digite a rua aqui" value="<?php echo$rua; ?>" required/><br><br>
                    <label>Número:</label>
                    <input type="text" name="numero" placeholder="Digite o número da residência aqui" value="<?php echo$numero; ?>" required/><br><br>
                    <label>Complemento:</label>
                    <input type="text" name="complemento" placeholder="Digite o complemento aqui" value="<?php echo$complemento; ?>" /><br><br>
                        
                    <button id="btnEnviar" type="submit">Cadastrar!</button>
                </div>

            </form>
        </div>

        <style>
            #spSenha, #spDtNasc, #spConfirmaSenha{
                display: none;
            }
        </style>

        <script>
            let valida;
            function validarDtNascIdoso(){
                
                const campoData = document.getElementById("txtDtNasc");
                const spDtNasc = document.getElementById("spDtNasc");
                let dataNascimento = new Date(campoData.value);
                let dataAtual = new Date();
                
                // Adiciona 60 anos à data de nascimento
                dataNascimento.setFullYear(dataNascimento.getFullYear() + 60);
                
                if (dataNascimento <= dataAtual){
                    spDtNasc.style.display = "none";
                    valida = true;
                }else{
                    spDtNasc.style.display = "block";
                    valida = false;
                }
            }

            form.addEventListener('submit', (event)=>{
                event.preventDefault();
                validarDtNascIdoso();

                if(valida == true){
                    form.submit();
                }
            });
        </script>

        <script src="assets/js/formato.js"></script>
        <script src="assets/js/foto.js"></script>

    </body>
</html>