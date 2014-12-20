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

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

/**
 * Class TechnicalDataEditor
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class TechnicalDataEditor extends AbstractField implements ElementInterface
{

    public function __construct($attributes)
    {
        parent::__construct($attributes);
        $this->attributes['attribute_groups']    = $this->getAttributeGroups();
        $this->attributes['technicalattributes'] = $this->getTechnicalAttributes();
        $this->registerXajaxMethod('fGetTechnicalAttributesForSet', Array(
            $this,
            'getTechnicalAttributesForSet'
        ));
        $this->registerXajaxMethod('fGetSets', Array(
            $this,
            'getSets'
        ));
        $this->registerXajaxMethod('fSaveSet', Array(
            $this,
            'saveSet'
        ));
        $this->registerXajaxMethod('fDeleteSet', Array(
            $this,
            'deleteSet'
        ));
        $this->registerXajaxMethod('fSaveAttributeGroup', Array(
            $this,
            'saveAttributeGroup'
        ));
        $this->registerXajaxMethod('fDeleteAttributeGroup', Array(
            $this,
            'deleteAttributeGroup'
        ));
        $this->registerXajaxMethod('fSaveAttribute', Array(
            $this,
            'saveAttribute'
        ));
        $this->registerXajaxMethod('fDeleteAttribute', Array(
            $this,
            'deleteAttribute'
        ));
        $this->registerXajaxMethod('fgetValuesForAttribute', Array(
            $this,
            'getValuesForAttribute'
        ));
    }

    public function prepareAttributesJs()
    {
        $attributes = [
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatAttributeJs('set_id', 'sSetId'),
            $this->formatAttributeJs('product_id', 'sProductId'),
            $this->formatAttributeJs('attribute_groups', 'aAttributeGroups', ElementInterface::TYPE_OBJECT),
            $this->formatAttributeJs('technicalattributes', 'aTechnicalAttributes', ElementInterface::TYPE_OBJECT),
            $this->formatRepeatableJs(),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
        ];

        return $attributes;
    }

    public function saveAttributeGroup($request)
    {
        if (substr($request['attributeGroupId'], 0, 3) == 'new') {
            $request['attributeGroupId'] = 'new';
        }

        return [
            'attributeGroupId' => App::GetModel('TechnicalData')->saveGroup($request['attributeGroupId'], $request['attributeGroupName'])
        ];
    }

    public function deleteAttributeGroup($request)
    {
        App::GetModel('TechnicalData')->DeleteGroup($request['attributeGroupId']);

        return [
            'attributeGroupId' => $request['attributeGroupId']
        ];
    }

    public function saveAttribute($request)
    {
        if (substr($request['attributeId'], 0, 3) == 'new') {
            $request['attributeId'] = 'new';
        }

        return [
            'attributeId' => App::GetModel('TechnicalData')->saveAttribute($request['attributeId'], $request['attributeName'], $request['attributeType'])
        ];
    }

    public function deleteAttribute($request)
    {
        App::GetModel('TechnicalData')->deleteAttribute($request['attributeId']);

        return [
            'attributeId' => $request['attributeId']
        ];
    }

    public function saveSet($request)
    {
        $setId = App::GetModel('TechnicalData')->saveSet($request['setId'], $request['setName'], $request['setData']);

        return [
            'setId' => $setId
        ];
    }

    public function deleteSet($request)
    {
        App::GetModel('TechnicalData')->deleteSet($request['setId']);

        return [
            'setId' => $request['setId']
        ];
    }

    public function getSets($request)
    {
        return [
            'aoSets' => App::GetModel('TechnicalData')->getSets($request['productId'], $request['categoryIds'])
        ];
    }

    public function getAttributeGroups()
    {
        return App::getModel('TechnicalData')->GetGroups();
    }

    public function getTechnicalAttributes()
    {
        return App::getModel('TechnicalData')->getAttributes();
    }

    public function getValuesForAttribute($request)
    {

    }

    public function getTechnicalAttributesForSet($request)
    {
        return [
            'setId'        => $request['setId'],
            'aoAttributes' => App::getModel('TechnicalData')->GetSetData($request['setId'])
        ];
    }

}
