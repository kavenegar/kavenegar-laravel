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

## Laravel 5 and 6

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

Finally, publish the config file with `php artisan vendor:publish`
&nbsp;
Or alternatively for laravel 5 you can do: `php artisan vendor:publish --provider="Kavenegar\Laravel\ServiceProviderLaravel5"`.
&nbsp;
And for laravel 6: `php artisan vendor:publish --provider="Kavenegar\Laravel\ServiceProviderLaravel6"`.<br />
&nbsp;
And you'll find it at `config/kavenegar.php`.

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
  'Kavenegar' => 'Kavenegar\Laravel\Facade',
],
```

Finally, publish the config file with `php artisan config:publish kavenegar/laravel`. You'll find the config file at `app/config/packages/kavenegar/laravel/config.php`.

## Usage

Well, There is an example to Send SMS by Laravel below.

```php

try{
    $sender = "10004346";
    $message = "خدمات پیام کوتاه کاوه نگار";
    $receptor = array("09123456789","09367891011");
    $result = Kavenegar::Send($sender,$receptor,$message);
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
catch(ApiException $e){
    // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
    echo $e->errorMessage();
}
catch(HttpException $e){
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
	
## راهنما

### معرفی سرویس کاوه نگار

کاوه نگار یک وب سرویس ارسال و دریافت پیامک و تماس صوتی است که به راحتی میتوانید از آن استفاده نمایید.

### ساخت حساب کاربری

اگر در وب سرویس کاوه نگار عضو نیستید میتوانید از [لینک عضویت](http://panel.kavenegar.com/client/membership/register) ثبت نام و اکانت آزمایشی برای تست API دریافت نمایید.

### مستندات

برای مشاهده اطلاعات کامل مستندات [وب سرویس پیامک](http://kavenegar.com/وب-سرویس-پیامک.html) به صفحه [مستندات وب سرویس](http://kavenegar.com/rest.html) مراجعه نمایید.

### راهنمای فارسی

در صورتی که مایل هستید راهنمای فارسی کیت توسعه کاوه نگار را مطالعه کنید به صفحه [کد ارسال پیامک](http://kavenegar.com/sdk.html) مراجعه نمایید.

### اطالاعات بیشتر

برای مطالعه بیشتر به صفحه معرفی
[وب سرویس اس ام اس ](http://kavenegar.com)
کاوه نگار
مراجعه نمایید .

اگر در استفاده از کیت های سرویس کاوه نگار مشکلی یا پیشنهادی داشتید ما را با یک Pull Request یا ارسال ایمیل به support@kavenegar.com خوشحال کنید.

##

![http://kavenegar.com](http://kavenegar.com/public/images/logo.png)

[http://kavenegar.com](http://kavenegar.com)

</div>
