# x-phalcon-router
a phalcon router component

[![Build Status](https://travis-ci.org/limingxinleo/x-phalcon-router.svg?branch=master)](https://travis-ci.org/limingxinleo/x-phalcon-router)

## 安装
`composer require limingxinleo/x-phalcon-router`

## 配置
添加服务
~~~php
<?php
 
use Xin\Phalcon\Router\Mvc\Router;

$di->setShared('router', function () {
    $router = new Router(false);
    // 普通路由
    $router->add('/index', 'Tests\\App\\Controllers\\Index::index');

    // 默认组使用方式
    $group = new \Phalcon\Mvc\Router\Group();
    $group->setPrefix('/test');
    $group->add('/index', 'Tests\\App\\Controllers\\Index::group');
    $router->mount($group);

    // 匿名函数使用方式
    $router->group(function () {
        $group = new \Phalcon\Mvc\Router\Group();
        $group->setPrefix('/test2');
        $group->add('/index', 'Tests\\App\\Controllers\\Index::group');

        return $group;
    });

    return $router;
});
~~~