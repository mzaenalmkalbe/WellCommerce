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

namespace WellCommerce\Bundle\LocaleBundle\Entity;

use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use WellCommerce\Bundle\CoreBundle\Behaviours\Enableable\EnableableTrait;
use WellCommerce\Bundle\CoreBundle\Entity\IdentifiableTrait;
use WellCommerce\Bundle\CurrencyBundle\Entity\CurrencyAwareTrait;

/**
 * Class Locale
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Locale implements LocaleInterface
{
    use IdentifiableTrait;
    use Timestampable;
    use Blameable;
    use CurrencyAwareTrait;
    use EnableableTrait;
    
    protected $code = '';
    
    public function getCode(): string
    {
        return $this->code;
    }
    
    public function setCode(string $code)
    {
        $this->code = $code;
    }
}
