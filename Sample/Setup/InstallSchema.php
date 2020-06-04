<?php
/*
 * SussexDev_Sample

 * @category   SussexDev
 * @package    SussexDev_Sample
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-sampleuicomponent/blob/master/LICENSE.md
 * @version    1.1.2
 */
namespace SussexDev\Sample\Setup;

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
        $tableName = $installer->getTable('Pontos');

        if (!$installer->tableExists('Pontos')) {
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
                    'porcent_pontos_ganho',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Porcent_Pontos_ganho'
                )
                ->addColumn(
                    'valor_ponto',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Valor_Ponto'
                )
                ->addColumn(
                    'porcent_limite_pontos',
                    Table::TYPE_DOUBLE,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Porcent_Limite_Pontos'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
