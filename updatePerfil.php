<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Cadastro</title>

        <?php
            session_start();

            include_once('assets/php/conexao.php');

            if($_SESSION["usuario"] == "cuidador"){
                $enviaForm = "assets/php/updateCuidador.php";
            }else if($_SESSION["usuario"] == "responsavel"){
                $enviaForm = "assets/php/updateResponsavel.php";
            }else if($_SESSION["usuario"] == "idoso"){
                $enviaForm = "assets/php/updateIdoso.php";
            }else{
                exit();
            }

            $sqlVerify = mysqli_query($con,"SELECT * FROM ". $_SESSION['usuario']." WHERE id_cuidador='".$_SESSION["id_cuidador"]."'");

            while($dadosUsuario = mysqli_fetch_assoc($sqlVerify)){
                $nome = $dadosUsuario["nome"];
                $cpf = $dadosUsuario["cpf"];
                $foto = $dadosUsuario["foto"];
                if($_SESSION["usuario"] == "cuidador"){
                    $registroProfissional = $dadosUsuario["registroProfissional"];
                    $descricao = $dadosUsuario["descricao"];
                }
                
                $sexo = $dadosUsuario["sexo"];
                $dtNasc = $dadosUsuario["dtNasc"];
                $descricao = $dadosUsuario["descricao"];
                $telefone = $dadosUsuario["telefone"];
                
                $email = $dadosUsuario["email"];
                $senha = $dadosUsuario["senha"];
                
                $estado = $dadosUsuario["estado"];
                $cidade = $dadosUsuario["cidade"];
                $bairro = $dadosUsuario["bairro"];
                $rua = $dadosUsuario["rua"];
                $numero = $dadosUsuario["numero"];
                $complemento = $dadosUsuario["complemento"];
            }
        ?>

    </head>
    <body>
        <h1>Atualizar Perfil</h1>

        <div>
            <form method="POST" name="" action="<?php echo$enviaForm; ?>">
                <h3>Preencha os campos abaixo</h3>
                
                <div id="container-dados-pessoais">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" value="<?php echo$nome; ?>" required /><br><br>
                    <label>CPF:</label>
                    <input type="text" id="txtCpf" name="cpf" placeholder="___.___.___-__" maxlength="14" value="<?php echo$cpf; ?>" oninput="formatCpf();" required /><br><br>
                    <?php if($_SESSION["usuario"] == "cuidador"){ ?><label>Registro Profissional (Exemplo: CRM):</label>
                    <input type="text" name="registroProfissional" placeholder="Digite os números aqui" value="<?php echo$registroProfissional; ?>" required /><br><br><?php } ?>
                    <label class="file-input-wrapper">
                        <input type="file" name="fotoPerfil" id="foto" />
                        <img id="imagemPreview" name="imgPrev" src="" alt="Clique aqui!" style="max-width: 100%;">
                    </label><br><br>
                    <label>Sexo:</label><br>
                    <label>Masculino</label><input type="radio" name="sexo" value="Masculino" <?php if($sexo == "Masculino"){ ?> checked <?php } ?> required />
                    <label>Feminino</label><input type="radio" name="sexo" value="Feminino" <?php if($sexo == "Feminino"){ ?> checked <?php } ?> required /><br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="dtNasc" id="txtDtNasc" value="<?php echo$dtNasc; ?>" onclick="validarDtNasc();" required /><br>
                    <span id="spDtNasc">Data de nascimento inválida!</span>

                    <label>Telefone:</label>
                    <input type="tel" id="txtTel" name="telefone" oninput="formatTel();" onclick="formatTel();" placeholder="()____-____" maxlength="13" value="<?php echo$telefone; ?>" required /><br><br>
                    <label>Descrição:</label>
                    <textarea name="descricao" id="txtDescricao" placeholder="Escreva um pouco sobre você..."><?php echo$descricao; ?></textarea>

                </div>

                <div id="container-dados-endereco">
                    <h3>Preencha seus dados de endereço:</h3>
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
                    <input type="text" name="cidade" placeholder="Digite a cidade aqui" value="<?php echo$cidade; ?>" /><br><br>
                    <label>Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro aqui" value="<?php echo$bairro; ?>" /><br><br>
                    <label>Rua:</label>
                    <input type="text" name="rua" placeholder="Digite a rua aqui" value="<?php echo$rua; ?>" /><br><br>
                    <label>Número:</label>
                    <input type="text" name="numero" placeholder="Digite o número da residência aqui" value="<?php echo$numero; ?>" /><br><br>
                    <label>Completo:</label>
                    <input type="text" name="complemento" placeholder="Digite o complemento aqui" value="<?php echo$complemento; ?>" /><br><br>

                </div>

                <div id="container-dados-login">
                    <h3>Estamos Terminando!</h3>
                    <h3>Preencha seus dados de login:</h3>

                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="Digite o E-mail aqui" value="<?php echo$email; ?>" /><br><br>
                    <label>Senha:</label>
                    <input type="password" id="txtSenha" name="senha" oninput="validarSenha();" placeholder="Digite uma senha forte aqui"  value="<?php echo$senha; ?>" /><br>
                    <span id="spSenha">A senha deve conter no mínimo 8 caracteres!</span><br>
                    <label>Confirme a senha:</label>
                    <input type="password" id="txtConfirmaSenha" name="confirmaSenha" oninput="confirmarSenha();" placeholder="Confirme a senha aqui"/><br>
                    <span id="spConfirmaSenha">As senhas precisam ser iguais!</span><br><br>

                    <p id="msgErro"><?php echo isset($_SESSION['msgErro']); ?></p>
                </div>

                <input type="submit" value="Cadastrar!" />
            </form>
        </div>

        <style>
            #spSenha, #spDtNasc, #spConfirmaSenha{
                display: none;
            }
        </style>

        <script src="assets/js/formato.js"></script>
        <script src="assets/js/foto.js"></script>
        <script src="assets/js/validador.js"></script>

    </body>
</html>