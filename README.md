# encrypt
### 安装
~~~
composer require q1lon/encrypt -vvv
~~~
### 使用方法
1 添加配置文件
> php artisan vendor:publish --provider="Q1lon\Encrypt\Md5HasherProvider" // --provider 参数指定了要发布的服务

2 直接使用 app函数
> echo app('md5hash')->make(123);

3 实例化对象
> $Md5Hasher = new \Q1lon\Encrypt\Md5Hasher(); <br>
> echo $Md5Hasher->make(123);

4 实例化对象并添加配置文件
> $Md5Hasher = new \Q1lon\Encrypt\Md5Hasher(app('config'));<br>
> echo $Md5Hasher->make(123);
### 配置参数
~~~
'options' => [
        'salt' => ''//加密盐
    ] 
~~~
