<?php

namespace SussexDev\Extrato\Controller\Adminhtml\Data;

use SussexDev\Extrato\Controller\Adminhtml\Data;

class Edit extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('SussexDev_Extrato::data')
            ->addBreadcrumb(__('Data'), __('Data'))
            ->addBreadcrumb(__('Manage Data'), __('Manage Data'));

        if ($id === null) {

            $resultPage->addBreadcrumb(__('Nova Pontuação'), __('Nova Pontuação'));
            $resultPage->getConfig()->getTitle()->prepend(__('Nova Pontuação'));



        } else {
            $resultPage->addBreadcrumb(__('Editar Data'), __('Editar Data'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->dataRepository->getById($id)->getPontos()
            );
        }
        return $resultPage;
    }
}
