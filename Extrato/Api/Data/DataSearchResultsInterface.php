<?php

namespace SussexDev\Extrato\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \SussexDev\Extrato\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \SussexDev\Extrato\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
