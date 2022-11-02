<?php

class PedidoController {
    private $idPedido;
    private $numMesa;
    private $dataPedido;
    private $statusPedido;
    private $valorTotal;    
    
    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getNumMesa() {
        return $this->numMesa;
    }

    public function getDataPedido() {
        return $this->dataPedido;
    }

    public function getStatusPedido() {
        return $this->statusPedido;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function setIdPedido($idPedido): void {
        $this->idPedido = $idPedido;
    }

    public function setNumMesa($numMesa): void {
        $this->numMesa = $numMesa;
    }

    public function setDataPedido($dataPedido): void {
        $this->dataPedido = $dataPedido;
    }

    public function setStatusPedido($statusPedido): void {
        $this->statusPedido = $statusPedido;
    }

    public function setValorTotal($valorTotal): void {
        $this->valorTotal = $valorTotal;
    }
}

?>