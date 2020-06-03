<?php

namespace SussexDev\Extrato\Model;

use Magento\Framework\Model\AbstractModel;
use SussexDev\Extrato\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'descontos_pedido';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('SussexDev\Extrato\Model\ResourceModel\Data');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get data
     *
     * @return date
     */
    public function getBdData()
    {
        return $this->getData(DataInterface::DATA);
    }

    /**
     * Set data
     *
     * @param $data
     * @return $this
     */
    public function setBdData($data)
    {
        return $this->setData(DataInterface::DATA, $data);
    }

    /**
     * Get id_cli
     *
     * @return int
     */
    public function getIdCli()
    {
        return $this->getData(DataInterface::ID_CLI);
    }

    /**
     * Set id_cli
     *
     * @param $id_cli
     * @return int
     */
    public function setIdCli($id_cli)
    {
        return $this->setData(DataInterface::ID_CLI, $id_cli);
    }

    /**
     * Get id_pedido
     *
     * @return int
     */
    public function getIdPedido()
    {
        return $this->getData(DataInterface::ID_PEDIDO);
    }

    /**
     * Set id_pedido
     *
     * @param $id_pedido
     * @return int
     */
    public function setIdPedido($id_pedido)
    {
        return $this->setData(DataInterface::ID_PEDIDO, $id_pedido);
    }

    /**
     * Get desconto
     *
     * @return double
     */
    public function getDesconto()
    {
        return $this->getData(DataInterface::DESCONTO);
    }

    /**
     * Set desconto
     *
     * @param $desconto
     * @return double
     */
    public function setDesconto($desconto)
    {
        return $this->setData(DataInterface::DESCONTO, $desconto);
    }

    /**
     * Get pts_cli
     *
     * @return double
     */
    public function getPtsCli()
    {
        return $this->getData(DataInterface::PTS_CLI);
    }

    /**
     * Set pts_cli
     *
     * @param $pts_cli
     * @return double
     */
    public function setPtsCli($pts_cli)
    {
        return $this->setData(DataInterface::PTS_CLI, $pts_cli);
    }

    /**
     * Get pts_gastos
     *
     * @return double
     */
    public function getPtsGastos()
    {
        return $this->getData(DataInterface::PTS_GASTOS);
    }

    /**
     * Set pts_gastos
     *
     * @param $pts_gastos
     * @return double
     */
    public function setPtsGastos($pts_gastos)
    {
        return $this->setData(DataInterface::PTS_GASTOS, $pts_gastos);
    }

    /**
     * Get pts_ganhos
     *
     * @return double
     */
    public function getPtsGanhos()
    {
        return $this->getData(DataInterface::PTS_GANHOS);
    }

    /**
     * Set pts_ganhos
     *
     * @param $pts_ganhos
     * @return double
     */
    public function setPtsGanhos($pts_ganhos)
    {
        return $this->setData(DataInterface::PTS_GANHOS, $pts_ganhos);
    }

    /**
     * Get total_pedido
     *
     * @return double
     */
    public function getTotalPedido()
    {
        return $this->getData(DataInterface::TOTAL_PEDIDO);
    }

    /**
     * Set total_pedido
     *
     * @param $total_pedido
     * @return double
     */
    public function setTotalPedido($total_pedido)
    {
        return $this->setData(DataInterface::TOTAL_PEDIDO, $total_pedido);
    }


}
