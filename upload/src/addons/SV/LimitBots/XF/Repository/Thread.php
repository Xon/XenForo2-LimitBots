<?php

namespace SV\LimitBots\XF\Repository;

/**
 * @extends \XF\Repository\Thread
 */
class Thread extends XFCP_Thread
{
    public function logThreadView(\XF\Entity\Thread $thread)
    {
        /** @var \SV\LimitBots\XF\Session\Session $session */
        $session = \XF::session();
        if ($session->isRobot())
        {
            return;
        }

        parent::logThreadView($thread);
    }
}
