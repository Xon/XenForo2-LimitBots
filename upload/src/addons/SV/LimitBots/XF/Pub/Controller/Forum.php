<?php
/**
 * @noinspection PhpMissingReturnTypeInspection
 */

namespace SV\LimitBots\XF\Pub\Controller;

use SV\LimitBots\XF\Session\Session as ExtendedSession;

/**
 * @extends \XF\Pub\Controller\Forum
 */
class Forum extends XFCP_Forum
{
    protected function getForumFilterInput(\XF\Entity\Forum $forum)
    {
        $filters = parent::getForumFilterInput($forum);

        /** @var ExtendedSession $session */
        $session = \XF::session();
        if ($session->isRobot(false))
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
