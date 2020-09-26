# encrypt
### 使用方法
php artisan vendor:publish --provider="Q1lon\Encrypt\Md5HasherProvider" // --provider 参数指定了要发布的服务 
### 配置参数
~~~
'options' => [
        'salt' => ''//加密盐
    ] 
~~~
