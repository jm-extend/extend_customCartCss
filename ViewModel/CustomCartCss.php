<?php
/**
 * Extend Warranty
 *
 * @author      Extend Magento Team <magento@extend.com>
 * @category    Extend
 * @package     Warranty
 * @copyright   Copyright (c) 2022 Extend Inc. (https://www.extend.com/)
 */

declare(strict_types=1);

namespace Extend\CustomCartCss\ViewModel;

use Extend\CustomCartCss\Helper\Api\Data as DataHelper;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use phpDocumentor\Reflection\PseudoTypes\False_;


/**
 * Class Warranty
 */
class CustomCartCss implements ArgumentInterface
{
    /**
     * Data Helper
     *
     * @var DataHelper
     */
    private DataHelper $dataHelper;

    private DataHelper $request;

    /**
     * custom Cart css constructor
     *
     * @param DataHelper $dataHelper
     */
    public function __construct(
        DataHelper                                        $dataHelper,
        \Magento\Framework\App\Request\Http               $request

    )
    {
        $this->dataHelper = $dataHelper;
        $this->_request = $request;
    }

    /**
     * Check if extend  enabled
     *
     * @return bool
     */
    public function isExtendEnabled(): bool
    {
        return $this->dataHelper->isExtendEnabled();
    }

    /**
     * Check if custom cart css enabled
     *
     * @return bool
     */
    public function isCustomCartCssEnabled(): bool
    {
        return $this->dataHelper->isCustomCartCssEnabled();
    }

    /**
     * Retrieve custom css for cart offer
     *
     * @return string
     */
    public function getCustomCartCssValue(): string
    {
        return $this->dataHelper->getCustomCartCssValue();
    }

}
