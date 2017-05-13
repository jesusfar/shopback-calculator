<?php

namespace ShopBack\Calculator\Domain\Model;
/**
* SiteDomain
*
* @category  Entity
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class SiteDomain
{
	private $award;
	private $domain;
	private $website;

	/**
	 * @param  string $domain
	 * @param  string $website
	 * @param  \Award $award
	 * @return void
	 */
	public function __construct($domain, $website, $award)
	{
		$this->award = $this->setAward();
		$this->domain = $domain;
		$this->website = $website;
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
        if (! $currency instanceof Award) {
			throw new \InvalidArgumentException();
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
}