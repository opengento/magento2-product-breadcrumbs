<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Service\Breadcrumbs;

use Magento\Catalog\Model\Product;

/**
 * @api
 */
interface CreateProductBreadcrumbsInterface
{
    public function execute(Product $product): array;
}
