<?php
    namespace Aula3\ExtraAula3;
    use Aluno;
    use CadastroAlunos;


    $aluno = new Aluno();
    $cadastro = new CadastroAlunos();
    $cadastro->cadastroAluno($aluno, $_POST['nome'], $_POST['matricula'], $_POST['curso']);
    $alunos = $cadastro->listarAlunos();
    foreach($alunos as $aluno){
        echo "Nome: " . $aluno->getNome() . "<br>";
        echo "Matrícula: " . $aluno->getMatricula() . "<br>";
        echo "Curso: " . $aluno->getCurso() . "<br>";
    }

?>
<body>
    <h1>Editar Aluno</h1>
    <form action="Extra - Aula 3.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" id="matricula">
        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso">
        <input type="submit" value="Editar">
    </form>
</body>