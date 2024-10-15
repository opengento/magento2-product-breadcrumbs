<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Model\Breadcrumbs;

use Magento\Framework\Phrase;

enum Strategy: string
{
    private const NATIVE = 'native';
    private const DEEPEST = 'deepest';
    private const CLOSEST = 'closest';

    private const LABELS = [
        self::NATIVE => 'Build breadcrumbs as it is natively.',
        self::DEEPEST => 'Build breadcrumbs from deepest category.',
        self::CLOSEST => 'Build breadcrumbs from closest category.',
    ];

    case Native = self::NATIVE;
    case Deepest = self::DEEPEST;
    case Closest = self::CLOSEST;

    public function getLabel(): Phrase
    {
        return new Phrase(self::LABELS[$this->value] ?? $this->name);
    }
}
