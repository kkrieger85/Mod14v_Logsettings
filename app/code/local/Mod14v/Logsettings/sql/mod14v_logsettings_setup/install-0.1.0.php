<?php
/**
 * Created by PhpStorm.
 * User: kkrieger
 * Date: 02.05.15
 * Time: 10:56
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

// $tablename = 'mod14vSettingsChange';
$tablename = $installer->getTable('mod14v_logsettings/change'); //Gibt Tabellennamen mit Prefix zurueck

$connection   = $installer->getConnection();
$changesTable = $connection->newTable($tablename)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, array(
        'identity' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Entity Id')
    ->addColumn('adminuser_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(
        'identity' => false,
        'nullable' => false,
        'primary'  => false,
    ), 'Adminuser Name')
    ->addColumn('adminuser_email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 250, array(
        'identity' => false,
        'nullable' => false,
        'primary'  => false,
    ), 'Adminuser eMail')
    ->addColumn('scope', Varien_Db_Ddl_Table::TYPE_TEXT, 8, array(
        'nullable' => false,
        'default'  => 'default',
    ), 'Config Scope')
    ->addColumn('scope_id', Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, array(
        'nullable' => false,
        'default'  => '0',
    ), 'Config Scope Id')
    ->addColumn('settings_path', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'identity' => false,
        'nullable' => false,
        'primary'  => false,
    ), 'Settings Path')
    ->addColumn('oldvalue', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(), 'Old Config Value')
    ->addColumn('newvalue', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(), 'New Config Value')
    ->addColumn('changed', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, NULL, array(
        'nullable' => false,
    ), 'Change Time');

$connection->createTable($changesTable);

$installer->endSetup();