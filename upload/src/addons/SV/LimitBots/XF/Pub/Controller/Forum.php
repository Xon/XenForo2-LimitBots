<?php

namespace SV\LimitBots\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{
    protected function getForumFilterInput(\XF\Entity\Forum $forum)
    {
        $filters = parent::getForumFilterInput($forum);

        /** @var \SV\LimitBots\XF\Session\Session $session */
        $session = \XF::session();
        if ($session->isRobot())
        {
            if (isset($filters['order']))
            {
                unset($filters['order']);
            }

            if (isset($filters['direction']))
            {
                unset($filters['direction']);
            }
        }

        return $filters;
    }
}
