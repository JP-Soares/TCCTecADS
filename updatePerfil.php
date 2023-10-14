<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Atualizar</title>

        <?php
            session_start();

            include_once('assets/php/conexao.php');

            if($_SESSION["usuario"] != "cuidador" && $_SESSION["usuario"] != "responsavel"){
                exit();
                header("index.php");
            }
        ?>

    </head>
    <body>
        <h1>Atualizar Perfil</h1>

        <div>
            <form id="form" method="POST" name="" action="assets/php/update.php">
                <h3>Preencha os campos abaixo</h3>
                
                <div id="container-dados-pessoais">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" value="<?php echo$_SESSION["nome"]; ?>" required /><br><br>
                    <label>CPF:</label>
                    <input type="text" id="txtCpf" name="cpf" placeholder="___.___.___-__" maxlength="14" value="<?php echo$_SESSION["cpf"]; ?>" oninput="formatCpf();" required /><br><br>
                    <?php if($_SESSION["usuario"] == "cuidador"){ ?><label>Registro Profissional (Exemplo: CRM):</label>
                    <input type="text" name="registroProfissional" placeholder="Digite os números aqui" value="<?php echo$_SESSION["registroProfissional"]; ?>" required /><br><br><?php } ?>
                    <label class="file-input-wrapper">
                        <input type="file" name="fotoPerfil" id="foto" />
                        <img id="imagemPreview" name="imgPrev" src="" alt="Clique aqui!" style="max-width: 100%;">
                    </label><br><br>
                    <label>Sexo:</label><br>
                    <label>Masculino</label><input type="radio" name="sexo" value="Masculino" <?php if($_SESSION["sexo"] == "Masculino"){ ?> checked <?php } ?> required />
                    <label>Feminino</label><input type="radio" name="sexo" value="Feminino" <?php if($_SESSION["sexo"] == "Feminino"){ ?> checked <?php } ?> required /><br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="dtNasc" id="txtDtNasc" value="<?php echo$_SESSION["dtNasc"]; ?>" onclick="validarDtNasc();" required /><br>
                    <span id="spDtNasc">Data de nascimento inválida!</span>

                    <label>Telefone:</label>
                    <input type="tel" id="txtTel" name="telefone" oninput="formatTel();" onclick="formatTel();" placeholder="()____-____" maxlength="13" value="<?php echo$_SESSION["telefone"]; ?>" required /><br><br>
                    <?php if($_SESSION["usuario"] == "cuidador"){ ?> <label>Descrição:</label>
                    <textarea name="descricao" id="txtDescricao" placeholder="Escreva um pouco sobre você..."><?php echo$_SESSION["descricao"]; ?></textarea> <?php } ?>

                </div>

                <div id="container-dados-endereco">
                    <h3>Preencha seus dados de endereço:</h3>
                    <label>Estado:</label><select id="estado" name="estado">
                        <option <?php if($_SESSION["estado"] == 'AC'): ?> selected="selected"<?php endif; ?> value="AC">Acre</option>
                        <option <?php if($_SESSION["estado"] == 'AL'): ?> selected="selected"<?php endif; ?> value="AL">Alagoas</option>
                        <option <?php if($_SESSION["estado"] == 'AP'): ?> selected="selected"<?php endif; ?> value="AP">Amapá</option>
                        <option <?php if($_SESSION["estado"] == 'AM'): ?> selected="selected"<?php endif; ?> value="AM">Amazonas</option>
                        <option <?php if($_SESSION["estado"] == 'BA'): ?> selected="selected"<?php endif; ?> value="BA">Bahia</option>
                        <option <?php if($_SESSION["estado"] == 'CE'): ?> selected="selected"<?php endif; ?> value="CE">Ceará</option>
                        <option <?php if($_SESSION["estado"] == 'DF'): ?> selected="selected"<?php endif; ?> value="DF">Distrito Federal</option>
                        <option <?php if($_SESSION["estado"] == 'ES'): ?> selected="selected"<?php endif; ?> value="ES">Espírito Santo</option>
                        <option <?php if($_SESSION["estado"] == 'GO'): ?> selected="selected"<?php endif; ?> value="GO">Goiás</option>
                        <option <?php if($_SESSION["estado"] == 'MA'): ?> selected="selected"<?php endif; ?> value="MA">Maranhão</option>
                        <option <?php if($_SESSION["estado"] == 'MT'): ?> selected="selected"<?php endif; ?> value="MT">Mato Grosso</option>
                        <option <?php if($_SESSION["estado"] == 'MS'): ?> selected="selected"<?php endif; ?> value="MS">Mato Grosso do Sul</option>
                        <option <?php if($_SESSION["estado"] == 'MG'): ?> selected="selected"<?php endif; ?> value="MG">Minas Gerais</option>
                        <option <?php if($_SESSION["estado"] == 'PA'): ?> selected="selected"<?php endif; ?> value="PA">Pará</option>
                        <option <?php if($_SESSION["estado"] == 'PB'): ?> selected="selected"<?php endif; ?> value="PB">Paraíba</option>
                        <option <?php if($_SESSION["estado"] == 'PR'): ?> selected="selected"<?php endif; ?> value="PR">Paraná</option>
                        <option <?php if($_SESSION["estado"] == 'PE'): ?> selected="selected"<?php endif; ?> value="PE">Pernambuco</option>
                        <option <?php if($_SESSION["estado"] == 'PI'): ?> selected="selected"<?php endif; ?> value="PI">Piauí</option>
                        <option <?php if($_SESSION["estado"] == 'RJ'): ?> selected="selected"<?php endif; ?> value="RJ">Rio de Janeiro</option>
                        <option <?php if($_SESSION["estado"] == 'RN'): ?> selected="selected"<?php endif; ?> value="RN">Rio Grande do Norte</option>
                        <option <?php if($_SESSION["estado"] == 'RS'): ?> selected="selected"<?php endif; ?> value="RS">Rio Grande do Sul</option>
                        <option <?php if($_SESSION["estado"] == 'RO'): ?> selected="selected"<?php endif; ?> value="RO">Rondônia</option>
                        <option <?php if($_SESSION["estado"] == 'RR'): ?> selected="selected"<?php endif; ?> value="RR">Roraima</option>
                        <option <?php if($_SESSION["estado"] == 'SC'): ?> selected="selected"<?php endif; ?> value="SC">Santa Catarina</option>
                        <option <?php if($_SESSION["estado"] == 'SP'): ?> selected="selected"<?php endif; ?> value="SP">São Paulo</option>
                        <option <?php if($_SESSION["estado"] == 'SE'): ?> selected="selected"<?php endif; ?> value="SE">Sergipe</option>
                        <option <?php if($_SESSION["estado"] == 'TO'): ?> selected="selected"<?php endif; ?> value="TO">Tocantins</option>
                        <option <?php if($_SESSION["estado"] == 'EX'): ?> selected="selected"<?php endif; ?> value="EX">Estrangeiro</option>
                    </select><br><br>

                    <label>Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite a cidade aqui" value="<?php echo$_SESSION["cidade"]; ?>" required/><br><br>
                    <label>Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro aqui" value="<?php echo$_SESSION["bairro"]; ?>" required/><br><br>
                    <label>Rua:</label>
                    <input type="text" name="rua" placeholder="Digite a rua aqui" value="<?php echo$_SESSION["rua"]; ?>" required/><br><br>
                    <label>Número:</label>
                    <input type="text" name="numero" placeholder="Digite o número da residência aqui" value="<?php echo$_SESSION["numero"]; ?>" required/><br><br>
                    <label>Complemento:</label>
                    <input type="text" name="complemento" placeholder="Digite o complemento aqui" value="<?php echo$_SESSION["complemento"]; ?>" /><br><br>

                </div>

                <div id="container-dados-login">
                    <h3>Estamos Terminando!</h3>
                    <h3>Preencha seus dados de login:</h3>

                    <label>E-mail:</label>
                    <input type="email" name="email" placeholder="Digite o E-mail aqui" value="<?php echo$_SESSION["email"]; ?>" required/><br><br>
                    <label>Senha:</label>
                    <input type="password" id="txtSenha" name="senha" oninput="validarSenha();" placeholder="Digite uma senha forte aqui"  value="<?php echo$_SESSION["senha"]; ?>" required/><br>
                    <span id="spSenha">A senha deve conter no mínimo 8 caracteres!</span><br>
                    <label>Confirme a senha:</label>
                    <input type="password" id="txtConfirmaSenha" name="confirmaSenha" oninput="confirmarSenha();" placeholder="Confirme a senha aqui" required/><br>
                    <span id="spConfirmaSenha">As senhas precisam ser iguais!</span><br><br>

                    <p id="msgErro"><?php echo isset($_SESSION['msgErro']); ?></p>
                </div>

                <button id="btnEnviar" type="submit">Atualizar!</button>
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