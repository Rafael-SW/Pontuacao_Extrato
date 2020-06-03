<?php
/*
 * SussexDev_Sample

 * @category   SussexDev
 * @package    SussexDev_Sample
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-sampleuicomponent/blob/master/LICENSE.md
 * @version    1.1.2
 */
namespace SussexDev\Sample\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID           = 'id';
    const PORCENT_PONTOS_GANHO  = 'porcent_pontos_ganho';
    const VALOR_PONTO           = 'valor_ponto';
    const PORCENT_LIMITE_PONTOS = 'porcent_limite_pontos';

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
     * Get Porcent Pontos Ganho
     *
     * @return double
     */
    public function getPorcentPontosGanho();

    /**
     * Set Porcent Pontos Ganho
     *
     * @param $porcent_pontos_ganho
     * @return mixed
     */
    public function setPorcentPontosGanho($porcent_pontos_ganho);

    /**
     * Get Valor Ponto
     *
     * @return mixed
     */
    public function getValorPonto();

    /**
     * Set Valor Ponto
     *
     * @param $valor_ponto
     * @return mixed
     */
    public function setValorPonto($valor_ponto);

    /**
     * Get Porcent Limite Pontos
     *
     * @return double
     */
    public function getPorcentLimitePontos();

    /**
     * Set Porcent Limite Pontos
     *
     * @param $porcent_limite_pontos
     * @return DataInterface
     */
    public function setPorcentLimitePontos($porcent_limite_pontos);

}
