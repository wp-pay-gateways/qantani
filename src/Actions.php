<?php

/**
 * Title: Qantani actions
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_Actions {
	/**
	 * Credit Card direct
	 *
	 * @var string
	 */
	const CREDIT_CARD_DIRECT = 'CC.DIRECT';

	/**
	 * Credit Card direct internal
	 *
	 * @var string
	 */
	const CREDIT_CARD_DIRECT_INTERNAL = 'CC.DIRECT.INTERNAL';

	/**
	 * Credit Card execute
	 *
	 * @var string
	 */
	const CREDIT_CARD_EXECUTE = 'CC.EXECUTE';

	/**
	 * Register callback
	 *
	 * @var string
	 */
	const REGISTER_CALLBACK = 'REGISTER_CALLBACK';

	/**
	 * Cancel callback
	 *
	 * @var string
	 */
	const CANCEL_CALLBACK = 'CANCEL_CALLBACK';

	/**
	 * Action iDEAL execute
	 *
	 * @var string
	 */
	const IDEAL_EXECUTE = 'IDEAL.EXECUTE';

	/**
	 * Action iDEAL get banks
	 *
	 * @var string
	 */
	const IDEAL_GET_BANKS = 'IDEAL.GETBANKS';

	/**
	 * Get payment methods
	 *
	 * @var string
	 */
	const GET_PAYMENT_METHODS = 'GETPAYMENTMETHODS';

	/**
	 * PayPal execute
	 *
	 * @var string
	 */
	const PAYPAL_EXECUTE = 'PAYPAL.EXECUTE';

	/**
	 * Sofort execute
	 *
	 * @var string
	 */
	const SOFORT_EXECUTE = 'SOFORT.EXECUTE';
}
