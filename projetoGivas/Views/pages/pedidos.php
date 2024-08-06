<body class="w-screen h-screen bg-[#F9EFDB]">
    <section class="w-full flex flex-col items-center mt-10 ">
        <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400">
            Pedidos
        </div>
        <form action="" method="post" class="w-[800px] grid grid-cols-12 gap-2">
            <select name="tamanho" id=""
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <option value="1">Pequena</option>
                <option value="2">Média</option>
                <option value="3">Grande</option>
                <option value="4">Gigante</option>
            </select>
            <select name="sabor" id=""
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <?php
                $info = \Models\Sabor::pegarSabores();

                foreach ($info as $key => $value) {
                    ?>
                    <option value="<?php echo $value['id']; ?>">
                        <?php echo $value["sabor"] ?>
                    </option>
                <?php } ?>
            </select>
            <select name="extras" id=""
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <?php
                $info = \Models\Extra::pegarExtras();

                foreach ($info as $key => $value) {
                    ?>
                    <option value="<?php echo $value['id']; ?>">
                        <?php echo $value["extra"] ?>
                    </option>
                <?php } ?>
            </select>
            <input type="text" id="clienteSerch" placeholder="Pesquise o cliente"
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
            <select name="cliente" id="cliente"
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <?php
                $infoCliente = \Models\Cliente::pegarClientes();

                foreach ($infoCliente as $key => $value) {
                    ?>
                    <option value="<?php echo $value['id']; ?>">
                        <?php echo $value["nome"] ?>
                    </option>
                <?php } ?>
            </select>
            <select name="formaPagamento" id=""
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <option value="dinheiro">Dinheiro</option>
                <option value="Pix">Pix</option>
                <option value="credito">Crédito</option>
                <option value="debito">Débito</option>
            </select>
            <select name="retirada" id=""
                class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4">
                <option value="e">Entrega</option>
                <option value="b">Balcao</option>
            </select>
            <div class="col-span-12 flex justify-center">
                <button type="submit" name="adicionar"
                    class="bg-[#209E2C] rounded-full p-2 text-md font-bold text-white w-[250px] flex justify-center">Adicionar</button>
            </div>
        </form>


    </section>
</body>

<?php

$cliente = '';
$clienteID = '';
foreach ($infoCliente as $key => $value) {
    if ($key != 0) {
        $cliente .= ',';
        $clienteID .= ',';
    }
    $cliente .= '"' . $value['nome'] . '"';
    $clienteID .= '"' . $value['id'] . '"';
}


?>
<script>
    document.getElementById("clienteSerch").addEventListener("keypress", e => {
        pesquisa();
    });

    function pesquisa() {
        let output = document.getElementById("cliente");
        const clienteList = [<?php echo $cliente; ?>]
        const clienteIDList = [<?php echo $clienteID; ?>]
        let found = []
        let foundID = []
        let serch = document.getElementById("clienteSerch").value;
        output.innerHTML = ""
        for (let i = 0; i < clienteList.length; i++)
            //alert(examesList[i].includes(serch))
            if (clienteList[i].toLowerCase().includes(serch.toLowerCase())) {
                found = found.concat(clienteList[i]);
                foundID = foundID.concat(clienteIDList[i]);
            }
        if (found.length > 0) {
            for (let i = 0; i < found.length; i++) {
                let opt = document.createElement("option");
                opt.value = foundID[i];
                opt.innerHTML = found[i];
                output.appendChild(opt);
            }
        }
        else {
            output.innerHTML = "nenhum cliente encontrado";
        }
    }
</script>