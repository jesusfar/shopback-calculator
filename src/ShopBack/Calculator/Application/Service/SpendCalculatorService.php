<?php

namespace ShopBack\Calculator\Application\Service;

use ShopBack\Calculator\Domain\Model\SiteDoesNotExistException;

/**
* SpendCalculatorService
*
* @category  ApplicationService
* @package   ShopBack\Calculator\Application\Service
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class SpendCalculatorService
{
	private $thresholdAwards;
	private $arguments;

	/**
	 * @param array $thresholdAwards
	 */
	public function __construct($thresholdAwards)
	{
		$this->thresholdAwards = $thresholdAwards;
	}

	/**
	 * @param  string $domain Domain
	 * @return string
	 */
	public function execute($arguments = [])
	{
		$this->validateAndSetArguments($arguments);

		if ($award = $this->calculateAward()) {
			return sprintf('Award cashback: %.2f', $award);
		}

		return sprintf('No cashback');
	}

	/**
	 * calculate Award
	 * @return
	 */
	private function calculateAward()
	{
		$highest = $this->getHighestValueOf();
		$n = count($this->arguments);
		$totalAmount = $this->getTotalAmountOf();

		foreach ($this->thresholdAwards as $threshold => $award) {
			if ($totalAmount >= ($threshold * $n)) {
				return ($highest * $award)/100;
			}
		}
	}

	private function validateAndSetArguments($arguments)
	{
		foreach ($arguments as $value) {
			if (! is_numeric($value)) {
				throw new \InvalidArgumentException('<Arguments> must be numbers.');
			}
		}

		$this->arguments = $arguments;
	}

	private function getHighestValueOf()
	{
		$highest = 0;
		$keyHighest = null;

		foreach ($this->arguments as $key => $value) {
			if ($value > $highest) {
				$highest = $value;
				$keyHighest = $key;
			}
		}

		if (count($this->arguments) > 1) {
			unset($this->arguments[$keyHighest]);
		}

		return $highest;
	}

	private function getTotalAmountOf()
	{
		$sum = 0;
		foreach ($this->arguments as $value) {
			$sum += $value;
		}

		return $sum;
	}
}