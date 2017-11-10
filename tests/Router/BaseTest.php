<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Router;

use Tests\TestCase;

class BaseTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRoute()
    {
        $routes = [
            '/index' => [
                'namespace' => 'Tests\\App\\Controllers',
                'controller' => 'index',
                'action' => 'index',
            ],
            '/test/index' => [
                'namespace' => 'Tests\\App\\Controllers',
                'controller' => 'index',
                'action' => 'group',
            ],
            '/test2/index' => [
                'namespace' => 'Tests\\App\\Controllers',
                'controller' => 'index',
                'action' => 'group',
            ],
        ];

        foreach ($this->router->getRoutes() as $route) {
            $this->assertEquals($route->getPaths(), $routes[$route->getPattern()]);
        }
    }
}