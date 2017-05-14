<?php

namespace ShopBack\Calculator\Infrastructure\Ui\Console;

use ShopBack\Calculator\Application\Service\RedeemDomainService;
use ShopBack\Calculator\Application\Service\SignUpDomainService;
use ShopBack\Calculator\Application\Service\SpendCalculatorService;
use ShopBack\Calculator\Domain\Model\Award;
use ShopBack\Calculator\Domain\Model\Currency;
use ShopBack\Calculator\Domain\Model\Site;
use ShopBack\Calculator\Infrastructure\Persistence\InMemory\Calculator\InMemorySiteRepository;

/**
* Application
*
* @category  CategoryName
* @package   PackageName
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   MIT
* @link      https://nidarbox.com
*/
class Application
{
	private $container = [];

	public function bootstrap($config = [])
	{
		$siteRepository = new InMemorySiteRepository();

		foreach ($config['sites'] as $key => $site) {
			$siteRepository->add(new Site(
				$siteRepository->nextId(),
				$site['domain'],
				$site['website'],
				new Award($site['award_amount'], new Currency($site['currency']))
			));
		}

		$this->container['site_repository'] = $siteRepository;
		$this->container['signup_domain_service'] = new SignUpDomainService($siteRepository);
		$this->container['redeem_domain_service'] = new RedeemDomainService($siteRepository);
		$this->container['spend_calculator_service'] = new SpendCalculatorService($config['threshold_awards']);
	}

	/**
	 * @param  string $action
	 * @param  array $arguments
	 * @return void
	 */
	public function execute($action, $arguments)
	{
		try {
			switch ($action) {
			case 'signup':
				$response = $this->container['signup_domain_service']->execute($arguments[0]);
				break;
			case 'spend':
				$response = $this->container['spend_calculator_service']->execute($arguments);
				break;
			case 'redeem':
				$response = $this->container['redeem_domain_service']->execute($arguments[0]);
				break;
			default:
				throw new \Exception('Unknow action: ' . $action);
				break;
			}
		} catch (\Exception $e) {
			$response = 'Error: ' . $e->getMessage();
		}

		echo $response . PHP_EOL;
	}

    /**
     * Gets the value of container.
     *
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }
}