<?php

namespace SussexDev\Extrato\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('descontos_pedidos');

        if (!$installer->tableExists('descontos_pedidos')) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'pontos',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Pontos'
                )
                ->addColumn(
                    'valor',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Valor'
                )
                ->addColumn(
                    'porcentagem',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Porcentagem'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
