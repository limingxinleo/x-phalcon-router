<?php
// +----------------------------------------------------------------------
// | Router.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Phalcon\Router\Mvc;

use Phalcon\Mvc\Router as PhalconRouter;
use Closure;
use Phalcon\Mvc\Router\GroupInterface;
use Xin\Phalcon\Router\Exception\RouterException;

class Router extends PhalconRouter
{
    /**
     * Mounts a group of routes in the router
     */
    public function mountCall(Closure $func)
    {
        $group = $func();
        if (!$group instanceof GroupInterface) {
            throw new RouterException('The group is not instanceof GroupInterface');
        }

        return $this->mount($group);
    }
}