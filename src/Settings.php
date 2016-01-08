<?php

/**
 * Title: Qantani gateway settings
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.1.0
 * @since 1.1.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_Settings extends Pronamic_WP_Pay_GatewaySettings {
	public function __construct() {
		add_filter( 'pronamic_pay_gateway_sections', array( $this, 'sections' ) );
		add_filter( 'pronamic_pay_gateway_fields', array( $this, 'fields' ) );
	}

	public function sections( array $sections ) {
		// Qantani
		$sections['qantani'] = array(
			'title'   => __( 'Qantani', 'pronamic_ideal' ),
			'methods' => array( 'qantani' ),
		);

		// Return
		return $sections;
	}

	public function fields( array $fields ) {
		// Merchant ID
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'qantani',
			'meta_key'    => '_pronamic_gateway_qantani_merchant_id',
			'title'       => _x( 'Merchant ID', 'qantani', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
		);

		// Merchant Key
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'qantani',
			'meta_key'    => '_pronamic_gateway_qantani_merchant_key',
			'title'       => _x( 'Merchant Key', 'qantani', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
		);

		// Merchant Secret
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'qantani',
			'meta_key'    => '_pronamic_gateway_qantani_merchant_secret',
			'title'       => _x( 'Merchant Secret', 'qantani', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'regular-text', 'code' ),
		);

		// Return
		return $fields;
	}
}
