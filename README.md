# Laravel Nova Values Field

This field is a clone of the [KeyValue field](https://nova.laravel.com/docs/4.0/resources/fields.html#keyvalue-field) without keys.

![form](https://raw.githubusercontent.com/Muetze42/asset-repo/main/nova-values-field/images/form.png "form")  
![detail](https://raw.githubusercontent.com/Muetze42/asset-repo/main/nova-values-field/images/detail.png "detail")

## Install

```
composer require norman-huth/nova-values-field
```

## Usage

```php
use NormanHuth\Values\Values;

class Example extends Resource
{
    //...
    public function fields(NovaRequest $request): array
    {
        return [
            Values::make('headers')
                ->valueLabel('Items'),
        ]
    }
        
}
```

## Misc

Alternative for Nova 3:  
[dillingham/nova-items-field](https://github.com/dillingham/nova-items-field)

---
[![More Laravel Nova Packages](https://raw.githubusercontent.com/Muetze42/asset-repo/main/svg/more-laravel-nova-packages.svg)](https://huth.it/nova-packages)

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://vshymanskyy.github.io/StandWithUkraine/)

[![Woman. Life. Freedom.](https://raw.githubusercontent.com/Muetze42/Muetze42/2033b219c6cce0cb656c34da5246434c27919bcd/files/iran-banner-big.svg)](https://linktr.ee/CurrentPetitionsFreeIran)
