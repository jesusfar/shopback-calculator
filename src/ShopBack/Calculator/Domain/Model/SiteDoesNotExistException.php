<?php

namespace ShopBack\Calculator\Domain\Model;
/**
* SiteDoesNotExistException
*
* @category  Exception
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class SiteDoesNotExistException extends \Exception
{
	public function __construct($message = null)
	{
		parent::__construct($message);
	}
}