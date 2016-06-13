<?php

class Hans2103_KiyohsnippetsOverride_Helper_Data extends Magmodules_Kiyohsnippets_Helper_Data {

  function getKiyohShowLink() {
    return Mage::getStoreConfig('kiyohsnippets/api/show_link');
  }

	function getKiyohLink() {

		if(!$this->getKiyohShowLink()) {
			return false;
		}

		if(empty(Mage::getStoreConfig('kiyohsnippets/api/kiyoh_link')))
		{
  		return false;
		}

		return Mage::getStoreConfig('kiyohsnippets/api/kiyoh_link');
	}

}
