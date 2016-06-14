<?php

class Hans2103_KiyohsnippetsOverride_Helper_Data extends Magmodules_Kiyohsnippets_Helper_Data {

	function getSnapshopRequest() {
		$kiyoh_shop_id = Mage::getStoreConfig('kiyohsnippets/api/shop_id');
		$api_url = Mage::getStoreConfig('kiyohsnippets/api/api_url');
		$filename = 'https://' . $api_url . '/widgetfeed.php?company=';

 		if(!$kiyoh_shop_id) {
   		return false;
   	}

   	$xml = $this->getXml($filename . $kiyoh_shop_id, 1);
		if(!$xml) {
  		return false;
    }

    $data = $xml->channel->description;
		$snippets = array();

    $snippets['avg'] = $this->getSnippetsAvg($data);
    $snippets['qty'] = $this->getSnippetsQty($data);
    $snippets['shopname'] = 'shopname';

		return $snippets;
	}

	function getSnippetsAvg($data) {

    $pieces = explode(',',$data);
    $score  = explode(' ',$pieces[0]);

  	return array_pop($score);
	}

	function getSnippetsQty($data) {
  	$pieces = explode(' ', $data);

  	return array_pop($pieces);
	}

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
