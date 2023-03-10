<?php
/**
 * Extend Warranty
 *
 * @author      Extend Magento Team <magento@guidance.com>
 * @category    Extend
 * @package     Warranty
 * @copyright   Copyright (c) 2021 Extend Inc. (https://www.extend.com/)
 */

declare(strict_types=1);

namespace Extend\CustomCartCss\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Module\ModuleListInterface;
use Magento\Config\Model\ResourceModel\Config as ConfigResource;
use Magento\Framework\App\Cache\Manager as CacheManager;
use Magento\Framework\App\Cache\Type\Config;
use Extend\Warranty\Model\Config\Source\AuthMode;

/**
 * Class Data
 */
class Data extends AbstractHelper
{
    /**
     * General settings
     */
    const WARRANTY_ENABLE_EXTEND_ENABLE_XML_PATH = 'warranty/enableExtend/enable';
    const WARRANTY_CUSTOM_CART_CSS_XML_PATH = 'warranty/customizations/custom_cart_css_enabled';
    const WARRANTY_CUSTOM_CART_CSS_VALUE_XML_PATH = 'warranty/customizations/custom_cart_css_value';

    /**
     * Module List Interface
     *
     * @var ModuleListInterface
     */
    private $moduleList;

    /**
     * Config Resource
     *
     * @var ConfigResource
     */
    private $configResource;

    /**
     * Cache Manager
     *
     * @var CacheManager
     */
    private $cacheManager;

    /**
     * Data constructor
     *
     * @param Context $context
     * @param ModuleListInterface $moduleList
     * @param ConfigResource $configResource
     * @param CacheManager $cacheManager
     */
    public function __construct(
        Context $context,
        ModuleListInterface $moduleList,
        ConfigResource $configResource,
        CacheManager $cacheManager
    ) {
        $this->moduleList = $moduleList;
        $this->configResource = $configResource;
        $this->cacheManager = $cacheManager;
        parent::__construct($context);
    }

    /**
     * Check if enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isExtendEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
               $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_ENABLE_EXTEND_ENABLE_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

    /**
     * Check if Custom cart css  is enabled
     *
     * @param string $scopeType
     * @param string|int|null $scopeId
     * @return bool
     */
    public function isCustomCartCssEnabled(
        string $scopeType = ScopeInterface::SCOPE_STORES,
        $scopeId = null
    ): bool {
        return $this->scopeConfig->isSetFlag(
            self::WARRANTY_CUSTOM_CART_CSS_XML_PATH,
            $scopeType,
            $scopeId
        );
    }

    /**
     * Get value  for Custom cart css
     *
     * @param string $scopeType
     * @param $storeId
     * @return string
     */
    public function getCustomCartCssValue(
        string $scopeType = ScopeInterface::SCOPE_STORES,
        $storeId = null): string
    {

        if($this->isExtendEnabled() && !empty($this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_CART_CSS_VALUE_XML_PATH,
                $scopeType,
                $storeId))){
            $customCartCssValue =   $this->scopeConfig->getValue(
                self::WARRANTY_CUSTOM_CART_CSS_VALUE_XML_PATH,
                $scopeType,
                $storeId);
        }else{
            $customCartCssValue = '';
        }
        return $customCartCssValue;
    }

}
