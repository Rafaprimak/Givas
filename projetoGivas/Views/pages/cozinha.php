<style>
    th {
        padding: 10px;
        border: #000 solid 1px;
    }
</style>

<body class="w-screen h-screen bg-[#F9EFDB]">
    <section class="flex flex-col justify-center items-center overflow-y-scroll mb-10 mt-10">
        <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400">
            Cozinha
        </div>
        <table class="w-8/12">
            <thead class="bg-[#EBD9B4]">
                <tr>
                    <th>Sabor</th>
                    <th>Tamanho</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="bg-zinc-100">
                <?php
                $info = \Models\Pedidos::pegarPedidosPendentes();
                $mysql = new \MySql();

                foreach ($info as $key => $value) {
                    $pizza = $mysql->Select('pizzas', '*', 'id', $value['idPizza']);
                    $tamanho = $mysql->Select('tamanhos', 'tamanho', 'id', $pizza[0]['idTamanhos'])[0]['tamanho'];
                    $sabor = $mysql->Select('sabores', 'sabor', 'id', $pizza[0]['idSabores'])[0]['sabor'];
                    $extra = $mysql->Select('extras', 'extra', 'id', $pizza[0]['idExtras'])[0]['extra'];
                    $cliente = \Models\Cliente::pegarCliente($value['idCliente']);
                    ?>
                    <tr>
                        <th>
                            <?php echo $sabor ?>
                        </th>
                        <th>
                            <?php echo $tamanho ?>
                        </th>
                        <th>
                            <?php echo $cliente[0]['nome'] ?>
                        </th>
                        <th>
                            <?php echo ($value['tipo'] == 'e') ? 'entrega' : 'balcão' ?>
                        </th>
                        
                        <th>
                            <?php echo $value['preco'] ?>
                        </th>
                        
                        <th>
                            <a href="<?php echo INCLUDE_PATH; ?>/cozinha?concluir=<?php echo $value['id'] ?>">
                                <abbr title="MARCAR COMO CONCLUIDO">✅</abbr>
                            </a>
                            <a href="<?php echo INCLUDE_PATH; ?>/cozinha?excluir=<?php echo $value['id'] ?>">
                                <abbr title="EXCLUIR">🗑️</abbr>
                            </a>
                        </th>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </section>
</body>
