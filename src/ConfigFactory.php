<?php

/**
 * Title: Qantani config factory
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_ConfigFactory extends Pronamic_WP_Pay_GatewayConfigFactory {
	/**
	 * Get config by post ID
	 *
	 * @param int $post_id
	 * @return Pronamic_WP_Pay_Gateways_Qantani_Config
	 */
	public function get_config( $post_id ) {
		$config = new Pronamic_WP_Pay_Gateways_Qantani_Config();

		$config->merchant_id     = get_post_meta( $post_id, '_pronamic_gateway_qantani_merchant_id', true );
		$config->merchant_secret = get_post_meta( $post_id, '_pronamic_gateway_qantani_merchant_secret', true );
		$config->merchant_key    = get_post_meta( $post_id, '_pronamic_gateway_qantani_merchant_key', true );

		return $config;
	}
}
