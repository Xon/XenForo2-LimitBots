<?php

namespace SV\LimitBots\XF\Repository;

use SV\LimitBots\XF\Session\Session as ExtendedSession;

/**
 * @extends \XF\Repository\Thread
 */
class Thread extends XFCP_Thread
{
    public function logThreadView(\XF\Entity\Thread $thread)
    {
        /** @var ExtendedSession $session */
        $session = \XF::session();
        if ($session->isRobot())
        {
            return;
        }

        parent::logThreadView($thread);
    }
}
