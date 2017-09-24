# josephlavin/tap

[![Build Status](https://travis-ci.org/josephlavin/tap.svg?branch=master)](https://travis-ci.org/josephlavin/tap)

A stand alone port of [Laravel's](https://laravel.com/) `tap` method (inspired by Ruby).  This package will add a `tap` method to the global namespace.  For more information see [Taylor Otwell's explanation of tap](https://medium.com/@taylorotwell/tap-tap-tap-1fc6fc1f93a6).

## Example
You need to create a model and commit it to the database using `save`:
```php
function createAndSaveModel($attributes)
{
    $model = new Model($attributes);
    
    $model->save();
    
    return $model;
}
```

The same code can be simplified utilizing `tap`:
```php
function createAndSaveModel($attributes)
{
    return tap(new Model($attributes), function (Model $model) {
        $model->save();
    });
}
```

Utilizing the proxy feature it can be further simplified:
```php
function createAndSaveModel($attributes)
{
    return tap(new Model($attributes))->save();
}
```