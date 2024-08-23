<?php


//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	//Ordenação de Tarefas: Implementar a capacidade de ordenar as tarefas por diferentes critérios, como data de
	//criação, prioridade, etc.
	public function ordenarData() {
		$query = '
			select 
				t.id, s.status, t.tarefa, t.data_cadastrado
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			order by
				t.data_cadastrado
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function ordenarPrioridade() {
		$query = '
			select 
				t.id, s.status, t.tarefa, t.id_status
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			order by
				t.id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function ordenarAlfabetica() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			order by
				t.tarefa
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	//Filtro de Tarefas: Adicionar um filtro para exibir apenas tarefas concluídas, pendentes ou todas as tarefas.
	public function recuperarTarefasConcluidas() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function recuperarTodasTarefas() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	public function recuperarTarefasPendentes() {
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Notificação de Prazos: Permitir que os usuários definam prazos para suas tarefas e implementar um sistema de
	//notificação para lembrá-los quando o prazo estiver próximo ou expirado.
	public function recuperarTarefasComPrazo() {
		$query = '
			select 
				t.id, s.status, t.tarefa, t.prazo 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.prazo is not null
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Categorias de Tarefas: Adicionar a capacidade de categorizar as tarefas e permitir que os usuários filtrem as
	//tarefas por categoria.
	public function recuperarTarefasPorCategoria() {
		$query = '
			select 
				t.id, s.status, t.tarefa, c.categoria 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
				left join tb_categorias as c on (t.id_categoria = c.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	// Arquivamento de Tarefas: Adicionar a opção de arquivar tarefas concluídas para manter a lista organizada e facilitar a visualização das tarefas pendentes.
	public function arquivarTarefa() {
		$query = 'insert into tb_tarefas_arquivadas(id, id_status, tarefa, data_criacao, prioridade, prazo, id_categoria) values(:id, :id_status, :tarefa, :data_criacao, :prioridade, :prazo, :id_categoria)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':data_criacao', $this->tarefa->__get('data_criacao'));
		$stmt->bindValue(':prioridade', $this->tarefa->__get('prioridade'));
		$stmt->bindValue(':prazo', $this->tarefa->__get('prazo'));
		$stmt->bindValue(':id_categoria', $this->tarefa->__get('id_categoria'));
		$stmt->execute();
	}
	
	// Recuperar Tarefas Arquivadas: Adicionar a opção de visualizar as tarefas arquivadas.
	public function recuperarTarefasArquivadas() {
		$query = '
			select 
				t.id, s.status, t.tarefa, c.categoria 
			from 
				tb_tarefas_arquivadas as t
				left join tb_status as s on (t.id_status = s.id)
				left join tb_categorias as c on (t.id_categoria = c.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	// Desarquivar Tarefas: Adicionar a opção de desarquivar tarefas arquivadas.
	public function desarquivarTarefa($id) {
		// Primeiro, recupera a tarefa arquivada
		$query = 'select * from tb_tarefas_arquivadas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$tarefaArquivada = $stmt->fetch(PDO::FETCH_OBJ);
	
		// Insere a tarefa de volta na tabela de tarefas
		$query = 'insert into tb_tarefas(id, id_status, tarefa, data_criacao, prioridade, prazo, id_categoria) values(:id, :id_status, :tarefa, :data_criacao, :prioridade, :prazo, :id_categoria)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $tarefaArquivada->id);
		$stmt->bindValue(':id_status', $tarefaArquivada->id_status);
		$stmt->bindValue(':tarefa', $tarefaArquivada->tarefa);
		$stmt->bindValue(':data_criacao', $tarefaArquivada->data_criacao);
		$stmt->bindValue(':prioridade', $tarefaArquivada->prioridade);
		$stmt->bindValue(':prazo', $tarefaArquivada->prazo);
		$stmt->bindValue(':id_categoria', $tarefaArquivada->id_categoria);
		$stmt->execute();
	
		// Remove a tarefa da tabela de tarefas arquivadas
		$query = 'delete from tb_tarefas_arquivadas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
	}

}

?>