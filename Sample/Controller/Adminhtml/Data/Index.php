<?php

namespace SussexDev\Sample\Controller\Adminhtml\Data;

use SussexDev\Sample\Controller\Adminhtml\Data;

class Index extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Pontuação'));

        //return $this->resultPageFactory->create();
        return $resultPage;
    }

    public function _isAllowed(){

        return $this->_authorization->isAllowed('SussexDev_Sample::item');
    }
}
