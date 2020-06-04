<?php
//
//namespace SussexDev\Observers\Observer;
//
//use Magento\Framework\Event\Observer;
//use Magento\Framework\Event\ObserverInterface;
//
//class NewOrder implements ObserverInterface
//{
//    protected $logger;
//
//    public function __construct(
//        \Psr\Log\LoggerInterface $logger
//    ) {
//        $this->logger = $logger;
//    }
//
//    public function execute(Observer $observer)
//    {
//        $order = $observer->getEvent()->getOrder();
//        $orderId = $order->getId();
//
//        $order = $observer->getEvent()->getOrder();
//        $incrementId = $order->getIncrementId();
//
//        $this->logger->info('Observer Atingido Place Order', $observer->debug());
//
//        $sql = "SELECT * FROM customer_entity where entity_id =" . $order->getCustomerId() . ";";
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
//        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
//        $connection = $resource->getConnection();
//        $connection->query($sql);
//        $result = $connection->fetchAll($sql);
//
//        //pegando os pontos do sistema
//
//        $sql = "SELECT * FROM Pontos";
//        $connection->query($sql);
//
//        $pontos = $connection->fetchAll($sql);
//
//        $desconto = 0;
//        $ptsGanho=0;
//        $pctgPtsMax=0;
//        $ptsValor=0;
//        foreach ($pontos as $p) {
//            $ptsGanho = $p['porcent_pontos_ganho'];
//            $pctgPtsMax = $p['porcent_limite_pontos'];
//            $ptsValor = $p['valor_ponto'];
//        }
//        //pegando pontos do cliente.
//
//        $sql = "SELECT pontos FROM customer_entity where entity_id =" . $order['customer_id'] . ";";
//        $connection->query($sql);
//        $ptscli = $connection->fetchAll($sql);
//        $ponto = 0;
//
//        foreach ($ptscli as $pscli) {
//            $ponto = $pscli['pontos'];
//        }
//
//        $valorPedido = $order['grand_total'];
//
//        //pontos gerados a partir de (valor da compra atual * porcentagem de pontos limite por desconto)
//        $ptsUso = ($valorPedido*$pctgPtsMax)/100;
//
//        //pontos usado pelo cliente para ter desconto na compra atual
//        $ptsGastos=0;
//
//        //$ponto = pts do cliente
//        if ($ponto >= $ptsUso) {
//            $vl = $ponto - $ptsUso;
//            $this->logger->info('AAAAAAAAA ' . $vl, $observer->debug());
//            $this->logger->info('TESTE ' . $order->getGrandTotal(), $observer->debug());
//
//            $sql = "UPDATE customer_entity SET pontos=" . $vl . "WHERE entity_id=" . $order['customer_id'] . ";";
//
//            $ptsGastos = $ptsUso;
//        }else if($pontos > 0){
//            $sql = "UPDATE customer_entity SET pontos=0.0 WHERE entity_id=" . $order['customer_id'] . ";";
//            $connection->query($sql);
//            $ptsGastos = $ponto;
//        }
//        $connection->query($sql);
//        $this->logger->info('BBBBBBBBBB ' . $ponto, $observer->debug());
//
//        //aplicando pontuacao pro cliente com base no valor da compra atual
//        $ptsProCli = ($ptsGanho * $valorPedido)/100;
//
//        $sql = "UPDATE customer_entity SET pontos = round(pontos + " . $ptsProCli . ",2) WHERE entity_id=" . $order['customer_id'] . ";";
//        $connection->query($sql);
//
//        $desconto =($ptsGastos * $ptsValor);
//
//        //pegando o nome completo do cliente
//
//        $sql = "SELECT * FROM customer_entity WHERE entity_id = " . $order['customer_id'] . ";";
//        $connection->query($sql);
//        $cli = $connection->fetchAll($sql);
//
//        $cliente = '';
//        foreach ($cli as $c) {
//            $cliente = $c['firstname'];
//        }
//
//        //inserindo dados da tabela desconto_pedido
//
//        $sqli = "INSERT INTO descontos_pedido(data, id_cli, id_pedido, nm_cli, desconto,pts_cli, pts_gastos, pts_ganhos, total_pedido) values('" . $order['created_at'] . "'," . $order['customer_id'] . "," . $incrementId . ",'" . $cliente . "'," . $desconto . "," . $ponto . "," . $ptsGastos . "," . $ptsProCli . "," . $order['grand_total'] . " );";
//        $sqli = preg_replace("/\r?\n/", "", $sqli);
//        $connection->query($sqli);
//
//       // $order->setGrandTotal($order->getGrandTotal()-$desconto);
//        $this->logger->info('TESTE TESTE TESTE ' . $order->getGrandTotal(), $observer->debug());
//
//        $orderr = $objectManager->create('Magento\Sales\Model\Order')->load($order->getId());
//        $quotee = $objectManager->create('\Magento\Quote\Model\Quote')->load($orderr->getQuoteId());
//
//        $orderr->setSubtotal($order->getGrandTotal()-$desconto)
//            ->setBaseSubtotal($order->getGrandTotal()-$desconto)
//            ->setGrandTotal($order->getGrandTotal()-$desconto)
//            ->setBaseGrandTotal($order->getGrandTotal()-$desconto);
//        $quotee->save();
//        $orderr->save();
//
//
//        $orderId = $order->getId();
//
//        $incrementId = $order->getIncrementId();
//
//        $this->logger->info('ORDER_ID: '.$orderId, $observer->debug());
//        $this->logger->info('INCREMENT_ID: '.$incrementId, $observer->debug());
//    }
//}

namespace SussexDev\Observers\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class NewOrder implements ObserverInterface
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info('Observer Atingido sales_order_save_after', $observer->debug());

        $order = $observer->getEvent()->getOrder();
        $orderId = $order->getId();

        $order = $observer->getEvent()->getOrder();
       $incrementId = $order->getIncrementId();

        $this->logger->info('INCREMENT_ID: ' . $incrementId, $observer->debug());
        $this->logger->info('ORDER_ID: ' . $orderId, $observer->debug());

        $sql = "SELECT status FROM sales_order where entity_id =" . $orderId . ";";
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $connection->query($sql);
        $result = $connection->fetchAll($sql);

        $status='';
        foreach ($result as $r) {
            $status = $r['status'];
        }

        if($status == 'holded') {
            $this->logger->info('ORDER STATUS: ' . $status, $observer->debug());
        }else{
            $this->logger->info('ENTROU NO ELSE: ' . $status, $observer->debug());
        }

    }
}
