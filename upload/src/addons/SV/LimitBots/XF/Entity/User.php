<?php

namespace SV\LimitBots\XF\Entity;

use SV\LimitBots\XF\Session\Session as ExtendedSession;

/**
 * @extends \XF\Entity\User
 */
class User extends XFCP_User
{
    /** @noinspection PhpMissingReturnTypeInspection */
    public function canSearch(&$error = null)
    {
        if (!$this->user_id && !(\XF::options()->svBotsCanSearch ?? true))
        {
            /** @var ExtendedSession $session */
            $session = \XF::session();
            if ($session->isRobot(false))
            {
                return false;
            }

        }

        return parent::canSearch($error);
    }
}