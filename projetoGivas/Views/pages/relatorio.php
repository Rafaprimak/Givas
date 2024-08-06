<body class="w-full h-screen bg-[#F9EFDB]">
    <div class="flex flex-col justify-center items-center">
        <div class="font-semibold mb-12 text-3xl border-b-2 border-zinc-400 mt-10">
            Relatórios
        </div>
        <form action="" method="post">
            <input type="submit" name="Gerar" value="Gerar relatório"
                class="bg-green-500 p-2 rounded-md font-semibold mb-10 hover:cursor-pointer hover:bg-green-400 border-2">
        </form>
        <div class="w-6/12 flex flex-wrap justify-center items-center">
            <?php
            $info = \Models\Relatorio::pegarRelatorio();
            foreach ($info as $key => $value) { ?>
                <div class="bg-zinc-200 rounded-md p-2 m-1 flex flex-col items-center justify-center">
                    <a href="<?php echo INCLUDE_PATH ?>assets/pdf/<?php echo $value['nome'] ?>.pdf" class="flex flex-col items-center justify-center gap-2 ">
                        <img src="<?php echo INCLUDE_PATH ?>assets/images/relatorio.png" alt="" class="w-8 h-8">
                        <span class="font-bold">Ver</span>
                        <?php echo $value['nome']; ?>
                    </a>
                </div>
            <?php }
            ?>
        </div>
    </div>
</body>