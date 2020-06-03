<?php

namespace SussexDev\Sample\Model;

use Magento\Framework\Model\AbstractModel;
use SussexDev\Sample\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'Pontos';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('SussexDev\Sample\Model\ResourceModel\Data');
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
     * Get title
     *
     * @return double
     */
    public function getPorcentPontosGanho()
    {
        return $this->getData(DataInterface::PORCENT_PONTOS_GANHO);
    }

    /**
     * Set title
     *
     * @param $porcent_pontos_ganho
     * @return double
     */
    public function setPorcentPontosGanho($porcent_pontos_ganho)
    {
        return $this->setData(DataInterface::PORCENT_PONTOS_GANHO, $porcent_pontos_ganho);
    }

    /**
     * Get valor ponto
     *
     * @return double
     */
    public function getValorPonto()
    {
        return $this->getData(DataInterface::VALOR_PONTO);
    }

    /**
     * Set data description
     *
     * @param $valor_ponto
     * @return double
     */
    public function setValorPonto($valor_ponto)
    {
        return $this->setData(DataInterface::VALOR_PONTO, $valor_ponto);
    }

    /**
     * Get Porcent Limit Pontos
     *
     * @return double
     */
    public function getPorcentLimitePontos()
    {
        return $this->getData(DataInterface::PORCENT_LIMITE_PONTOS);
    }

    /**
     * Set Porcent Limit Pontos
     *
     * @param $porcent_limite_pontos
     * @return double
     */
    public function setPorcentLimitePontos($porcent_limite_pontos)
    {
        return $this->setData(DataInterface::PORCENT_LIMITE_PONTOS, $porcent_limite_pontos);
    }


}
