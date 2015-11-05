<?php
/**
 * Created by PhpStorm.
 * User: kkrieger
 * Date: 02.05.15
 * Time: 13:27
 */
class Mod14v_Logsettings_Model_Resource_Change_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    protected function _construct()
    {
        $this->_init('mod14v_logsettings/change');
    }
}