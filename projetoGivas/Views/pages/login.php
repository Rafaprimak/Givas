<?php



?>




<body class="w-screen h-screen items-center justify-start flex flex-col bg-[#F9EFDB] bg-[url('assets/images/footerV2.png')] bg-no-repeat bg-bottom bg-[length:100%_35%]">
  <img src="./assets/images/logoMealTime.png" alt="Isso e uma logo" class="w-56 h-56">
  <form action="" method="post" class="w-[350px] flex-col flex p-1 rounded-lg gap-6 mb-2">
    <input type="text" name="usuario" placeholder="Usuario" class="rounded-full p-2 border border-black">
    <input type="password" name="senha" placeholder="Senha" class="rounded-full p-2 border border-black">
    <button type="submit" name="logar"
      class="bg-[#209E2C] rounded-full p-2 text-md font-bold text-white">Entrar</button>
  </form>

  <div class="w-[350px] flex-row flex rounded-lg justify-between mb-42">
    <div class="flex flex-row space-x-1">
      <input id="lembsenha" type="checkbox" class="m-0 p-0 space-0" />
      <label for="lembsenha" class="font-semibold">Lembrar senha</label>
    </div>
    <a href=" /mudarsenha" class="cursor-pointer font-semibold">Esqueceu a senha?</a>
    </div>
</body>

</html>