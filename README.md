# PHPMentorsRouteBasedSessionConfigurationBundle

A Symfony bundle for session configuration based on route configuration

[![Total Downloads](https://poser.pugx.org/phpmentors/route-based-session-configuration-bundle/downloads)](https://packagist.org/packages/phpmentors/route-based-session-configuration-bundle)
[![Latest Stable Version](https://poser.pugx.org/phpmentors/route-based-session-configuration-bundle/v/stable)](https://packagist.org/packages/phpmentors/route-based-session-configuration-bundle)
[![Latest Unstable Version](https://poser.pugx.org/phpmentors/route-based-session-configuration-bundle/v/unstable)](https://packagist.org/packages/phpmentors/route-based-session-configuration-bundle)

## Features

* Runtime session configuration by route configuration

## Installation

`PHPMentorsRouteBasedSessionConfigurationBundle` can be installed using [Composer](http://getcomposer.org/).

First, add the dependency to `phpmentors/route-based-session-configuration-bundle` into your `composer.json` file as the following:

**Stable version:**

```
composer require phpmentors/route-based-session-configuration-bundle "1.0.*"
```

**Development version:**

```
composer require phpmentors/route-based-session-configuration-bundle "~1.1@dev"
```

Second, add `PHPMentorsRouteBasedSessionConfigurationBundle` into your bundles to register in `AppKernel::registerBundles()` as the following:

```php
...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            ...
            new PHPMentors\RouteBasedSessionConfigurationBundle\PHPMentorsRouteBasedSessionConfigurationBundle(),
        );
        ...
```

## Configuration

```yaml
# app/config/routing.yml
# ...
customer:
    # set session.* ini variables without leading "session."
    # see "Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage::setOptions()" for available options
    options:
        session:
            name: CUSTOMER_SESSION
            # ...
```

## Support

If you find a bug or have a question, or want to request a feature, create an issue or pull request for it on [Issues](https://github.com/phpmentors-jp/route-based-session-configuration-bundle/issues).

## Copyright

Copyright (c) 2016-2017 KUBO Atsuhiro, All rights reserved.

## License

[The BSD 2-Clause License](http://opensource.org/licenses/BSD-2-Clause)
