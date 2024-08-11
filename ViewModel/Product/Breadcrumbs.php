<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\ViewModel\Product;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Opengento\ProductBreadcrumbs\Model\Config\Breadcrumbs as BreadcrumbsConfig;

class Breadcrumbs implements ArgumentInterface
{
    public function __construct(private BreadcrumbsConfig $breadcrumbsConfig) {}

    public function isServerSideRendered(): bool
    {
        return $this->breadcrumbsConfig->isServerSideRendered();
    }

    public function isClientSideOverrideAllowed(): bool
    {
        return $this->breadcrumbsConfig->isClientSideOverrideAllowed();
    }
}
