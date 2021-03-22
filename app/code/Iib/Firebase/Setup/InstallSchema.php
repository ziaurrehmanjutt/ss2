<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_RefundRequest
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Iib\Firebase\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Create Database
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $this->createTableFirebaseToken($installer);
        $this->createTableFirebaseNotifications($installer);
        $installer->endSetup();
    }

    /**
     * Create table 'bss_refundrequest'
     *
     * @param $installer
     */
    private function createTableFirebaseToken($installer)
    {
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('iib_firebase'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Id'
            )
            ->addColumn(
                'firebase_token',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Firebase Token'
            )
            ->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                '2M',
                [],
                'Customer ID'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Post Created At'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Post Updated At'
            )
            ->addIndex(
                $installer->getIdxName('bss_refundrequest', ['id']),
                ['id']
            )
            ->setComment("Refund Request");
        $installer->getConnection()->createTable($table);
    }

        /**
     * Create table 'bss_requestlabel'
     * @param $installer
     */
     private function createTableFirebaseNotifications($installer)
     {
         $installer->startSetup();
         $table = $installer->getConnection()
             ->newTable($installer->getTable('iib_notifications'))
             ->addColumn(
                 'id',
                 \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 null,
                 [
                     'identity'  => true,
                     'unsigned'  => true,
                     'nullable'  => false,
                     'primary'   => true,
                 ],
                 'Id'
             )
             ->addColumn(
                 'request_label',
                 \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                 '2M',
                 [],
                 'Request Label'
             )
             ->addColumn(
                'request_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Request ID'
            )
             ->addColumn(
                 'status',
                 \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 '2M',
                 ['nullable' => false, 'default' => 0],
                 'Status'
             )
             ->addColumn(
                'request_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                '2M',
                ['nullable' => true, 'default' => 0],
                'Request Type'
            )
             ->addColumn( 
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                '2M',
                ['nullable' => false, 'default' => 0],
                'Customer ID'
            )
            ->addColumn(
                'request_data',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                '2M',
                ['nullable' => true, 'default' => 0],
                'Request Data'
            )
             ->addIndex(
                 $installer->getIdxName('bss_requestlabel', ['id']),
                 ['id']
             )
             ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Post Created At'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Post Updated At'
            )
             ->setComment("Refund Request Dropdown Options");
         $installer->getConnection()->createTable($table);
     }

}
