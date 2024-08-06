<?php
$info = \Models\Cliente::pegarClientes();


?>

<body class="w-screen h-screen overflow-x-hidden bg-[#F9EFDB]">
    <a href="<?php echo INCLUDE_PATH; ?>/Clientes?add" class="m-5 p-1 rounded-md bg-green-600 w-[200px] justify-center flex mt-5 border-2 font-semibold text-white hover:bg-green-500">Adicionar cliente</a>
    <section class="flex flex-col justify-center items-center">
        <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400">
            Clientes
        </div>
        <div class="flex flex-wrap gap-6 justify-center overflow-y-scroll mb-[9rem]">
            <?php
            foreach ($info as $key => $value) {
                
                $cpfFormatado = substr($value['CPF'], 0, 3) . '.' . substr($value['CPF'], 3, 3) . '.' . substr($value['CPF'], 6, 3) . '-' . substr($value['CPF'], 9, 2);
                
                $numero_limpo = preg_replace("/[^0-9]/", "", $value['contato']);

                if(strlen($numero_limpo) == 11 && substr($numero_limpo, 0, 2) == '9'){
                    $contatoFormatado = '(' . substr($numero_limpo, 0, 2) . ') ' . substr($numero_limpo, 2, 1) . ' ' . substr($numero_limpo, 3, 4) . '-' . substr($numero_limpo, 7);
                } else {
                    $contatoFormatado = '(' . substr($numero_limpo, 0, 2) . ') ' . substr($numero_limpo, 2, 5) . '-' . substr($numero_limpo, 7);
                }


                ?>
                <div class="pl-10 bg-[#ECDDBF] p-6 pt-2 rounded-md w-[400px]">
                    <div class="flex flex-row items-center justify-start gap-4 font-bold">
                        <img src="./assets/images/clienteProf.png">
                        <div class="border-b-2 border-zinc-400">
                            <?php echo $value['nome']; ?>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 mt-2">
                        <div class="col-span-1 flex flex-row justify-center items-center">
                            <span class="font-semibold pr-2">CPF:</span>
                            <?php echo $cpfFormatado ?>
                        </div>
                        <div class="col-span-1 flex flex-row justify-center items-center gap-2">
                            <img src="<?php echo INCLUDE_PATH ?>/assets/images/whats.png" class="w-4 h-4">
                            <div>
                                <?php echo $contatoFormatado; ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-center items-center gap-2 mt-2">
                        <img src="<?php echo INCLUDE_PATH ?>/assets/images/pin.png" class="w-4 h-4 col-span-1">
                        <div class="col-span-1">
                            <?php echo $value['logradouro'] . ', ' . $value['numeroCasa'] . ' ' . $value['bairro']; ?>
                        </div>
                    </div>
                    <div>
                        <?php echo $value['complemento']; ?>
                    </div>
                    <div class="flex gap-3 flex-row items-center justify-end">
                        <a href="<?php echo INCLUDE_PATH ?>/Clientes?deletar=<?php echo $value['id']; ?>"
                            class="flex justify-center items-center rounded-md px-2 py-1 bg-red-500 hover:bg-red-400">Deletar</a>
                        <a href="<?php echo INCLUDE_PATH ?>/Clientes?update=<?php echo $value['id']; ?>&add"
                            class="flex justify-center items-center rounded-md bg-green-500 hover:bg-green-400 px-2 py-1">Atualizar</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</body>