<footer
  class="bg-[#BFCCB5]  min-h-24 h-[13%] w-screen px-10 pt-5 overflow-x-hidden fixed bottom-0 justify-between flex items-center">
  <p class="font-semibold ">Olá,
    <?php echo $_SESSION["nome"] ?> 👑
  </p>
  <a href="<?php echo INCLUDE_PATH; ?>/deslogar"
    class="p-2 bg-red-500 rounded-md flex flex-row w-[150px] h-[40px] items-center gap-4 font-bold hover:bg-red-400">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-power">
      <path d="M12 2v10" />
      <path d="M18.4 6.6a9 9 0 1 1-12.77.04" />
    </svg>
    Deslogar
  </a>
</footer>