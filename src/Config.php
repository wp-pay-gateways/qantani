<?php

/**
 * Title: Qantani config
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_Config extends Pronamic_WP_Pay_GatewayConfig {
	/**
	 * Merchant ID
	 *
	 * @var string
	 */
	public $merchant_id;

	/**
	 * Secret key
	 *
	 * @var string
	 */
	public $secret_key;

	/**
	 * Key version
	 *
	 * @var string
	 */
	public $key_version;

	public function get_gateway_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_Gateway';
	}
}
