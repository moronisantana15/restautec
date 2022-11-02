<?php

class Conexao {
    private $caminhoBanco = 'mysql:host=db4free.net;dbname=restautec_bd';
    private  $usuario = 'restautec';
    private $senha = 'Escola139';
    private $conexao;
    
    function __construct() {
        try {
            $this->conexao = new PDO($this->caminhoBanco, $this->usuario, $this->senha);
            echo "banco conectado com sucesso!";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    public function getConexao() {
        return $this->conexao;
    }
    public function fecharConexao(){
        if($this->conexao != null){
            $this->conexao = null;
            echo "Conexão finalizada!";
        }
    }
}
