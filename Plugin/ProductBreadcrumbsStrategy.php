<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Plugin;

use Magento\Catalog\Helper\Data;
use Magento\Catalog\Model\Product;
use Opengento\ProductBreadcrumbs\Model\Config\Breadcrumbs as BreadcrumbsConfig;
use Opengento\ProductBreadcrumbs\Service\Breadcrumbs\CreateProductBreadcrumbsInterface;

class ProductBreadcrumbsStrategy
{
    private ?array $breadcrumbs = null;

    /**
     * @param CreateProductBreadcrumbsInterface[] $strategies
     */
    public function __construct(
        private BreadcrumbsConfig $breadcrumbsConfig,
        private array $strategies = []
    ) {}

    public function afterGetBreadcrumbPath(Data $subject, array $result): array
    {
        $product = $subject->getProduct();

        return $product !== null && $this->breadcrumbsConfig->isServerSideRendered($product->getStoreId())
            ? $this->breadcrumbs ??= $this->createProductBreadCrumbs($product, $result)
            : $result;
    }

    private function createProductBreadCrumbs(Product $product, array $defaultBreadcrumbs): array
    {
        return $this->strategies[$this->breadcrumbsConfig->getStrategy($product->getStoreId())->value]?->execute($product) ?? $defaultBreadcrumbs;
    }
}
