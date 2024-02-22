<?php

namespace Magestio\Core\Ui\DataProvider\Product;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider as DataProvider;
use Magento\Framework\Api\Filter;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;

class ProductDataProvider extends DataProvider
{

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->collection->addOrder('entity_id', 'DESC');
        }

        return parent::getData();
    }

    public function addFilter(Filter $filter)
    {
        if ($filter->getField() == 'category_id') {
            $this->getCollection()->addCategoriesFilter(array('in' => $filter->getValue()));
        } elseif ($filter->getField() == 'sku_multiple') {

            // Remove % at the begin and end
            $value = $filter->getValue();
            $value = substr($value, 1, strlen($value) - 2);

            //
            $skus = explode(',', $value);
            $skus = array_map('trim', $skus);

            $filters = [];
            foreach ($skus as $sku) {
                $filters[] = ['attribute' => 'sku', 'like' => "%$sku%"];
            }

            $this->getCollection()->addFieldToFilter($filters);


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
