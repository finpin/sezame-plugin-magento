<?php

class Finpin_Sezame_Model_Auth extends Finpin_Sezame_Model_Abstract
{
    /** @var  \SezameLib\Client */
    protected $_client;

    protected function _construct()
    {
        $this->_client = new \SezameLib\Client($this->getConfigParam('credentials/certificate'), $this->getConfigParam('credentials/privatekey'));
    }

    /**
     * @param $username
     *
     * @return \SezameLib\Request\Auth
     */
    public function login($username)
    {
        return $this->_client->authorize()->setUsername($username);
    }

    /**
     * @param $id
     *
     * @return \SezameLib\Request\Status
     */
    public function status($id)
    {
        return $this->_client->status()->setAuthId($id);
    }

    /**
     * @param $username
     *
     * @return \SezameLib\Request\Auth
     */
    public function fraud($username)
    {
        return $this->_client->authorize()->setUsername($username)->setType('fraud')->setTimeout(1440);
    }

}