<?php

namespace ShopBack\Calculator\Application\Service;

use PHPUnit\Framework\TestCase;
use ShopBack\Calculator\Application\Service\SignUpDomainService;
use ShopBack\Calculator\Domain\Model\Award;
use ShopBack\Calculator\Domain\Model\Currency;
use ShopBack\Calculator\Domain\Model\Site;
use ShopBack\Calculator\Infrastructure\Persistence\InMemory\Calculator\InMemorySiteRepository;

/**
* SignUpDomainServiceTest
*
* @category  UnitTest
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class SignUpDomainServiceTest extends TestCase
{
	private $signupDomainService;
	private $siteTest;

	public function setup()
	{
		$siteRepository = new InMemorySiteRepository();
		$this->siteTest = new Site(
			$siteRepository->nextId(),
			'www.shopback.sg',
			'https://www.shopback.sg',
			new Award(5, new Currency('SGD'))
		);
		$siteRepository->add($this->siteTest);

		$this->signupDomainService = new SignUpDomainService($siteRepository);
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 *
	 * @return void
	 */
	public function executeShouldThrowInvalidArgumentException()
	{
		$this->signupDomainService->execute();
	}

	/**
	 * @test
	 * @return void
	 */
	public function executeShouldReturnAwardCorresponding()
	{
		$response = $this->signupDomainService->execute($this->siteTest->getDomain());
		$this->assertNotNull($response);
		$this->assertEquals('Award bonus 5.00 SGD', $response);
	}
}