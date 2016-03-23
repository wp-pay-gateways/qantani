<?php

/**
 * Title: Qantani gateway settings
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.8
 * @since 1.0.0
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
			'description' => __( 'Account details are provided by the payment provider after registration. These settings need to match with the payment provider dashboard.', 'pronamic_ideal' ),
		);

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
			'tooltip'     => sprintf(
				'%s %s.',
				_x( 'Merchant ID', 'qantani', 'pronamic_ideal' ),
				sprintf(
					__( 'as mentioned in the %s dashboard', 'pronamic_ideal' ),
					__( 'Qantani', 'pronamic_ideal' )
				)
			),
		);

		// Merchant Key
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'qantani',
			'meta_key'    => '_pronamic_gateway_qantani_merchant_key',
			'title'       => _x( 'Merchant Key', 'qantani', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'code' ),
			'tooltip'     => sprintf(
				'%s %s.',
				_x( 'Merchant Key', 'qantani', 'pronamic_ideal' ),
				sprintf(
					__( 'as mentioned in the %s dashboard', 'pronamic_ideal' ),
					__( 'Qantani', 'pronamic_ideal' )
				)
			),
		);

		// Merchant Secret
		$fields[] = array(
			'filter'      => FILTER_SANITIZE_STRING,
			'section'     => 'qantani',
			'meta_key'    => '_pronamic_gateway_qantani_merchant_secret',
			'title'       => _x( 'Merchant Secret', 'qantani', 'pronamic_ideal' ),
			'type'        => 'text',
			'classes'     => array( 'regular-text', 'code' ),
			'tooltip'     => sprintf(
				'%s %s.',
				_x( 'Merchant Secret', 'qantani', 'pronamic_ideal' ),
				sprintf(
					__( 'as mentioned in the %s dashboard', 'pronamic_ideal' ),
					__( 'Qantani', 'pronamic_ideal' )
				)
			),
		);

		// Transaction feedback
		$fields[] = array(
			'section'       => 'qantani',
			'title'         => __( 'Transaction feedback', 'pronamic_ideal' ),
			'type'          => 'description',
			'html'          => sprintf(
				'<span class="dashicons dashicons-no"></span> %s',
				__( 'Payment status updates are not supported by this payment provider.', 'pronamic_ideal' )
			),
		);

		return $fields;
	}
}
