<?php

/**
 * Title: Qantani payment statuses constants tests
 * Description:
 * Copyright: Copyright (c) 2005 - 2015
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_PaymentStatusesTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $ogoneStatus, $expected ) {
		$status = Pronamic_WP_Pay_Gateways_Qantani_PaymentStatuses::transform( $ogoneStatus );

		$this->assertEquals( $expected, $status );
	}

	public function status_matrix_provider() {
		return array(
			array( Pronamic_WP_Pay_Gateways_Qantani_PaymentStatuses::CANCELLED, Pronamic_WP_Pay_Statuses::CANCELLED ),
			array( Pronamic_WP_Pay_Gateways_Qantani_PaymentStatuses::PAID, Pronamic_WP_Pay_Statuses::SUCCESS ),
			array( 'not existing status', null ),
		);
    }
}