<?php

namespace template\Module;

use Ray\Di\InjectorInterface,
    Ray\Di\ProviderInterface;

/**
 * Smarty3
 *
 * @see http://www.smarty.net/docs/ja/
 */
class SmartyProvider implements ProviderInterface
{
    /**
     * @return array
     */
    public function get()
    {
        $smarty = new \Smarty;
        $smarty->setCompileDir(dirname(__DIR__) . '/tmp/smarty/template_c');
        $smarty->setCacheDir(dirname(__DIR__) . '/tmp/smarty/cache');
        return $smarty;
    }
}