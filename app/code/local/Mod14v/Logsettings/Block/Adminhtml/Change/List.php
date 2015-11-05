<?php

/**
 * Created by PhpStorm.
 * User: kkrieger
 * Date: 02.05.15
 * Time: 13:03
 */
class Mod14v_Logsettings_Block_Adminhtml_Change_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'mod14v_logsettings';
        $this->_controller = 'adminhtml_change_list';
        $this->_headerText      = $this->__('Settings-Changelog');
        // $this->_addButtonLabel  = $this->__('Add Button Label');
        parent::__construct();
    }

    public function getCreateUrl()
    {
        return $this->getUrl('*/*/new');
    }


}

