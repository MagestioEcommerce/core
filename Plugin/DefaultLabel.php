<?php
namespace Magestio\Core\Plugin;

class DefaultLabel
{       
    public function afterGetGalleryImages($block, $images)
    {
        if ($images instanceof \Magento\Framework\Data\Collection) {
            $product = $block->getProduct();
            foreach ($images as $image) {
                //check if label is set
                if(!$image->getLabel()){
                    $image->setLabel($product->getName());
                }
            }            
        }
        return $images;
    }
}