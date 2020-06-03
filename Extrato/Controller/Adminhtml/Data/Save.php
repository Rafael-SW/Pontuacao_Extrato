<?php

namespace SussexDev\Extrato\Controller\Adminhtml\Data;

use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Message\Manager;
use Magento\Framework\Api\DataObjectHelper;
use SussexDev\Extrato\Api\DataRepositoryInterface;
use SussexDev\Extrato\Api\Data\DataInterface;
use SussexDev\Extrato\Api\Data\DataInterfaceFactory;
use SussexDev\Extrato\Controller\Adminhtml\Data;

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

            $sql = "SELECT * FROM descontos_pedido;";
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
            $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $connection = $resource->getConnection();
            $connection->query($sql);
            $result = $connection->fetchAll($sql);

            $id          = $this->getRequest()->getParam('id');
            $data        = $this->getRequest()->getParam('data');
            $id_cli      = $this->getRequest()->getParam('id_cli');
            $id_pedido   = $this->getRequest()->getParam('id_pedido');
            $desconto    = $this->getRequest()->getParam('desconto');
            $pts_cli     = $this->getRequest()->getParam('pts_cli');
            $pts_gastos  = $this->getRequest()->getParam('pts_gastos');
            $pts_ganhos  = $this->getRequest()->getParam('pts_ganhos');
            $total_pedido= $this->getRequest()->getParam('total_pedido');

            return $resultRedirect->setPath('*/*/');

        }else{
            $data = $this->getRequest()->getPostValue();

            $id = $this->getRequest()->getParam('id');
            $model = $this->dataRepository->getById($id);

            $sql = "update Pontos set pontos=" . $data['pontos'] . " , valor=" . $data['valor'] . ", porcentagem=".$data['porcentagem']." where id=" . $id . ";";
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
            $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
            $connection = $resource->getConnection();
            $connection->query($sql);
            return $resultRedirect->setPath('*/*/');

        }

    }
}
