<?php

namespace Q1lon\Encrypt;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class Md5HasherProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //注册服务
        $this->app->singleton("md5hash", function ($app) {
            return new Md5Hasher($app['config']);
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //注册配置文件
//        $this->publishes([
//            __DIR__ . '/config/md5Hash.php' => config_path('md5Hash.php'), // 发布配置文件到 laravel 的config 下
//        ]);

        $source = realpath($raw = __DIR__ . '/config/md5Hash.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('md5Hash.php')]);
        }

        $this->mergeConfigFrom($source, 'md5Hash');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['md5hash'];
    }
}
