<?php

namespace ShopBack\Calculator\Domain\Model;

/**
* SiteRepository
*
* @category  Interface
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
interface SiteRepository
{
	/**
	 * @return \SiteId
	 */
	public function nextId();
	/**
	 * @param string $site A Site
	 * @return void
	 */
	public function add($site);

	/**
	 * @param  string $domain A domain
	 * @return \Site object
	 */
	public function findByDomain($domain);
}