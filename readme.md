# Fontpicker Module

[![Build Status](https://travis-ci.org/silverstripe/silverstripe-theme-fontpicker.svg?branch=master)](https://travis-ci.org/silverstripe/silverstripe-theme-fontpicker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/silverstripe/silverstripe-theme-fontpicker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/silverstripe/silverstripe-theme-fontpicker/?branch=master)
[![codecov](https://codecov.io/gh/silverstripe/silverstripe-theme-fontpicker/branch/master/graph/badge.svg)](https://codecov.io/gh/silverstripe/silverstripe-theme-fontpicker)

This module adds a font picker under the admin settings, under a `Theme Options` tab. It comes with 3 fonts out of the box, provided by Google Fonts, but more fonts can be added.

## Usage

### Adding extra fonts

To add extra fonts, simply set the `theme_fonts` field under `SiteConfig` as follows:

```yaml
SilverStripe\SiteConfig\SiteConfig:
  theme_fonts:
    metropolis: Metropolis
    nunito-sans: Nunito Sans
    fira-sans: Fira Sans
    merriweather: Merriweather
```

> Note that any font which is unavailable at Google Fonts will not be displayed in preview in the font selector.
 
### Changing the default font

To set the default font, simply set the `default_font` field under `SiteConfig` as follows:

```yaml
SilverStripe\Fontpicker\Forms\FontPickerField:
  default_font: metropolis
```

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
