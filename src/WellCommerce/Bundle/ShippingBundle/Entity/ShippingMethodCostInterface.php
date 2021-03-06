<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ShippingBundle\Entity;

use WellCommerce\Bundle\AppBundle\Entity\Price;
use WellCommerce\Bundle\CoreBundle\Entity\EntityInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TimestampableInterface;

/**
 * Interface ShippingMethodCostInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ShippingMethodCostInterface extends EntityInterface, TimestampableInterface, ShippingMethodAwareInterface
{
    public function getRangeFrom() : float;
    
    public function setRangeFrom(float $rangeFrom);
    
    public function getRangeTo() : float;
    
    public function setRangeTo(float $rangeTo);
    
    public function getCost() : Price;

    public function setCost(Price $cost);
}
