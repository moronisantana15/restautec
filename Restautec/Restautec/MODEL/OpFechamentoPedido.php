<?php
    require_once '../MODEL/Conexao.php';
    require_once '../CONTROLLER/PedidoController.php';

    class OpFechamentoPedido{
        public $con;
      
    
        function __construct() {
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }
        public function fecharMesa($numMesa){
            $sqlFecharPedido = "UPDATE mesas SET status_mesa = 'Livre' WHERE num_mesa = ?";
            
            try{
                $smt = $this->con->prepare($sqlFecharPedido);
                $smt->bindValue(1, $numMesa);
                $smt->execute();
            }catch(Exception $ex){
            }
        }
        
        public function finalizarPedido(PedidoController $pedidoController){

            $sqlFecharPedido = "UPDATE pedido SET status_pedido = 'Fechado', data_pedido_fechamento = current_timestamp(), valor_total = ? "
                    . "WHERE id_pedido = ? AND num_mesa = ?";

            try{
                $smt = $this->con->prepare($sqlFecharPedido);
                $smt->bindValue(1, $pedidoController->getValorTotal());
                $smt->bindValue(2, $pedidoController->getIdPedido());
                $smt->bindValue(3, $pedidoController->getNumMesa());
                
                
                if($smt->execute()){
                    
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $ex){
                echo $ex;
            }
        }
        
        public function getValorTotal($numMesa){
           $sqlSelect = "SELECT 
                            sum(it.valor_item) AS soma
                        FROM pedido p
                        INNER JOIN itens_pedido it
                            ON it.id_pedido = p.id_pedido
                        WHERE p.num_mesa = ? AND p.status_pedido = 'Aberto'";
            
           try{
               $smt = $this->con->prepare($sqlSelect);
               $smt->bindValue(1, $numMesa);
               $smt->execute();
           }catch(Exception $ex){
               echo $ex;
           }
           
           if($smt->rowCount() > 0){
               return $smt->fetch(PDO::FETCH_ASSOC);
           }else{
               return null;
           }
        }
        
        public function getListaPedidos( $numMesa){
            $sqlSelect = "call getListaPedidos2(?);";
            try{
                $smt = $this->con->prepare($sqlSelect);
                $smt->bindValue(1, $numMesa);
                $smt->execute();
            }catch(Exception $ex){
                echo $ex;
            }

            if($smt->rowCount() > 0){
                return $smt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return null;
            }
        }
    }