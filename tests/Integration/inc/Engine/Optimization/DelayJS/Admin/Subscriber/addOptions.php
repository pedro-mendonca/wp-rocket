<?php

namespace WP_Rocket\Tests\Integration\inc\Engine\Optimization\DelayJS\Admin\Subscriber;

use WP_Rocket\Tests\Integration\TestCase;

/**
 * @covers \WP_Rocket\Engine\Optimization\DelayJS\Admin\Subscriber::add_options
 *
 * @group  DelayJS
 */
class Test_AddOptions extends TestCase {
	public function setUp() : void {
		parent::setUp();

		$this->unregisterAllCallbacksExcept( 'rocket_first_install_options', 'add_options' );
	}

	public function tearDown() {
		parent::tearDown();

		$this->restoreWpFilter( 'rocket_first_install_options' );
	}

	/**
	 * @dataProvider configTestData
	 */
	public function testShouldDoExpectedForFirstInstallOptions( $input, $expected ) {
		$options  = isset( $input['options'] )  ? $input['options']  : [];

		$actual = apply_filters( 'rocket_first_install_options', $options );

		$this->assertSame( $expected, $actual );

	}
}
