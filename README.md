# WalisPH Dashboard Module

## Installation
Add to your composer `"walisph/dashboard": "dev-master"`

Add to your Service Provider
```
'Walisph\Dashboard\DashboardServiceProvider',
'Intervention\Image\ImageServiceProvider'
```

Add to your Facade aliases
```
'Image' => 'Intervention\Image\Facades\Image'
```

Then run to your root application
```
php artisan config:publish intervention/image
```

* * *
###### CREATED AND DEVELOPED BY WALIS PHILIPPINES