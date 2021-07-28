## About

First Step: download in your system.

git clone https://github.com/siddharth018/Event-Booking-System-in-Laravel-8

    cd Event-Booking-System-in-Laravel-8

composer install

    cp .env.example .env

Put your credentils .env file.

    php artisan migrate 

Step second: Run server

    php artisan serve

Put your credentils in cofig/pay.php
    <?php 

    return [ 
        'client_id' => 'Your Client ID',
        'secret' => 'Your Secret ID',
        'settings' => array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 1000,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR'
        ),
    ];

check user logged in
        
    http://127.0.0.1:8000/login

## Youtube
Join in youtube
(https://www.youtube.com/channel/UCVSvNQjV5gwKIP9ZgaXSU1w?view_as=subscriber).

## Facebook
Join in Facebook
(https://www.facebook.com/siddharthshukla181992/?modal=admin_todo_tour)

## Instagram
Join in Instagram
(https://www.instagram.com/siddharth_shukla018/)

## Linkedin
Join in Linkedin
(https://www.linkedin.com/in/siddharth-shukla-32873659/)
