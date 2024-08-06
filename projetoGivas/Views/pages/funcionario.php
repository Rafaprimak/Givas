<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Funcionario</title>

    <script>
        function getEndereco(cep) {
            let url = 'https://viacep.com.br/ws/' + cep + '/json';
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.open('GET', url);

            xmlHttp.onreadystatechange = () => {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    let info = xmlHttp.responseText;
                    info = JSON.parse(info);
                    document.getElementById('logradouro').value = info.logradouro;
                    document.getElementById('bairro').value = info.bairro;
                    document.getElementById('localidade').value = info.localidade;
                    document.getElementById('uf').value = info.uf;
                    document.getElementById('ibge').value = info.ibge;

                }
            }
            xmlHttp.send();

        }
    </script>
</head>

<body class="w-screen h-screen">
    <section class="flex bg-[#F9EFDB] h-[74%]">
        <div class="w-[300px] h-full flex justify-start items-start flex-col space-y-2 bg-[#BFCCB5]"
            style="overflow-y: scroll;overflow-x: hidden;">
            <div class="w-[250px] mt-2 flex justify-center items-center">
                <a href="<?php echo INCLUDE_PATH ?>Funcionario"
                    class="border-b-1 h-[40px] w-[100px] p-4 justify-center items-center flex bg-[#209E2C] w-8/12 rounded-lg text-3xl font-bold pb-5">
                    +
                </a>
            </div>
            <?php
            $info = \Models\Funcionario::pegarFuncionarios();
            foreach ($info as $key => $value) {
                ?>
                <a href="?id=<?php echo $value['id']; ?>"
                    class="ml-4 border-b-1 p-4 bg-blue-300 rounded-lg justify-start items-center flex flex-row gap-2 w-11/12">
                    <?php switch ($value['cargo']) {
                        case 'balconista':
                            echo "<img src='" . INCLUDE_PATH . "/assets/images/balconista.png' class='w-8 h-8 rounded-full'>";
                            echo $value['nome'];
                            break;
                        case 'cozinheiro':
                            echo "<img src='" . INCLUDE_PATH . "/assets/images/chef.png' class='w-8 h-8 rounded-full'>";
                            echo $value['nome'];
                            break;
                        case 'auxiliarCozinha':
                            echo "<img src='" . INCLUDE_PATH . "/assets/images/chef.png' class='w-8 h-8 rounded-full'>";
                            echo $value['nome'];
                            break;
                        case 'auxiliarLimpeza':
                            echo "<img src='" . INCLUDE_PATH . "/assets/images/zelador.png' class='w-8 h-8 rounded-full'>";
                            echo $value['nome'];
                            break;
                        case 'caixa':
                            echo "<img src='" . INCLUDE_PATH . "/assets/images/balconista.png' class='w-8 h-8 rounded-full'>";
                            echo $value['nome'];
                            break;
                    } ?>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
        $info = null;
        if (isset($_GET["id"])) {
            $info = \Models\Funcionario::pegarFuncionario($_GET["id"]);
        }
        ?>
        <div class="w-full flex flex-col items-center mt-10 ">
            <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400">
                Funcionários
            </div>
            <form action="" method="post" class="w-[800px] grid grid-cols-12 gap-2">
                <?php
                if ($info != null) {
                    ?> <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <?php // esse não precisa estilizar :)
                }
                ?>
                <input type="text" name="nome" placeholder="Nome" required
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4"
                    value="<?php echo ($info != null) ? $info[0]['nome'] : null ?>" />

                <input type="number" name="cep" placeholder="CEP" required id="cep"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4"
                    value="<?php echo ($info != null) ? $info[0]['CEP'] : null ?>"
                    onchange="getEndereco(this.value);" />

                <input type="text" required name="logradouro"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" placeholder="Rua"
                    id="logradouro" value="<?php echo ($info != null) ? $info[0]['logradouro'] : null ?>" />

                <input type="text" required name="bairro" placeholder="Bairro" id="bairro"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4"
                    value="<?php echo ($info != null) ? $info[0]['bairro'] : null ?>" />

                <input type="text" readonly required name="localidade" placeholder="Cidade" id="localidade"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />

                <input type="text" readonly required name="uf" placeholder="UF" id="uf"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />

                <input type="text" readonly required name="ibge" placeholder="IBGE" id="ibge"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />

                <input type="text" required name="numero" placeholder="Numero da casa"
                    value="<?php echo ($info != null) ? $info[0]['numeroCasa'] : null ?>"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />

                <input type="text" required name="contato" placeholder="Contato"
                    value="<?php echo ($info != null) ? $info[0]['contato'] : null ?>"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />

                <select name="cargo" id=""
                    class="bg-white border rounded-md p-2 text-md font-bold col-span-4 text-zinc-600">
                    <option value="balconista" <?php echo ($info != null && $info[0]['cargo'] == 'balconista') ? 'selected="selected"' : null ?>>Balconista</option>
                    <option value="cozinheiro" <?php echo ($info != null && $info[0]['cargo'] == 'cozinheiro') ? 'selected="selected"' : null ?>>Cozinheiro</option>
                    <option value="auxiliarCozinha" <?php echo ($info != null && $info[0]['cargo'] == 'auxiliarCozinha') ? 'selected="selected"' : null ?>>Auxiliar de Cozinha</option>
                    <option value="auxiliarLimpeza" <?php echo ($info != null && $info[0]['cargo'] == 'auxiliarLimpeza') ? 'selected="selected"' : null ?>>Zelador(a)</option>
                    <option value="caixa">Caixa</option>
                </select>

                <div class="col-span-12 justify-center grid">
                    <button type="submit" name="<?php echo ($info != null) ? 'atualizar' : 'cadastrar' ?>"
                        class="bg-[#209E2C] rounded-md p-2 text-md font-bold text-white hover:bg-green-500">
                        <?php echo ($info != null) ? 'Atualizar' : 'Cadastrar' ?>
                    </button>
                    <?php
                    if ($info != null) {
                        ?>
                        <br>
                        <a href="<?php echo INCLUDE_PATH; ?>/Funcionario?deletar=<?php echo $_GET["id"]; ?>"
                            class="bg-[#FF0000] rounded-md p-2 text-md font-bold text-white hover:bg-red-500">
                            Deletar
                        </a>
                    <?php } ?>
                </div>
                <?php
                if ($info != null) {
                    echo "<script>getEndereco(document.getElementById('cep').value)</script>";
                }
                ?>
            </form>
        </div>
    </section>
</body>

</html>