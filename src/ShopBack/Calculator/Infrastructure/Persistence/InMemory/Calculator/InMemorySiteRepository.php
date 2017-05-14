<?php

namespace ShopBack\Calculator\Infrastructure\Persistence\InMemory\Calculator;

use ShopBack\Calculator\Domain\Model\Site;
use ShopBack\Calculator\Domain\Model\SiteId;
use ShopBack\Calculator\Domain\Model\SiteRepository;

/**
* InMemorySiteRepository
*
* @category  Repository
* @package   ShopBack\Calculator\Infrastructure\Persistence\InMemory\Calculator
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class InMemorySiteRepository implements SiteRepository
{
	private $sites;

	/**
	 * @param string $site A Site
	 * @return void
	 */
	public function add($site)
	{
		if (! $site instanceof Site) {
			throw new \InvalidArgumentException('Argument should be instance of Site');
		}

		$this->sites[$site->getSiteId()->getId()] = $site;
	}

	/**
	 * @param  string $domain A domain
	 * @return \Site object
	 */
	public function findByDomain($domain)
	{
		$result = array_values(array_filter($this->sites, function($site) use ($domain) {
			return $site->getDomain() == $domain;
		}));
		return isset($result[0]) ? $result[0] : null;
	}

	/**
	 * @return \SiteId
	 */
	public function nextId()
	{
		return new SiteId();
	}
}