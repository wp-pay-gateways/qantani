<?php

class Pronamic_WP_Pay_Gateways_Qantani_Integration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function __construct() {
		$this->id            = 'qantani';
		$this->name          = __( 'Qantani (old platform)', 'pronamic_ideal' );
		$this->url           = 'https://www.qantani.com/';
		$this->dashboard_url = 'https://www.qantanipayments.com/backoffice/login/';
		$this->provider      = 'qantani';
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_ConfigFactory';
	}

	public function get_config_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_Config';
	}

	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_Settings';
	}

	public function get_gateway_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_Gateway';
	}
}
