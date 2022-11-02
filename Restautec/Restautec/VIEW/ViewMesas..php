
<?php
    session_start();
    
    require_once '../MODEL/Conexao.php';
    require_once '../MODEL/OpMesas.php';
    
    
        $opMesa = new OpMesas();
        
        $arrayMesas = $opMesa->mostrarTodasAsMesas();
        
        if(isset($_POST['btnMesa1'])){
            $temMesaOcupada = $opMesa->verificaMesas(1);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 1;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa2'])){
            $temMesaOcupada = $opMesa->verificaMesas(2);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 2;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa3'])){
            $temMesaOcupada = $opMesa->verificaMesas(3);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 3;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa4'])){
            $temMesaOcupada = $opMesa->verificaMesas(4);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 4;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }

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

                <button class="<?php echo $arrayMesas[0]['status_mesa'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa1">
                    <strong>1</strong>
                    <span><?php echo $arrayMesas[0]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[1]['status_mesa'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa2">
                    <strong>2</strong>
                    <span><?php echo $arrayMesas[1]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[2]['status_mesa'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa3">
                    <strong>3</strong>
                    <span><?php echo $arrayMesas[2]['status_mesa']; ?></span>
                </button>
                <button class="<?php echo $arrayMesas[3]['status_mesa'] == "LIVRE" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa4">
                    <strong>4</strong>
                    <span><?php echo $arrayMesas[3]['status_mesa']; ?></span>
                </button>
            </div>

        </form>
    </body>
</html>
