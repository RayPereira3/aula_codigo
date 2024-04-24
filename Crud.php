<?php

class Crud {

    private $connect;
    private $nome;
    private $idade;
    private $email;

    function __construct($conect)
    {
        $this->connect = $conect;

        }

    public function setDados($nome,$email,$idade){

        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
        
    }

    public function insertDados(){
        $sql = $this->connect->prepare("INSERT INTO tabela_01 (nome, email, idade, date_now) VALUES(?, ?, ?, NOW())");

        $sql->bindParam(1, $this->nome);
        $sql->bindParam(2, $this->email);
        $sql->bindParam(3, $this->idade);

        echo "<br>";
        echo "<br>";
        if($sql->execute()){
            echo "Inserido com Sucesso!";
        }else{
            echo "Deu Ruim...";
        }
    }// fim do insertDados

    public function readInfo($id = null){
        if(isset($id)){
        $sql = $this->connect->prepare("SELECT * FROM tabela_01 WHERE id=?");

        $sql->bindValue(1,$id);

        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_OBJ);

        return $result;

        }else{
            $this->getAll(); // metado para consultar a tabela inteira
        }

    } // fim do readInfo

    public function getAll(){

        $sql = $this->connect->query("SELECT * FROM tabela_01"); 

        return  $sql->fetchAll();

    } //fim getAll
 
    public function readInfoAll($nome = null){
        if (isset($nome)) {
           $sql = $this->connect->prepare("SELECT * FROM tabela_01 WHERE nome LIKE ?");

           $sql->bindValue(1,"%$nome%");

           $sql->execute();

           // $result = $sql->fetch(PDO::FETCH_OBJ);

           $result = $sql->fetchAll(PDO::FETCH_ASSOC);

           return $result;

        }else{
            $this->getAll();
        }

    }//fim do readinfoall

    public function update($id,$nome,$idade,$email){

        $sql = $this->connect->prepare("UPDATE tabela_01 SET nome=?, idade=?, email=? WHERE id=?");

        $sql->bindValue(1,$nome,PDO::PARAM_STR);
        $sql->bindValue(2,$idade,PDO::PARAM_STR);
        $sql->bindValue(3,$email,PDO::PARAM_STR);
        $sql->bindValue(4,$id,PDO::PARAM_STR);

        if($sql->execute()){
            echo "Registro Atualizado! <br> <p> <a href='readAll.php'> Voltar </a> </p>";
        }else{
            echo "Problemas ao tentar atualizar o registro! <br> <p> <a href='readAll.php'> Voltar </a> </p>";
        }

    }// fim update

    public function delete($id){

        $sql = $this->connect->prepare("DELETE FROM tabela_01 WHERE id=?");

        $sql->bindValue(1,$id,PDO::PARAM_STR);

        if ($sql->execute()) {
            echo "Registro Excluído! <br> <p> <a href='readAllDelete.php'> Voltar </a> </p>";
        }else{
            echo "Problemas ao tentar excluir o registro! <br> <p> <a href='readAllDelete.php'> Voltar </a> </p>";
        }

    }

}// fim da classe
?>