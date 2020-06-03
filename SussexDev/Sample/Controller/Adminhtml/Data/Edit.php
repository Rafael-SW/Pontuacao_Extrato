<?php
/*
 * SussexDev_Sample

 * @category   SussexDev
 * @package    SussexDev_Sample
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-sampleuicomponent/blob/master/LICENSE.md
 * @version    1.1.2
 */
namespace SussexDev\Sample\Controller\Adminhtml\Data;

use SussexDev\Sample\Controller\Adminhtml\Data;

class Edit extends Data
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('SussexDev_Sample::data')
            ->addBreadcrumb(__('Data'), __('Data'))
            ->addBreadcrumb(__('Manage Data'), __('Manage Data'));

        if ($id === null) {

            $porcent_pontos_ganho = $this->getRequest()->getParam('porcent_pontos_ganho');
            echo $porcent_pontos_ganho;
            $resultPage->addBreadcrumb(__('Nova Pontuação'), __('Nova Pontuação'));
            $resultPage->getConfig()->getTitle()->prepend(__('Nova Pontuação'));



        } else {
            $resultPage->addBreadcrumb(__('Editar Data'), __('Editar Data'));
            $resultPage->getConfig()->getTitle()->prepend(
                $this->dataRepository->getById($id)->getDataTitle()
            );
        }
        return $resultPage;
    }
}
