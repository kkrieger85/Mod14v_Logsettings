<?php

/**
 * Created by PhpStorm.
 * User: kkrieger
 * Date: 02.05.15
 * Time: 10:59
 */
class Mod14v_Logsettings_Model_Resource_Change extends Mage_Core_Model_Resource_Db_Abstract
{

    protected function _construct()
    {
        $this->_init('mod14v_logsettings/change', 'id');
    }


    /**
     * Set created/modified values before user save
     *
     * @param Mage_Core_Model_Abstract $change
     *
     * @return Mage_Admin_Model_Resource_User
     */

    protected function _beforeSave(Mage_Core_Model_Abstract $change)
    {
        if ($change->isObjectNew()) {
            $change->setChanged($this->formatDate(true));
        }

        return parent::_beforeSave($change);
    }


}