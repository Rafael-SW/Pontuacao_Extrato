<?php

namespace SussexDev\Extrato\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID           = 'id';
    const DATA         = 'data';
    const ID_CLI       = 'id_cli';
    const NM_CLI       = 'nm_cli';
    const ID_PEDIDO    = 'id_pedido';
    const DESCONTO     = 'desconto';
    const PTS_CLI      = 'pts_cli';
    const PTS_GASTOS   = 'pts_gastos';
    const PTS_GANHOS   = 'pts_ganhos';
    const TOTAL_PEDIDO = 'total_pedido';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get data
     *
     * @return date
     */
    public function getBdData();

    /**
     * Set data
     *
     * @param $data
     * @return date
     */
    public function setBdData($data);

    /**
     * Get id_cli
     *
     * @return int
     */
    public function getIdCli();

    /**
     * Set id_cli
     *
     * @param $id_cli
     * @return int
     */
    public function setIdCli($id_cli);

    /**
     * Get id_pedido
     *
     * @return int
     */
    public function getIdPedido();

    /**
     * Set id_pedido
     *
     * @param $id_pedido
     * @return int
     */
    public function setIdPedido($id_pedido);

    /**
     * Get desconto
     *
     * @return int
     */
    public function getDesconto();

    /**
     * Set desconto
     *
     * @param $desconto
     * @return double
     */
    public function setDesconto($desconto);

    /**
     * Get pts_cli
     *
     * @return double
     */
    public function getPtsCli();

    /**
     * Set pts_cli
     *
     * @param $pts_cli
     * @return double
     */
    public function setPtsCli($pts_cli);

    /**
     * Get pts_gastos
     *
     * @return double
     */
    public function getPtsGastos();

    /**
     * Set pts_gastos
     *
     * @param $pts_gastos
     * @return double
     */
    public function setPtsGastos($pts_gastos);

    /**
     * Get pts_ganhos
     *
     * @return double
     */
    public function getPtsGanhos();

    /**
     * Set pts_ganhos
     *
     * @param $pts_ganhos
     * @return double
     */
    public function setPtsGanhos($pts_ganhos);

    /**
     * Get total_pedido
     *
     * @return double
     */
    public function getTotalPedido();

    /**
     * Set total_pedido
     *
     * @param $total_pedido
     * @return double
     */
    public function setTotalPedido($total_pedido);


}
