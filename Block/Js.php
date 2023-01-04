<?php
namespace Extend\CustomCartCss\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Extend\CustomCartCss\Helper\Api\Data as DataHelper;

class Js extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        DataHelper                                        $dataHelper
 )
    {
        parent::__construct($context);
        $this->_scopeConfig = $scopeConfig;
        $this->dataHelper = $dataHelper;
    }
}
