<?php

namespace Magestio\Core\Ui\DataProvider\Product;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider as DataProvider;
use Magento\Framework\Api\Filter;

/**
 * Class ProductDataProvider
 * @package Magestio\Core\Ui\DataProvider\Product
 */
class ProductDataProvider extends DataProvider
{
    public function addFilter(Filter $filter)
    {
        if ($filter->getField() == 'category_id') {
            $this->getCollection()->addCategoriesFilter(['in' => $filter->getValue()]);
        } elseif (isset($this->addFilterStrategies[$filter->getField()])) {
            $this->addFilterStrategies[$filter->getField()]
                ->addFilter(
                    $this->getCollection(),
                    $filter->getField(),
                    [$filter->getConditionType() => $filter->getValue()]
                );
        } else {
            parent::addFilter($filter);
        }
    }
}
