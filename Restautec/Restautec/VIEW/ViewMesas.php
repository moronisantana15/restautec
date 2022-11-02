
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

        if(isset($_POST['btnMesa5'])){
            $temMesaOcupada = $opMesa->verificaMesas(5);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 5;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa6'])){
            $temMesaOcupada = $opMesa->verificaMesas(6);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 6;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa7'])){
            $temMesaOcupada = $opMesa->verificaMesas(7);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 7;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa8'])){
            $temMesaOcupada = $opMesa->verificaMesas(8);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 8;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa9'])){
            $temMesaOcupada = $opMesa->verificaMesas(9);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 9;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa10'])){
            $temMesaOcupada = $opMesa->verificaMesas(10);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 10;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa11'])){
            $temMesaOcupada = $opMesa->verificaMesas(11);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 11;
                header('location: ViewFechamento.php');
            }else{
                $arrayMesas = $opMesa->mostrarTodasAsMesas();
            }
        }
        
        if(isset($_POST['btnMesa12'])){
            $temMesaOcupada = $opMesa->verificaMesas(12);
            if($temMesaOcupada){
                $_SESSION['num_mesa'] = 12;
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

                <button class="<?php echo $arrayMesas[0]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa1">
                    <strong>1</strong>
                    <span><?php echo $arrayMesas[0]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[1]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa2">
                    <strong>2</strong>
                    <span><?php echo $arrayMesas[1]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[2]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa3">
                    <strong>3</strong>
                    <span><?php echo $arrayMesas[2]['status_mesa']; ?></span>
                </button>
                <button class="<?php echo $arrayMesas[3]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa4">
                    <strong>4</strong>
                    <span><?php echo $arrayMesas[3]['status_mesa']; ?></span>
                </button>
                
                <button class="<?php echo $arrayMesas[4]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa5">
                    <strong>5</strong>
                    <span><?php echo $arrayMesas[4]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[5]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa6">
                    <strong>6</strong>
                    <span><?php echo $arrayMesas[5]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[6]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa7">
                    <strong>7</strong>
                    <span><?php echo $arrayMesas[6]['status_mesa']; ?></span>
                </button>
                <button class="<?php echo $arrayMesas[7]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa8">
                    <strong>8</strong>
                    <span><?php echo $arrayMesas[7]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[8]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa9">
                    <strong>9</strong>
                    <span><?php echo $arrayMesas[8]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[9]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa10">
                    <strong>10</strong>
                    <span><?php echo $arrayMesas[9]['status_mesa']; ?></span>
                </button>

                <button class="<?php echo $arrayMesas[10]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa11">
                    <strong>11</strong>
                    <span><?php echo $arrayMesas[10]['status_mesa']; ?></span>
                </button>
                <button class="<?php echo $arrayMesas[11]['status_mesa'] == "Livre" ? 'btnMesaLivre' : 'btnMesaOcupada' ?>" type="submit" name="btnMesa12">
                    <strong>12</strong>
                    <span><?php echo $arrayMesas[11]['status_mesa']; ?></span>
                </button>
            </div>

        </form>
    </body>
</html>
