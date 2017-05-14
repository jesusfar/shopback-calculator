<?php

namespace ShopBack\Calculator\Domain\Model;

/**
* SiteId
*
* @category  ObjectValue
* @package   ShopBack\Calculator\Domain\Model
* @author    Jesus Farfan <jesus.farfan@nidarbox.com>
* @copyright Jesus Farfan
* @license   Propietary
* @link      https://nidarbox.com
*/
class SiteId
{
	private $id;

	/**
	 * @return void
	 */
	public function __construct($id = null)
	{
		$this->id = is_null($id) ? $this->generateId() : $id;
	}

	private function generateId()
	{
		return uniqid('site.id.', TRUE);
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
    	return $this->id;
    }
}