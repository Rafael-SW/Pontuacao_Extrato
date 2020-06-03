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

use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Message\Manager;
use Magento\Framework\Api\DataObjectHelper;
use SussexDev\Sample\Api\DataRepositoryInterface;
use SussexDev\Sample\Api\Data\DataInterface;
use SussexDev\Sample\Api\Data\DataInterfaceFactory;
use SussexDev\Sample\Controller\Adminhtml\Data;

class Save extends Data
{
    /**
     * @var Manager
     */
    protected $messageManager;

    /**
     * @var DataRepositoryInterface
     */
    protected $dataRepository;

    /**
     * @var DataInterfaceFactory
     */
    protected $dataFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        Registry $registry,
        DataRepositoryInterface $dataRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Manager $messageManager,
        DataInterfaceFactory $dataFactory,
        DataObjectHelper $dataObjectHelper,
        Context $context
    ) {
        $this->messageManager   = $messageManager;
        $this->dataFactory      = $dataFactory;
        $this->dataRepository   = $dataRepository;
        $this->dataObjectHelper  = $dataObjectHelper;
        parent::__construct($registry, $dataRepository, $resultPageFactory, $resultForwardFactory, $context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();

        if(!isset($data)){
            $data=array();

            $sql = "SELECT * FROM Pontos;";
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
            $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $connection = $resource->getConnection();
            $connection->query($sql);
            $result = $connection->fetchAll($sql);

            $porcent_pontos_ganho = $this->getRequest()->getParam('porcent_pontos_ganho');
            $valor_ponto = $this->getRequest()->getParam('valor_ponto');
            $porcent_limite_pontos = $this->getRequest()->getParam('porcent_limite_pontos');


            $sql = "update Pontos set porcent_pontos_ganho=" . $porcent_pontos_ganho. " , valor_ponto="
                . $valor_ponto .", porcent_limite_pontos=" . $porcent_limite_pontos." ;";

            $connection->query($sql);

            return $resultRedirect->setPath('*/*/');

        }else{
            $data = $this->getRequest()->getPostValue();

            $id = $this->getRequest()->getParam('id');
            $model = $this->dataRepository->getById($id);

            $sql = "update Pontos set porcent_pontos_ganho=" . $data['porcent_pontos_ganho'] .
                " , valor_ponto=" . $data['valor_ponto'] . ", porcent_limite_pontos="
                .$data['porcent_limite_pontos']." where id=" . $id . ";";

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
            $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $connection = $resource->getConnection();
            $connection->query($sql);
            return $resultRedirect->setPath('*/*/');

        }

    }
}
