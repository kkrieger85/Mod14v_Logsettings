<?php

class Mod14v_Logsettings_Block_Adminhtml_Change_List_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('change_list_grid');
        $this->setUseAjax(true);
        $this->setDefaultSort('changed DESC');
        $this->setFilterVisibility(true);
        $this->setPagerVisibility(true);

    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    protected function _prepareCollection()
    {

        $collection = Mage::getModel('mod14v_logsettings/change')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'   => 'ID',
            'width'    => 50,
            'sortable' => false,
            'index'    => 'id',
            'type'     => 'int',
        ));
        $this->addColumn('adminuser_name', array(
            'header'   => 'Name',
            'sortable' => false,
            'index'    => 'adminuser_name',
            'type'     => 'string',
        ));
        $this->addColumn('adminuser_email', array(
            'header'   => 'eMail',
            'sortable' => false,
            'index'    => 'adminuser_email',
            'type'     => 'string',
        ));
        $this->addColumn('scope', array(
            'header'   => 'Scope',
            'sortable' => false,
            'index'    => 'scope',
            'type'     => 'string',
        ));
        $this->addColumn('scope_id', array(
            'header'   => 'ScopeID',
            'sortable' => false,
            'index'    => 'scope_id',
            'type'     => 'int',
        ));
        $this->addColumn('settings_path', array(
            'header'   => 'ScopeID',
            'sortable' => true,
            'index'    => 'settings_path',
            'type'     => 'string',
        ));
        $this->addColumn('oldvalue', array(
            'header'   => 'OldValue',
            'sortable' => false,
            'index'    => 'oldvalue',
            'type'     => 'string',
        ));
        $this->addColumn('newvalue', array(
            'header'   => 'NewValue',
            'sortable' => false,
            'index'    => 'newvalue',
            'type'     => 'string',
        ));

//        $this->addColumn('action', array(
//            'header'  => 'Action',
//            'type'    => 'action',
//            'getter'  => 'getId',
//            'filter'  => false,
//            'actions' => array(
//                array(
//                    'caption' => 'Edit',
//                    'url'     => array(
//                        'base' => '*/*/edit',
//                    ),
//                    'field'   => 'id',
//                )
//            ),
//        ));

        return parent::_prepareColumns();
    }

}