<?php
            require_once '../MODEL/Conexao.php';
            require_once '../MODEL/OpMesas.php';
            
            class ViewMesas{
                public $opMesa;
                public $arrayNumMesa;
                public $retorno;
                function __construct() {
                    $this->opMesa = new OpMesas();
                    
                    $this->retorno = $this->mostrarMesasComStatus();
                    $this->handleClickReservaMesas();
                }
                
                function mostrarMesasComStatus(){
                    return $this->getStatusMesas($this->opMesa->mostrarTodasAsMesas($this->getMesas()));
                }

                function handleClickReservaMesas(){
                    
                    if(isset($_POST['btnMesa1'])){
                        $this->opMesa->verificaMesas(1);
                        
                    }
                    if(isset($_POST['btnMesa2'])){
                        $this->opMesa->verificaMesas(2);
                  
                    }
                    if(isset($_POST['btnMesa3'])){
                        $this->opMesa->verificaMesas(3);
                      
                    }
                    if(isset($_POST['btnMesa4'])){
                        $this->opMesa->verificaMesas(4);
  
                    }
                    $this->retorno =  $this->getStatusMesas($this->opMesa->mostrarTodasAsMesas($this->getMesas()));
           
                }
                
                function getMesas(){
                    $arrayMesas=[];
                    $arrayMesas['1'] = 1;
                    $arrayMesas['2'] = 2;
                    $arrayMesas['3'] = 3;
                    $arrayMesas['4'] = 4;
                    
                    return $arrayMesas;
                }
           
                function getStatusMesas($arrayMesa){
                    $i = 0;
                    foreach ($arrayMesa as $mesa){
                        ++$i;
                       // if( $mesasArray[$i] ==  $mesa['num_mesa']){

                       //   }
                    
                       $this->arrayStatusMesa["".$i.""] = $mesa['status_mesa'];
                       // echo "<p> status:  ".  $this->arrayNumMesa["'".$i."'"]. "</p>";
                       // echo "incremento:   <p>" . $i.  "</p>";
                       // echo 'NUM-MESA  <p>'.$mesa['num_mesa'].'"</p>';
                       // $mesaGlobal = $mesa['status_mesa'];
                       //echo 'BTNS ' . $mesasArray[$i] . '</br>';

                    }
                    return $this->arrayStatusMesa;
                }
            }
            $vmMesas = new ViewMesas();
            $retorno = $vmMesas->retorno;
        ?>
<html>
    <head>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Tela de Mesas</title>
        <link rel="stylesheet" href="../STYLES/ViewMesas.css" />
    </head>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: #8C6B4F;
            font-family: 'Roboto', sans-serif;
        }
        .btnMesaOcupada{
            display: block;
            width: 80px;
            height: 80px;
            background-color: #528540;
            cursor: pointer;
        }

        .btnMesaLivre{
            width: 80px;
            height: 80px;
            background-color: #CCDE47;
            cursor: pointer;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            gap: 10px;
        }
        strong{
            display: block;
            font-size: 2em;
            color: #0D0D0D;
            font-weight: bold;
            background-color: transparent;
        }
        span{
            font-size: 1em;
            color: #0D0D0D;
            font-weight: bold;
            background-color: transparent;
        }
    </style>
    <body>
         <form method="post" action="">
   
            <div class="container">

                <button class="<?php echo $retorno['1'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa1">
                    <strong>1</strong>
                    <span><?php echo $retorno['1']; ?></span>
                </button>

                <button class="<?php echo $retorno['2'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa2">
                    <strong>2</strong>
                    <span><?php echo $retorno['2']; ?></span>
                </button>

                <button class="<?php echo $retorno['3'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa3">
                    <strong>3</strong>
                    <span><?php echo $retorno['3']; ?></span>
                </button>
                <button class="<?php echo $retorno['4'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa4">
                    <strong>4</strong>
                    <span><?php echo $retorno['4']; ?></span>
                </button>
            </div>

        </form>
    </body>
</html>
