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

namespace WellCommerce\Bundle\NewsBundle\Entity;

use Carbon\Carbon;
use DateTime;
use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use WellCommerce\Bundle\CoreBundle\Entity\IdentifiableTrait;
use WellCommerce\Bundle\MediaBundle\Entity\MediaAwareTrait;

/**
 * Class News
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class News implements NewsInterface
{
    use IdentifiableTrait;
    use Translatable;
    use Timestampable;
    use Blameable;
    use MediaAwareTrait;
    
    protected $publish  = true;
    protected $featured = false;
    protected $startDate;
    protected $endDate;
    
    public function __construct()
    {
        $this->startDate = Carbon::now();
        $this->endDate   = Carbon::now()->addMonth(1);
    }
    
    public function getPublish(): bool
    {
        return $this->publish;
    }
    
    public function setPublish(bool $publish)
    {
        $this->publish = $publish;
    }
    
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }
    
    public function setStartDate(DateTime $startDate)
    {
        $this->startDate = $startDate;
    }
    
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }
    
    public function setEndDate(DateTime $endDate)
    {
        $this->endDate = $endDate;
    }
    
    public function getFeatured(): bool
    {
        return $this->featured;
    }
    
    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }
}
