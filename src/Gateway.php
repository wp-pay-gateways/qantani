<?php

/**
 * Title: Qantani gateway
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.1.0
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_Gateway extends Pronamic_WP_Pay_Gateway {
	/**
	 * Slug of this gateway
	 *
	 * @var string
	 */
	const SLUG = 'qantani';

	/////////////////////////////////////////////////

	/**
	 * Constructs and initializes an Qantani gateway
	 *
	 * @param Pronamic_WP_Pay_Gateways_Qantani_Config $config
	 */
	public function __construct( Pronamic_WP_Pay_Gateways_Qantani_Config $config ) {
		parent::__construct( $config );

		$this->set_method( Pronamic_WP_Pay_Gateway::METHOD_HTTP_REDIRECT );
		$this->set_has_feedback( false );
		$this->set_amount_minimum( 1.20 );
		$this->set_slug( self::SLUG );

		$this->client = new Pronamic_WP_Pay_Gateways_Qantani_Client();
		$this->client->set_merchant_id( $config->merchant_id );
		$this->client->set_merchant_key( $config->merchant_key );
		$this->client->set_merchant_secret( $config->merchant_secret );
	}

	/////////////////////////////////////////////////

	/**
	 * Get issuers
	 *
	 * @see Pronamic_WP_Pay_Gateway::get_issuers()
	 */
	public function get_issuers() {
		$groups = array();

		$result = $this->client->get_banks();

		if ( $result ) {
			$groups[] = array(
				'options' => $result,
			);
		} else {
			$this->error = $this->client->get_error();
		}

		return $groups;
	}

	/////////////////////////////////////////////////

	public function get_issuer_field() {
		$payment_method = $this->get_payment_method();

		if ( null === $payment_method || Pronamic_WP_Pay_PaymentMethods::IDEAL === $payment_method ) {
			return array(
				'id'       => 'pronamic_ideal_issuer_id',
				'name'     => 'pronamic_ideal_issuer_id',
				'label'    => __( 'Choose your bank', 'pronamic_ideal' ),
				'required' => true,
				'type'     => 'select',
				'choices'  => $this->get_transient_issuers(),
			);
		}
	}

	/////////////////////////////////////////////////

	/**
	 * Get payment methods
	 *
	 * @return mixed an array or null
	 */
	public function get_payment_methods() {
		return Pronamic_WP_Pay_PaymentMethods::IDEAL;
	}

	/////////////////////////////////////////////////

	/**
	 * Get supported payment methods
	 *
	 * @see Pronamic_WP_Pay_Gateway::get_supported_payment_methods()
	 */
	public function get_supported_payment_methods() {
		return array(
			Pronamic_WP_Pay_PaymentMethods::IDEAL,
		);
	}

	/////////////////////////////////////////////////

	/**
	 * Start
	 *
	 * @see Pronamic_WP_Pay_Gateway::start()
	 */
	public function start( Pronamic_Pay_Payment $payment ) {
		$result = $this->client->create_transaction(
			$payment->get_amount(),
			$payment->get_currency(),
			$payment->get_issuer(),
			$payment->get_description(),
			$payment->get_return_url()
		);

		if ( false !== $result ) {
			$payment->set_transaction_id( $result->transaction_id );
			$payment->set_action_url( $result->bank_url );
		} else {
			$this->error = $this->client->get_error();
		}
	}

	/////////////////////////////////////////////////

	/**
	 * Update status of the specified payment
	 *
	 * @param Pronamic_Pay_Payment $payment
	 */
	public function update_status( Pronamic_Pay_Payment $payment ) {
		$transaction_id = filter_input( INPUT_GET, 'id', FILTER_SANITIZE_STRING );
		$status         = filter_input( INPUT_GET, 'status', FILTER_SANITIZE_STRING );
		$salt           = filter_input( INPUT_GET, 'salt', FILTER_SANITIZE_STRING );
		$checksum       = filter_input( INPUT_GET, 'checksum', FILTER_SANITIZE_STRING );

		$payment->set_status( Pronamic_WP_Pay_Gateways_Qantani_PaymentStatuses::transform( $status ) );
	}
}
