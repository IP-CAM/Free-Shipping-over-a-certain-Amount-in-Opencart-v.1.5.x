<?php
/**
 * Released under GPL v3 License
 * Developed by Ugo R. Piemontese <http://www.ugopiemontese.eu>
 */

class ModelShippingRaccomandata extends Model {
	function getQuote($address) {
		$this->language->load('shipping/raccomandata');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('raccomandata_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
	
		if (!$this->config->get('raccomandata_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

		$method_data = array();
	
		if ($status) {

			$quote_data = array();
			
			$subTotal = $this->cart->getSubTotal();
			$maxTotal = $this->config->get('raccomandata_max_total');
			$cost = $this->config->get('raccomandata_cost');
			
			if ($subTotal >= $maxTotal)
				$cost = 0;

	      		$quote_data['raccomandata'] = array(
				'code'         => 'raccomandata.raccomandata',
				'title'        => $this->language->get('text_description'),
				'cost'         => $cost,
				'tax_class_id' => $this->config->get('raccomandata_tax_class_id'),
				'text'         => $this->currency->format($this->tax->calculate($cost, $this->config->get('raccomandata_tax_class_id'), $this->config->get('config_tax')))
	      		);

	      		$method_data = array(
				'code'       => 'raccomandata',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data ,
				'sort_order' => $this->config->get('raccomandata_sort_order'),
				'error'      => false
	      		);

		}
	
		return $method_data;
	}
}
?>
