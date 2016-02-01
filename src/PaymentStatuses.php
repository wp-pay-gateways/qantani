<?php

/**
 * Title: Qantani payment statuses
 * Description:
 * Copyright: Copyright (c) 2005 - 2016
 * Company: Pronamic
 *
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_PaymentStatuses {
	/**
	 * Payment status cancelled
	 * @var string
	 */
	const CANCELLED = '0';

	/**
	 * Payment status paid
	 * @var string
	 */
	const PAID = '1';

	/////////////////////////////////////////////////

	/**
	 * Transform an Qantani payment status an more global status
	 *
	 * @param string $status
	 */
	public static function transform( $status ) {
		switch ( $status ) {
			case self::CANCELLED :
				return Pronamic_WP_Pay_Statuses::CANCELLED;
			case self::PAID :
				return Pronamic_WP_Pay_Statuses::SUCCESS;
			default :
				return null;
		}
	}
}
