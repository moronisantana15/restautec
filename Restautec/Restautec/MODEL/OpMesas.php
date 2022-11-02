<?php
require_once 'Conexao.php';

class OpMesas {
    public $con;
    
    function __construct() {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }
    public function reservarMesa($numMesa){

        $sql = "UPDATE mesas SET status_mesa = ? WHERE num_mesa = ?";
 
        try {
            $smt = $this->con->prepare($sql);
            $smt->bindValue(1, "OCUPADO");
            $smt->bindValue(2, $numMesa);
            $smt->execute();
            if($smt->rowCount() === 1){
                    echo "MESA RESERVADA!";
            }
        } catch (Exception $ex) {
            echo $ex;
        }
     
    }
    
    public function mostrarTodasAsMesas(){
        $sql = "SELECT * FROM mesas";
        try {
            $smt = $this->con->prepare($sql);
            $smt->execute();
        } catch (Exception $ex) {
            echo $ex;
        }
        if($smt->rowCount() > 0){
            $mesasArrayBanco = $smt->fetchAll(PDO::FETCH_ASSOC);
            return $mesasArrayBanco;
        }else{
            return null;
        }
    }
    
    public function verificaMesas($numMesa){
        $sql = "SELECT * FROM mesas WHERE num_mesa = ? AND status_mesa = 'LIVRE'";
        try {
            $smt = $this->con->prepare($sql);
            $smt->bindValue(1, $numMesa);
           
             $smt->execute();
        
        } catch (Exception $ex) {
            echo $ex;
        } 
        
        if($smt->rowCount() > 0){
            echo $smt->rowCount();
            return false;
        }else{
            return true;
        }
    }
}
