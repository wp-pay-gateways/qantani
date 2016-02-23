<?php

/**
 * Title: Qantani integration
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.7
 * @since 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_Integration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function __construct() {
		$this->id            = 'qantani';
		$this->name          = __( 'Qantani (old platform)', 'pronamic_ideal' );
		$this->url           = 'https://www.qantani.com/';
		$this->dashboard_url = 'https://www.qantanipayments.com/backoffice/login/';
		$this->provider      = 'qantani';
		$this->deprecated    = false;
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_ConfigFactory';
	}

	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_Qantani_Settings';
	}

	/**
	 * Get required settings for this integration.
	 *
	 * @see https://github.com/wp-premium/gravityforms/blob/1.9.16/includes/fields/class-gf-field-multiselect.php#L21-L42
	 * @since 1.0.2
	 * @return array
	 */
	public function get_settings() {
		$settings = parent::get_settings();

		$settings[] = 'qantani';

		return $settings;
	}
}
