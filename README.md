# Laravel Nova Values Field

This field is a clone of the [KeyValue field](https://nova.laravel.com/docs/4.0/resources/fields.html#keyvalue-field) without keys.

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
