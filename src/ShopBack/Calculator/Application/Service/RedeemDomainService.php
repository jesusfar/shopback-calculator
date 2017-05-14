<?php

namespace ShopBack\Calculator\Application\Service;

use ShopBack\Calculator\Domain\Model\SiteDoesNotExistException;

/**
* RedeemDomainService
*
* @category  ApplicationService
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class RedeemDomainService
{
	private $siteRepository;

	/**
	 * @return void
	 */
	public function __construct($siteRepository)
	{
		$this->siteRepository = $siteRepository;
	}

	/**
	 * @param  string $domain Domain
	 * @return string
	 */
	public function execute($domain = '')
	{
		if (empty($domain)) {
			throw new  \InvalidArgumentException('Domain parameter must be string.');
		}

		$site = $this->siteRepository->findByDomain($domain);

		if ($site == null) {
			throw new SiteDoesNotExistException('Site with domain ' . $domain . ' does not exist.');
		}

		return sprintf(
			'%s %s to start earning cashback!',
			'Visit',
			$site->getWebsite()
		);
	}
}