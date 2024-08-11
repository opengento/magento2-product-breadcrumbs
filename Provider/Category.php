<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Provider;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Category\Collection;
use Magento\Catalog\Model\ResourceModel\Helper;
use Magento\Catalog\Model\ResourceModel\Product as ProductResource;
use Opengento\ProductBreadcrumbs\Model\Config\Breadcrumbs as BreadcrumbsConfig;

use function sprintf;

class Category
{
    public function __construct(
        private ProductResource $productResource,
        private BreadcrumbsConfig $breadcrumbsConfig,
        private Helper $helper
    ) {}

    public function createCollection(Product $product): Collection
    {
        $collection = $this->productResource->getCategoryCollection($product);
        $collection->setStoreId($product->getStoreId());
        $collection->setProductStoreId($product->getStoreId());
        $collection->setLoadProductCount(false);
        $collection->addFieldToSelect(CategoryInterface::KEY_PATH);
        $collection->addIsActiveFilter();

        $excludedCategoryIds = $this->breadcrumbsConfig->getExcludedCategories($product->getStoreId());
        if ($excludedCategoryIds) {
            foreach ($excludedCategoryIds as $categoryId) {
                $collection->addFieldToFilter(
                    CategoryInterface::KEY_PATH,
                    ['nlike' => $this->helper->escapeLikeValue(sprintf('/%s/', $categoryId), ['position' => 'any'])]
                );
            }
            $collection->addFieldToFilter($collection->getIdFieldName(), ['nin' => $excludedCategoryIds]);
        }

        return $collection;
    }
}
