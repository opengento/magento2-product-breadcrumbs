<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Opengento\ProductBreadcrumbs\Model\Breadcrumbs\Strategy;

use function array_map;

class Strategies implements OptionSourceInterface
{
    private ?array $options = null;

    public function toOptionArray(): array
    {
        return $this->options ??= array_map(
            static fn (Strategy $strategy): array => ['label' => $strategy->getLabel(), 'value' => $strategy->value],
            Strategy::cases()
        );
    }
}
