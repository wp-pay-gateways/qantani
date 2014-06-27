<?php

/**
 * Title: Qantani error test
 * Description:
 * Copyright: Copyright (c) 2005 - 2014
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0.0
 */
class Pronamic_WP_Pay_Gateways_Qantani_ErrorTest extends PHPUnit_Framework_TestCase {
	public function testToStringError() {
		$error = new Pronamic_WP_Pay_Gateways_Qantani_Error( '1', 'Error' );

		$string = (string) $error;

		$expected = '1 Error';

		$this->assertEquals( $expected, $string );
	}
}
