# Kavenegar notifications channel for Laravel 5.3 | 5.4

This package makes it easy to send [Kavenegar SMS notifications](http://kavenegar.com/) with Laravel 5.3 or 5.4.

## Contents

- [Installation](#installation)
    - [Setting up your Kavenegar account](#setting-up-your-kavenegar-account)
- [Usage](#usage)
- [Contributing](#contributing)

## Installation

You can install the package via composer:

``` bash
composer require kavenegar/laravel
```

You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    Kavenegar\Laravel\KavenegarServiceProvider::class,
],
```

### Setting up your Kavenegar account

Add your Kavenegar Account Key and Sender Number (optional) to your `config/services.php`:

```php
// config/services.php
...
'kavenegar' => [
    'key' => env('KAVENEGAR_API_KEY'),
    'sender' => env('KAVENEGAR_SENDER')
],
...
```

## Usage

Now you can use the channel in your `via()` method inside the notification:

``` php
use Kavenegar\Laravel\KavenegarChannel;
use Illuminate\Notifications\Notification;

class HappyNewYear extends Notification
{
    public function via($notifiable)
    {
        return [KavenegarChannel::class];
    }

    public function toSMS($notifiable)
    {
        return 'Happy new year :D';
    }
}
```

In order to let your Notification know which phone number you are sending to, add the `routeNotificationForJusibe` method to your Notifiable model e.g your User Model

```php
public function routeNotificationForSms()
{
    return $this->phone; // where `phone` is a field in your users table;
}
```

## Contributing

Bug fixes, docs, and enhancements welcome! Please let us know <a href="mailto:support@kavenegar.com?Subject=SDK" target="_top">support@kavenegar.com</a>