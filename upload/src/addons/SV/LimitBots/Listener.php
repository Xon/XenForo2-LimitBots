<?php

namespace SV\LimitBots;

use XF\Container;

class Listener
{
    public static function appSetup(\XF\Pub\App $app)
    {
        $app->container()->set('session.public', function (Container $c) use($app)
        {
            $sessionClass = $app->extendClass('XF\Session\Session');
            /** @var \XF\Session\Session $session */
            $session = new $sessionClass($c['session.public.storage'], [
                'cookie' => 'session'
            ]);
            return $session->start($c['request']);
        });
    }
}
