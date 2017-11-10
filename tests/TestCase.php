<?php
// +----------------------------------------------------------------------
// | TestCase.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests;

use Phalcon\Di\FactoryDefault;
use PHPUnit\Framework\TestCase as UnitTestCase;
use Xin\Phalcon\Router\Mvc\Router;

class TestCase extends UnitTestCase
{
    /** @var  FactoryDefault */
    public $di;
    /** @var  \Phalcon\Mvc\Router */
    public $router;

    public function setUp()
    {
        $di = new FactoryDefault();
        $di->setShared('router', function () {
            // $router = new \Phalcon\Mvc\Router(false);
            $router = new Router(false);

            $router->add('/index', 'Tests\\App\\Controllers\\Index::index');

            $group = new \Phalcon\Mvc\Router\Group();
            $group->setPrefix('/test');
            $group->add('/index', 'Tests\\App\\Controllers\\Index::group');
            $router->mount($group);

            $router->group(function () {
                $group = new \Phalcon\Mvc\Router\Group();
                $group->setPrefix('/test2');
                $group->add('/index', 'Tests\\App\\Controllers\\Index::group');

                return $group;
            });

            return $router;
        });

        FactoryDefault::setDefault($di);
        $this->di = $di;
        $this->router = $di->getShared('router');
    }
}