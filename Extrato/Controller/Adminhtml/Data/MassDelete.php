<?php

namespace SussexDev\Extrato\Controller\Adminhtml\Data;

use SussexDev\Extrato\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
