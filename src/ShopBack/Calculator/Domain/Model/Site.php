<?php

namespace ShopBack\Calculator\Domain\Model;
/**
* Site
*
* @category  Entity
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class Site
{
	private $siteId;
	private $award;
	private $domain;
	private $website;

	/**
	 * @param  \SiteId $siteId
	 * @param  string  $domain
	 * @param  string  $website
	 * @param  \Award  $award
	 * @return void
	 */
	public function __construct($siteId, $domain, $website, $award)
	{
		$this->siteId($siteId);
		$this->setAward($award);
		$this->domain = $domain;
		$this->website = $website;
	}

	/**
     * Sets the value of siteId.
     *
     * @param mixed $siteId the siteId
     *
     * @return self
     */
    private function siteId($siteId)
    {
        if (! $siteId instanceof SiteId) {
			throw new \InvalidArgumentException('Argument should be instance of SiteId');
		}

        $this->siteId = $siteId;
    }

	/**
     * Sets the value of award.
     *
     * @param mixed $award the award
     *
     * @return self
     */
    private function setAward($award)
    {
        if (! $award instanceof Award) {
			throw new \InvalidArgumentException('Argument should be instance of Award');
		}

        $this->award = $award;
    }

    /**
     * Gets the value of award.
     *
     * @return mixed
     */
    public function getAward()
    {
        return $this->award;
    }

    /**
     * Gets the value of domain.
     *
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Gets the value of website.
     *
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }
}