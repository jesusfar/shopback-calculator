<?php

namespace ShopBack\Calculator\Application\Service;

use PHPUnit\Framework\TestCase;
use ShopBack\Calculator\Application\Service\SpendCalculatorService;

/**
* SpendCalculatorServiceTest
*
* @category  UnitTest
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class SpendCalculatorServiceTest extends TestCase
{
	private $spendCalculatorService;

	public function setup()
	{
		$config = [
			'threshold_awards' => [
				'50' => '20',
				'20' => '15',
				'10' => '10',
				'0'  => '5'
			]
		];

		$this->spendCalculatorService = new SpendCalculatorService($config['threshold_awards']);
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 *
	 * @return void
	 */
	public function executeShouldThrowInvalidArgumentException()
	{
		$arguments = [10, 'a'];
		$this->spendCalculatorService->execute($arguments);
	}

	/**
	 * @test
	 * @dataProvider executeDataProvider
	 * @return void
	 */
	public function executeShouldReturnAwardCorresponding($arguments, $expected)
	{
		$response = $this->spendCalculatorService->execute($arguments);
		$this->assertNotNull($response);
		$this->assertEquals($expected, $response);
	}

	public function executeDataProvider()
	{
		$testCase1 = [
			[0],
			'No cashback'
		];

		$testCase2 = [
			[20],
			'Award cashback: 3.00'
		];

		$testCase3 = [
			[100, 5],
			'Award cashback: 5.00'
		];

		$testCase4 = [
			[10, 10, 10],
			'Award cashback: 1.00'
		];

		$testCase5 = [
			[20, 10, 15],
			'Award cashback: 2.00'
		];

		return [
			$testCase1, $testCase2, $testCase3, $testCase4, $testCase5
		];
	}
}