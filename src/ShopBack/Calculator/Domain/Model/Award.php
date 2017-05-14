<?php

namespace ShopBack\Calculator\Domain\Model;
/**
* Award
*
* @category  ObjectValue
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class Award
{
	/**
	 * @var float
	 */
	private $amount;
	/**
	 * @var \Currency
	 */
	private $currency;

	/**
	 * @param float $amount
	 * @param \Currency $currency
	 */
	public function __construct($amount, $currency)
	{
		$this->amount = $amount;
		$this->setCurrency($currency);
	}

	/**
	 * @param \Currency $currency
	 */
	private function setCurrency($currency)
	{
		if (! $currency instanceof Currency) {
			throw new \InvalidArgumentException('Argument should be instance of Currency');
		}

		$this->currency = $currency;
	}

    /**
     * Gets the value of amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Gets the value of currency.
     *
     * @return \Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}