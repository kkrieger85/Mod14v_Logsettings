<?php

/**
 * Created by PhpStorm.
 * User: kkrieger
 * Date: 02.05.15
 * Time: 11:26
 */
class Mod14v_Logsettings_Model_Observer
{

    public function saveChange(Varien_Event_Observer $observer)
    {
        //Mage::log('--', Zend_Log::INFO, 'kkrieger.log', true);

        /**
         * @var Mage_Core_Model_Config_Data $configData
         */

        $configData = $observer->getConfigData();

//        if (is_array($configData->getValue())) {
//            $configData->setValue(join(',', $configData->getValue()));
//        }

        if ($configData->isValueChanged()) {
            /**
             * isValueChange doesn't work for Mulitselects
             */
            $user = Mage::getSingleton('admin/session');
            //$userId = $user->getUser()->getUserId();
            $userEmail = $user->getUser()->getEmail();
            $userName  = $user->getUser()->getUsername();

            $scope   = $configData->getScrope();
            $scopeId = $configData->getScropeId();

            $path = $configData->getPath();


            $oldValue = $configData->getOldValue();
            $newValue = $configData->getValue();


            try {
                Mage::getModel('mod14v_logsettings/change')
                    ->setAdminuserName($userName)
                    ->setAdminuserEmail($userEmail)
                    ->setScope($scope)
                    ->setScopeId($scopeId)
                    ->setSettingsPath($path)
                    ->setOldvalue($oldValue)
                    ->setNewvalue($newValue)
                    ->save();
                Mage::log($newValue, Zend_Log::INFO, 'kkrieger.log', true);

            } catch (Exception $e) {
                //var_dump($e);
                Mage::log('Fehler beim Speicher der Änderungen in '.__METHOD__, Zend_Log::ERR, 'exception.log');
            }

            //$message = $path . "changed from " . $oldValue . " to " . $newValue . " by " . $userName . " (" . $userEmail . ")";
            //Mage::log($message, Zend_Log::INFO, 'kkrieger.log', true);

        }


    }

}