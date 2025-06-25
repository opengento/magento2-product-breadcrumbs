# Product Breadcrumbs Rendering Strategy Module for Magento 2

[![Latest Stable Version](https://img.shields.io/packagist/v/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs)
[![License: MIT](https://img.shields.io/github/license/opengento/magento2-product-breadcrumbs.svg?style=flat-square)](./LICENSE) 
[![Packagist](https://img.shields.io/packagist/dt/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs/stats)
[![Packagist](https://img.shields.io/packagist/dm/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs/stats)

This module allows to toggle server side rendered breadcrumbs for product pages.

 - [Setup](#setup)
   - [Composer installation](#composer-installation)
   - [Setup the module](#setup-the-module)
 - [Features](#features)
 - [Settings](#settings)
 - [Documentation](#documentation)
 - [Support](#support)
 - [Authors](#authors)
 - [License](#license)

## Setup

Magento 2 Open Source or Commerce edition is required.

### Composer installation

Run the following composer command:

```
composer require opengento/module-product-breadcrumbs
```

### Setup the module

Run the following magento command:

```
bin/magento setup:upgrade
```

**If you are in production mode, do not forget to recompile and redeploy the static resources.**

## Features

This module is Hyvä-Ready!

This module render server-sided product breadcrumbs so it's visible to any robot without requiring any js loads and process.  
Can you still enable the js breadcrumbs so your user can see natural breadcrumbs following their navigation.

## Settings

The settings are available at:

`Stores > Configuration > Catalog > Catalog > Search Engine Optimization`

- Render Product Breadcrumbs from Server-Side
- Override Product Breadcrumbs on Client-Side
- Product Breadcrumbs Strategy
- Product Breadcrumbs Excluded Categories

## Documentation

- Toggle server-side product breadcrumbs rendering.
- Toggle to allow client-side to override product breadcrumbs based on navigation.
- Select best strategy to generate the product breadcrumbs (native, deepest, closest).
- Exclude some root categories from being used to generate the breadcrumbs.

## Support

Raise a new [request](https://github.com/opengento/magento2-product-breadcrumbs/issues) to the issue tracker.

## Authors

- **Opengento Community** - *Lead* - [![Twitter Follow](https://img.shields.io/twitter/follow/opengento.svg?style=social)](https://twitter.com/opengento)
- **Thomas Klein** - *Maintainer* - [![GitHub followers](https://img.shields.io/github/followers/thomas-kl1.svg?style=social)](https://github.com/thomas-kl1)
- **Contributors** - *Contributor* - [![GitHub contributors](https://img.shields.io/github/contributors/opengento/magento2-product-breadcrumbs.svg?style=flat-square)](https://github.com/opengento/magento2-product-breadcrumbs/graphs/contributors)

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) details.

***That's all folks!***
