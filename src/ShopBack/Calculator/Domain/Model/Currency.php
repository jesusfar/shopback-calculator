<?php

namespace ShopBack\Calculator\Domain\Model;

/**
* Currency
*
* @category  ObjectValue
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class Currency
{
	const SGD = 'SGD';
	const MYR = 'MYR';
	const IDR = 'IDR';
	const TWD = 'TWD';
	const THB = 'THB';
	const USD = 'USD';

	const ISO_CODES = [
		self::SGD,
		self::MYR,
		self::IDR,
		self::TWD,
		self::THB,
		self::USD
	];

	/**
	 * @var string
	 */
	private $isoCode;

	/**
	 * @param  string $isoCode
	 * @return void
	 */
	public function __construct($isoCode)
	{
		$this->setIsoCode($isoCode);
	}

    /**
     * Gets the value of isoCode.
     *
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * Sets the value of isoCode.
     *
     * @param mixed $isoCode the iso code
     *
     * @return self
     */
    private function setIsoCode($isoCode)
    {
    	if (! in_array($isoCode, self::ISO_CODES)) {
    		throw new \InvalidArgumentException();
    	}

        $this->isoCode = $isoCode;
    }
}