
# kavenegar-PHP

# <a href="http://kavenegar.com/rest.html">Kavenegar RESTful API Document</a>
If you need to future information about API document Please visit RESTful Document

## Installation
<p>
First of all, You need to make an account on Kavenegar from <a href="https://panel.kavenegar.com/Client/Membership/Register">Here</a>
</p>
<p>
After that you just need to pick API-KEY up from <a href="http://panel.kavenegar.com/Client/setting/index">My Account</a> section.
</p>
<hr>

Use in these ways : 

```php
composer require masihjay-z/kavenegar
```

or add

```php
"kavenegar/php": "*"
```
And run following command to download extension using **composer** 


```php
$ composer update
```


Usage
-----

Well, There is an example to Send SMS by PHP.

```php
require __DIR__ . '/vendor/autoload.php';

try{
	$api = new \Kavenegar\KavenegarApi( "API Key" );
	$sender = "10004346";
	$message = "خدمات پیام کوتاه کاوه نگار";
	$receptor = array("09123456789","09367891011");
	$result = $api->Send($sender,$receptor,$message);
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

Also you can use KavengarChannel for your notification:

create your notification:
``
php artisan make:notification InvoicePaid
``

extend your notification from KavenegarBaseNotification:

```php
class InvoicePaid extends KavenegarBaseNotification
{

}
```
overide the toKavengar function:
 ````php
 class InvoicePaid extends KavenegarBaseNotification
 {

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
 
     public function toKavenegar($notifiable)
     {
         return (new KavenegarMessage("فاکتور شما به شماره $invoice->id پرداخت شد."))->from('10004346');
     }
 }
````
you should add Notifiable trait and routeNotificationForKavenegar method in your model

````php
class User extends Authenticatable
{
    use Notifiable;
    
    public function routeNotificationForKavenegar($driver, $notification = null)
    {
        return $this->mobile;
    }

}
````
<i><b>Notice: if you don't add routeNotificationForKavenegar in your notifiable model then you should set your receiver in your notification :
````php
class InvoicePaid extends KavenegarBaseNotification
{

    public function toKavenegar($notifiable)
    {
        return (new KavenegarMessage('فاکتور شما به شماره ۱۲۳۴ پرداخت شد.'))->from('10004346')->to('092100000');
    }
}
````
for send verify lookup message you should use verifyLookup method for set method name and tokens:

````php
class InvoicePaid extends KavenegarBaseNotification
{

    public function toKavenegar($notifiable)
    {
        return (new KavenegarMessage())
            ->verifyLookup('verify_first',['token1','token2']);
    }
}
````


## Contribution

Bug fixes, docs, and enhancements welcome! Please let us know <a href="mailto:support@kavenegar.com?Subject=SDK" target="_top">support@kavenegar.com</a>

<hr>

<div dir='rtl'>
	
## راهنما

### معرفی سرویس کاوه نگار

کاوه نگار یک وب سرویس ارسال و دریافت پیامک و تماس صوتی است که به راحتی میتوانید از آن استفاده نمایید.

### ساخت حساب کاربری

اگر در وب سرویس کاوه نگار عضو نیستید میتوانید از [لینک عضویت](http://panel.kavenegar.com/client/membership/register) ثبت نام  و اکانت آزمایشی برای تست API دریافت نمایید.

### مستندات

برای مشاهده اطلاعات کامل مستندات [وب سرویس پیامک](http://kavenegar.com/وب-سرویس-پیامک.html)  به صفحه [مستندات وب سرویس](http://kavenegar.com/rest.html) مراجعه نمایید.

### راهنمای فارسی

در صورتی که مایل هستید راهنمای فارسی کیت توسعه کاوه نگار را مطالعه کنید به صفحه [کد ارسال پیامک](http://kavenegar.com/sdk.html) مراجعه نمایید.

### اطالاعات بیشتر
برای مطالعه بیشتر به صفحه معرفی
[وب سرویس اس ام اس ](http://kavenegar.com)
کاوه نگار
مراجعه نمایید .

 اگر در استفاده از کیت های سرویس کاوه نگار مشکلی یا پیشنهادی  داشتید ما را با یک Pull Request  یا  ارسال ایمیل به support@kavenegar.com  خوشحال کنید.
 
##
![http://kavenegar.com](http://kavenegar.com/public/images/logo.png)		

[http://kavenegar.com](http://kavenegar.com)	

</div>


