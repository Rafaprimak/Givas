<?php
$info = \Models\Extra::pegarExtras();
$info2 = null;
foreach ($info as $key => $value) {
    if (isset($_GET["id"]) && $_GET["id"] == $value['id']) {
        $info2 = $value;
    }
?>
<?php
}


?>

<body class="w-screen h-screen bg-[#F9EFDB]">
    <section class="flex flex-col justify-center items-center overflow-y-scroll mb-10 mt-10">
        <div class="w-full flex flex-col items-center mt-10 ">
            <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400">
                Extras
            </div>
            <form action="" method="post" class="w-[800px] grid grid-cols-12 gap-2 mb-12">
                <?php if ($info2 != null) { ?>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                <?php } ?>
                <input type="text" name="nome" placeholder="Nome"
                    value="<?php echo ($info2 != null) ? $info2['extra'] : null ?>"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />
                <input type="number" step="0.01" name="preco" placeholder="Preço" min="0.01"
                    value="<?php echo ($info2 != null) ? $info2['preco'] : null ?>"
                    class="bg-white border rounded-md p-2 text-md font-bold text-zinc-600 col-span-4" />
                <button type="submit" name="<?php echo ($info2 != null) ? 'updateExtra' : 'addExtra' ?>"
                    class="bg-[#209E2C] rounded-md p-2 text-md font-bold text-white w-[100px] hover:bg-green-500 col-span-2 justify-center flex">
                    <?php echo ($info2 != null) ? "Atualizar" : "Adicionar" ?>
                </button>
                <a href="<?php echo INCLUDE_PATH; ?>/Extra"
                    class="bg-zinc-500 rounded-md p-2 text-md font-bold text-white w-[150px] hover:bg-zinc-400 col-span-2 justify-center flex">Adicionar
                    outro</a>
            </form>

            <table class="w-[800px] border-2">
                <thead class="bg-[#EBD9B4]">
                    <tr>
                        <th>Sabor</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-zinc-100">
                    <?php
                    foreach ($info as $key => $value) {
                        ?>
                        <tr>
                            <th>
                                <?php echo $value['extra']; ?>
                            </th>
                            <th>
                                <?php echo $value['preco']; ?>
                            </th>
                            <th>
                                <a href="<?php echo INCLUDE_PATH; ?>/Extra?id=<?php echo $value['id']; ?>">
                                    <abbr title="EDITAR">✏️</abbr>
                                </a>
                                <a href="<?php echo INCLUDE_PATH; ?>PRECISA FAZER">
                                    <abbr title="EXCLUIR">🗑️</abbr>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>