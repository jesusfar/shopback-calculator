<?php

namespace ShopBack\Calculator\Application\Service;

use ShopBack\Calculator\Domain\Model\SiteDoesNotExistException;

/**
* SignUpDomainService
*
* @category  ApplicationService
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class SignUpDomainService
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
			throw new  \InvalidArgumentException('Domain parameter must be string and not empty');
		}

		$site = $this->siteRepository->findByDomain($domain);

		if ($site == null) {
			throw new SiteDoesNotExistException('Site with domain ' . $domain . ' does not exist.');
		}

		return sprintf(
			'%s %.2f %s',
			'Award bonus',
			$site->getAward()->getAmount(),
			$site->getAward()->getCurrency()->getIsoCode()
		);
	}
}