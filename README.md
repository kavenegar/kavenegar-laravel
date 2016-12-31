# kavenegar-laravel

# <a href="http://kavenegar.com/rest.html">Kavenegar RESTful API Document</a>
If you need to future information about API document Please visit RESTful Document


## Requirements

Laravel 4 or 5.

## Installation

<p>
First of all, You need to make an account on Kavenegar from <a href="https://panel.kavenegar.com/Client/Membership/Register">Here</a>
</p>
<p>
After that you just need to pick API-KEY up from <a href="http://panel.kavenegar.com/Client/setting/index">My Account</a> section.
</p>

Install it this way : 

```sh
composer require kavenegar/laravel
```

## Laravel 5

Add the `Kavenegar\Laravel\ServiceProvider` provider to the `providers` array in `config/app.php`:

```php
'providers' => [
  ...
  Kavenegar\Laravel\ServiceProvider::class,
],
```

Then add the facade to your `aliases` array:

```php
'aliases' => [
  ...
  'Kavenegar' => Kavenegar\Laravel\Facade::class,
],
```

Finally, publish the config file with `php artisan vendor:publish`. You'll find it at `config/kavenegar.php`.

## Laravel 4

Add the `Kavenegar\Laravel\ServiceProvider` provider to the `providers` array in `app/config.php`:

```php
'providers' => [
  ...
  'Kavenegar\Laravel\ServiceProvider',
],
```

Then add the facade to your `aliases` array:

```php
'aliases' => [
  ...
  'Kavenegar' => Kavenegar\Laravel\Facade',
],
```

Finally, publish the config file with `php artisan config:publish kavenegar/laravel`. You'll find the config file at `app/config/packages/kavenegar/laravel/config.php`.



## Usage
Well, There is an example to Send SMS by Laravel below.

```php

use Kavenegar as api;
try{
    $sender = "10004346";
    $message = "خدمات پیام کوتاه کاوه نگار";
    $receptor = array("09123456789","09367891011");
    $result = api->Send($sender,$receptor,$message);
    if($result){
        foreach($result as $r){
            echo "messageid = $r->messageid";
            echo "message = $r->message";
            echo "status = $r->status";
            echo "statustext = $r->statustext";
            echo "sender = $r->sender";
            echo "receptor = $r->receptor";
            echo "date = $r->date";
            echo "cost = $r->cost";
        }       
    }
}
catch(\Kavenegar\Exceptions\ApiException $e){
    // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
    echo $e->errorMessage();
}
catch(\Kavenegar\Exceptions\HttpException $e){
    // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
    echo $e->errorMessage();
}

/*
sample output
{
    "return":
    {
        "status":200,
        "message":"تایید شد"
    },
    "entries": 
    [
        {
            "messageid":8792343,
            "message":"خدمات پیام کوتاه کاوه نگار",
            "status":1,
            "statustext":"در صف ارسال",
            "sender":"10004346",
            "receptor":"09123456789",
            "date":1356619709,
            "cost":120
        },
        {
            "messageid":8792344,
            "message":"خدمات پیام کوتاه کاوه نگار",
            "status":1,
            "statustext":"در صف ارسال",
            "sender":"10004346",
            "receptor":"09367891011",
            "date":1356619709,
            "cost":120
        }
    ]
}
*/
```
#Contribution
Bug fixes, docs, and enhancements welcome! Please let us know <a href="mailto:support@kavenegar.com?Subject=SDK" target="_top">support@kavenegar.com</a>
<hr>

<div dir='rtl'>

<h4 id="">راهنمای فارسی</h4>
<h5 id="-1">راهنما</h5>
<p>در صورتی که مایل هستید راهنمای فارسی کیت توسعه کاوه نگار را مطالعه کنید به صفحه
<a href="http://kavenegar.com/sdk.html">کد ارسال پیامک</a> 
مراجعه کنید.</p>
<h5 id="-2">مستندات</h5>
<p>برای مطالعه مستندات کار با
<a href="http://kavenegar.com"> وب سرویس اس ام اس</a>
کاوه نگار به صفحه <a href="http://kavenegar.com/rest.html">مستندات</a>مراجعه کنید</p>
<h5 id="-3">معرفی وب سرویس کاوه نگار</h5>
<p>برای مشاهده ویژگی های وب سرویس پیامک کاوه نگار به <a href="http://kavenegar.com/%D9%88%D8%A8%D8%B3%D8%B1%D9%88%DB%8C%D8%B3-%D9%BE%DB%8C%D8%A7%D9%85%DA%A9.html">صفحه  وب سرویس</a>مراجعه نمائید.</p>
<h5 id="-4">ایجاد حساب کاربری</h5>
<p>و بالاخره اگر در استفاده از سرویس کاوه نگار مشکلی داشتید یا پیشنهاد همکاری  بود لطفا حتما به ما اطلاع دهید.</p>
<p><a href="mailto:support@kavenegar.com">support@kavenegar.com</a></p>
</div>

</p>
</div>



