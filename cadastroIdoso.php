<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Cadastro</title>

        <?php
            session_start();
        ?>

    </head>
    <body>
        <h1>Cadastro</h1>

        <div>
            <form id="form" method="POST" name="" action="assets/php/cadastroIdoso.php">
                <h3>Preencha os campos abaixo</h3>
                
                <div id="container-dados-pessoais">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite seu nome completo" required /><br><br>
                    <label>CPF:</label>
                    <input type="text" id="txtCpf" name="cpf" placeholder="___.___.___-__" maxlength="14" oninput="formatCpf();" required /><br><br>
                    <label class="file-input-wrapper">
                        <input type="file" name="fotoPerfil" id="foto" />
                        <img id="imagemPreview" name="imgPrev" src="" alt="Clique aqui!" style="max-width: 100%;">
                    </label><br><br>
                    <label>Sexo:</label><br>
                    <label>Masculino</label><input type="radio" name="sexo" value="Masculino" checked required />
                    <label>Feminino</label><input type="radio" name="sexo" value="Feminino" required /><br><br>
                    <label>Data de nascimento:</label>
                    <input type="date" name="dtNasc" id="txtDtNasc" onclick="validarDtNascIdoso();" required /><br>
                    <span id="spDtNasc">Data de nascimento inválida!</span>

                    <label>Telefone:</label>
                    <input type="tel" id="txtTel" name="telefone" oninput="formatTel();" onclick="formatTel();" placeholder="()____-____" maxlength="13" required /><br><br>
                    <label>Descrição:</label>
                    <textarea name="descricao" id="txtDescricao" placeholder="Escreva um pouco sobre ele(a)"></textarea><br><br>

                    <label>Enfermidades:</label><br>
                    <label>Enfermidade1</label><input type="checkbox" value="enfermidade1" name="enfermidades[]" /><br>
                    <label>Enfermidade2</label><input type="checkbox" value="enfermidade2" name="enfermidades[]" /><br>
                    <label>Enfermidade3</label><input type="checkbox" value="enfermidade3" name="enfermidades[]" /><br>
                    <label>Enfermidade4</label><input type="checkbox" value="enfermidade4" name="enfermidades[]" />

                </div>

                <div id="container-dados-endereco">
                    <h3>Preencha os dados de endereço:</h3>
                    <label>Estado:</label><select id="estado" name="estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select><br><br>

                    <label>Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite a cidade aqui" required/><br><br>
                    <label>Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o bairro aqui" required/><br><br>
                    <label>Rua:</label>
                    <input type="text" name="rua" placeholder="Digite a rua aqui" required/><br><br>
                    <label>Número:</label>
                    <input type="text" name="numero" placeholder="Digite o número da residência aqui" required/><br><br>
                    <label>Complemento:</label>
                    <input type="text" name="complemento" placeholder="Digite o complemento aqui"/><br><br>

                </div>

                <button id="btnEnviar" type="submit">Cadastrar!</button>

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
                dataNascimento.setFullYear(dataNascimento.getFullYear() + 65);
                
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