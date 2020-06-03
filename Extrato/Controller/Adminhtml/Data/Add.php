<?php

namespace SussexDev\Extrato\Controller\Adminhtml\Data;

use SussexDev\Extrato\Controller\Adminhtml\Data;

class Add extends Data
{
    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
