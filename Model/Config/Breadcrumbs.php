<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Opengento\ProductBreadcrumbs\Model\Breadcrumbs\Strategy;

use function array_filter;
use function array_map;
use function explode;
use function preg_replace;

class Breadcrumbs
{
    private const CONFIG_PATH_IS_SERVER_SIDE = 'catalog/seo/render_product_breadcrumbs_server_side';
    private const CONFIG_PATH_IS_CLIENT_SIDE_OVERRIDE_ALLOWED = 'catalog/seo/override_product_breadcrumbs_client_side';
    private const CONFIG_PATH_STRATEGY = 'catalog/seo/product_breadcrumbs_strategy';
    private const CONFIG_PATH_EXCLUDED_CATEGORIES = 'catalog/seo/product_breadcrumbs_exclude_categories';

    public function __construct(private ScopeConfigInterface $scopeConfig) {}

    public function isServerSideRendered(int|string|null $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_IS_SERVER_SIDE, ScopeInterface::SCOPE_STORES, $store);
    }

    public function isClientSideOverrideAllowed(int|string|null $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::CONFIG_PATH_IS_CLIENT_SIDE_OVERRIDE_ALLOWED,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    public function getStrategy(int|string|null $store = null): Strategy
    {
        return Strategy::from(
            $this->scopeConfig->getValue(self::CONFIG_PATH_STRATEGY, ScopeInterface::SCOPE_STORES, $store)
        );
    }

    public function getExcludedCategories(int|string|null $store = null): array
    {
        return array_map(intval(...), array_filter(explode(
            ',',
            preg_replace('/\s+/', '', (string)$this->scopeConfig->getValue(
                self::CONFIG_PATH_EXCLUDED_CATEGORIES,
                ScopeInterface::SCOPE_STORES,
                $store
            ))
        )));
    }
}
