
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta charset="UTF-8">
        <title>Tela de Fechamento</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../STYLES/styles.css" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <?php
            require_once '../MODEL/OpFechamentoPedido.php';
            require_once '../CONTROLLER/PedidoController.php';
            session_start();
            
            $numMesa = $_SESSION['num_mesa'];
            
            $opFechamnt = new OpFechamentoPedido();
            $teste = 0;
            $retornoPedido =  $opFechamnt->getListaPedidos($numMesa);
             var_dump( $retornoPedido[0] );
            $valorTotal = $opFechamnt->getValorTotal($numMesa);
            
            if(isset($_POST['btnFinalizarPedido'])){
                
                $pedidoController = new PedidoController();
                $pedidoController->setIdPedido($retornoPedido[0]["id_pedido"]);
               
                $pedidoController->setNumMesa($numMesa);
                $pedidoController->setDataPedido($retornoPedido[0]["data_pedido"]);
                               
                $pedidoController->setValorTotal($valorTotal["soma"]);
                
                var_dump($pedidoController);
                $retornoOpFech = $opFechamnt->finalizarPedido($pedidoController);
                if($retornoOpFech){
                    $opFechamnt->fecharMesa($pedidoController->getNumMesa());
                    header('location: ViewMesas.php');
                }
            }
            
          
            //echo "echo "+$retornoPedido[1]["id_pedido"];
           //var_dump($retornoPedido);
        ?>

        <div class="container d-flex justify-content-center mt-5">
            <div class="row col-lg-12 justify-content-start text-white">
            <span class="data-hora"><?php echo $retornoPedido[0]["data_pedido"] ?></span>
              
            </div>
        </div>
        
        <div class="container d-flex justify-content-center mt-5">
            <div class="col-lg-3 justify-content-start text-white">
  
                <span class="num-mesa m-2 rounded d-flex justify-content-center align-items-center shadow p-3 mb-5 rounded"><?php echo $numMesa  ?></span>
       
            </div>
            <div class="col-lg-3 justify-content-start text-white">
  
                <span class="num-mesa m-2 rounded d-flex justify-content-center align-items-center shadow p-3 mb-5 rounded"><?php  echo $retornoPedido[0]["id_pedido"] ?></span>
       
            </div>
            
             <div class=" col-lg-3 d-flex justify-content-center align-items-center shadow p-3 mb-5 rounded bg-green">
                <form action="" method="post">
                    <button type="submit" name="btnFinalizarPedido" class="btn btn-warning">Finalizar Pedido</button>
                </form>
            </div>
            
            <div class=" col-lg-3 d-flex justify-content-center align-items-center shadow p-3 mb-5 rounded bg-green">

                    <label class="px-3 lbl-total" >Total:</label>
                    <span class="txt-total color-red"><?php echo $valorTotal["soma"] == "" ?  '0' : $valorTotal["soma"]  ?></span>

            </div>
        </div>
        


        <div class="container d-flex justify-content-center mt-5">
            <div class="row col-lg-12 justify-content-start text-white">
            <table class="table table-dark table-striped-columns">
            <thead>
                    <tr>
                        <th>Id Item</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
       
                    <?php foreach($retornoPedido as $key=>$pedidos):
                         ?>
                        
                    <tr>
                        <?php if(isset($pedidos["id_item_pedido"])){?>
                        <td><?=  $pedidos["id_item_pedido"]  ?></td>
                        <td><?=  $pedidos["descricao"]  ?></td>
                        <td><?=  $pedidos["valor_item"]  ?></td>
                        <?php } else{ ?>
                        <td colspan="3" style="text-align: center;">Nenhum pedido foi encontrado!</td>
                        <?php } ?>
                       
                    </tr>
        
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>

        <div class="container">
        <div class="col-md-12">
        
        </div>
        </div>
        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
