<?php

namespace ShopBack\Calculator\Application\Service;

use PHPUnit\Framework\TestCase;
use ShopBack\Calculator\Application\Service\RedeemDomainService;
use ShopBack\Calculator\Domain\Model\Award;
use ShopBack\Calculator\Domain\Model\Currency;
use ShopBack\Calculator\Domain\Model\Site;
use ShopBack\Calculator\Infrastructure\Persistence\InMemory\Calculator\InMemorySiteRepository;

/**
* RedeemDomainServiceTest
*
* @category  UnitTest
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class RedeemDomainServiceTest extends TestCase
{
	private $redeemDomainService;
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

		$this->redeemDomainService = new RedeemDomainService($siteRepository);
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 *
	 * @return void
	 */
	public function executeShouldThrowInvalidArgumentException()
	{
		$this->redeemDomainService->execute();
	}

	/**
	 * @test
	 * @return void
	 */
	public function executeShouldReturnAwardCorresponding()
	{
		$response = $this->redeemDomainService->execute($this->siteTest->getDomain());
		$this->assertNotNull($response);
		$this->assertEquals('Visit https://www.shopback.sg to start earning cashback!', $response);
	}
}