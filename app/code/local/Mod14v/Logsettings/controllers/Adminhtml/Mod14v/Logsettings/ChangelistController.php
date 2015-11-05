<?php

class Mod14v_Logsettings_Adminhtml_Mod14v_Logsettings_ChangelistController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('mod14v_logsettings_changelist/change_list');

        $this->_addContent($this->getLayout()
            ->createBlock('mod14v_logsettings/adminhtml_change_list', 'mod14v_logsettings_change_grid'));

        $this->renderLayout();

    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id     = $this->getRequest()->getParam('id', false);
        $author = Mage::getModel('mod14v_logsettings/change');

        if ($id) {
            $author = $author->load($id);
        }
        $this->_title($author->getId() ? 'Edit' : 'New');
        Mage::register('change', $author);

        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('mod14v_logsettings/adminhtml_change_edit', 'mod14v_logsettings_change_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $author = Mage::getModel('mod14v_logsettings/change')->load($this->getRequest()->getParam('id'));
            $author->setData($data);
            $author->save();
            Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Change has been saved'));
            $this->_redirect('*/*/');
        }
    }

}