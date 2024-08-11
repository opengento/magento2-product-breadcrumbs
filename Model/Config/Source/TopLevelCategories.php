<?php
/**
 * Copyright © OpenGento, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Opengento\ProductBreadcrumbs\Model\Config\Source;

use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Exception\LocalizedException;

class TopLevelCategories implements OptionSourceInterface
{
    private ?array $options = null;

    public function __construct(private CollectionFactory $categoryCollectionFactory) {}

    /**
     * @throws LocalizedException
     */
    public function toOptionArray(): array
    {
        return $this->options ??= $this->createOptions();
    }

    /**
     * @throws LocalizedException
     */
    private function createOptions(): array
    {
        $collection = $this->categoryCollectionFactory->create()
            ->setLoadProductCount(false)
            ->addAttributeToSelect(CategoryInterface::KEY_NAME, true)
            ->addFieldToFilter(CategoryInterface::KEY_LEVEL, [1, 2])
            ->addOrder(CategoryInterface::KEY_PATH)
            ->addOrder(CategoryInterface::KEY_POSITION);

        $options = [];
        /** @var CategoryInterface $category */
        foreach ($collection->getItemsByColumnValue(CategoryInterface::KEY_LEVEL, 1) as $category) {
            $group = ['label' => $category->getName(), 'value' => []];
            foreach ($collection->getItemsByColumnValue(CategoryInterface::KEY_PARENT_ID, $category->getId()) as $child) {
                $group['value'][] = ['label' => $child->getName(), 'value' => $category->getId()];
            }

            $options[] = $group;
        }

        return $options;
    }
}
