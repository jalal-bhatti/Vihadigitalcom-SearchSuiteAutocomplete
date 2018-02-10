<?php
/**
 * Copyright © 2016 Vihadigitalcom. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vihadigitalcom\SearchSuiteAutocomplete\Block;

use \Magento\Catalog\Block\Product\Context as ProductContext;

/**
 * Product class
 */
class Product extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * Product constructor.
     *
     * @param ProductContext $context
     * @param array $data
     */
    public function __construct(
        ProductContext $context,
        array $data = []
    ) {

        parent::__construct($context, $data);
    }

    /**
     * Return HTML block with tier price
     *
     * @param \Magento\Catalog\Model\Product $product
     * @param string $priceType
     * @param string $renderZone
     * @param array $arguments
     * @return string
     */
    public function getProductPriceHtml(
        \Magento\Catalog\Model\Product $product,
        $priceType,
        $renderZone = \Magento\Framework\Pricing\Render::ZONE_ITEM_LIST,
        array $arguments = []
    ) {
        if (!isset($arguments['zone'])) {
            $arguments['zone'] = $renderZone;
        }

        /** @var \Magento\Framework\Pricing\Render $priceRender */
        $priceRender = $this->getPriceRender();
        $price = '';

        if ($priceRender) {
            $price = $priceRender->render(
                $priceType,
                $product,
                $arguments
            );
        }
        return $price;
    }

    /**
     * Retrieve price render block
     *
     * @return \Magento\Framework\Pricing\Render
     */
    protected function getPriceRender()
    {
        return $this->_layout->createBlock(
            'Magento\Framework\Pricing\Render',
            '',
            ['data' => ['price_render_handle' => 'catalog_product_prices']]
        );
    }
}