<?php

namespace Magestio\Core\Block\Adminhtml;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magestio\Core\Model\ConfigInterface;

class SalesJs extends \Magento\Backend\Block\Template
{

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
     * @param \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }
    
    public function getStatusColorEnabled()
    {
        
        return (bool)$this->_scopeConfig->getValue(ConfigInterface::XML_PATH_CORE_COLOR_ENABLED);
    }
}