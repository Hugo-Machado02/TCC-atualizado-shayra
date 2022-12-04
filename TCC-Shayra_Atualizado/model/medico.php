<?php
    class Medico{
        public $id_med;
        public $nome;
        public $cpf;
        public $crm;
        public $dt_nascimento;
        public $especialidade;
        public $salario_medico;
        public $escala_medico;

        public function __getMedico(){
            include "conexao.php";
            $codigo_sql = mysqli_query($conexao, "SELECT * FROM medico where id=2");
            while ($dados = mysqli_fetch_array($codigo_sql))
            {
                $this->id_med = $dados['id'];
                $this->nome = $dados['nome'];
                $this->cpf = $dados['cpf'];
                $this->crm = $dados['crm'];
                $this->dt_nascimento = $dados['dt_nascimento'];
                $this->especialidade = $dados['especialidade'];
                $this->salario_medico = $dados['salario_medico'];
                $this->escala_medico = $dados['escala_medico'];
            }
        }
    
        public function __listMed(){
            echo "ID: <br>";
            echo $this->id_med;
            echo "<br><br>";
            echo "Dr(a).: <br>";
            echo $this->nome;
            echo "<br><br>";
            echo "CPF: <br>";
            echo $this->cpf;
            echo "<br><br>";
            echo "CRM:  <br>";
            echo $this->crm;
            echo "<br><br>";
            echo "Data de Nascimento: <br>";
            echo $this->dt_nascimento;
            echo "<br><br>";
            echo "Especialidade: <br>";
            echo $this->especialidade;
            echo "<br><br>";
            echo "Salário: <br>";
            echo $this->salario_medico;
            echo "<br><br>";
            echo "Escala: <br>";
            echo $this->escala_medico;
            echo "<hr>";
        }

    }
?>