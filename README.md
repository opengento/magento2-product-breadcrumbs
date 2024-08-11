# Sales Sequence Configurable Module for Magento 2

[![Latest Stable Version](https://img.shields.io/packagist/v/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs)
[![License: MIT](https://img.shields.io/github/license/opengento/magento2-product-breadcrumbs.svg?style=flat-square)](./LICENSE) 
[![Packagist](https://img.shields.io/packagist/dt/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs/stats)
[![Packagist](https://img.shields.io/packagist/dm/opengento/module-product-breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/opengento/module-product-breadcrumbs/stats)

This module allows to toggle server side rendered breadcrumb for product pages.

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

This module is Hyva-ready!  
This module render server-sided product breadcrumb so it's visible to any robot without requiring any js loads and process.  
Can you still enable the js breadcrumb so your user can see natural breadcrumbs following their navigation.

## Documentation

- Toggle render server side the product rbeadcrumbs
- Toggle allows client side to override product breadcrumbs based on navigation
- Select best strategy to generate the product breadcrumbs (native, deepest, shallowest)
- Exclude some root categories from being used to generate the breadcrumbs

## Support

Raise a new [request](https://github.com/opengento/magento2-product-breadcrumbs/issues) to the issue tracker.

## Authors

- **Opengento Community** - *Lead* - [![Twitter Follow](https://img.shields.io/twitter/follow/opengento.svg?style=social)](https://twitter.com/opengento)
- **Thomas Klein** - *Maintainer* - [![GitHub followers](https://img.shields.io/github/followers/thomas-kl1.svg?style=social)](https://github.com/thomas-kl1)
- **Contributors** - *Contributor* - [![GitHub contributors](https://img.shields.io/github/contributors/opengento/magento2-product-breadcrumbs.svg?style=flat-square)](https://github.com/opengento/magento2-product-breadcrumbs/graphs/contributors)

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) details.

***That's all folks!***
