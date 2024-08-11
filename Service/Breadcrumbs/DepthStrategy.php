<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Service\Breadcrumbs;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\Product;
use Opengento\ProductBreadcrumbs\Provider\Category as CategoryProvider;

class DepthStrategy implements CreateProductBreadcrumbsInterface
{
    public function __construct(
        private CategoryProvider $categoryProvider,
        private string $direction
    ) {}

    public function execute(Product $product): array
    {
        $breadcrumbs = [];
        foreach ($this->findCategoryByDepth($product)->getParentCategories() as $parentCategory) {
            $breadcrumbs['category' . $parentCategory->getId()] = [
                'label' => $parentCategory->getName(),
                'link' => $parentCategory->getUrl(),
            ];
        }
        $breadcrumbs['product'] = ['label' => $product->getName()];

        return $breadcrumbs;
    }

    private function findCategoryByDepth(Product $product): Category
    {
        $collection = $this->categoryProvider->createCollection($product);
        $collection->addOrder(CategoryInterface::KEY_LEVEL, $this->direction);
        $collection->setPageSize(1);
        $collection->setCurPage(1);

        return $collection->getFirstItem();
    }
}
