<?php

namespace SV\LimitBots\XF\Repository;

use SV\LimitBots\XF\Session\Session as ExtendedSession;

/**
 * @extends \XF\Repository\Attachment
 */
class Attachment extends XFCP_Attachment
{
    public function logAttachmentView(\XF\Entity\Attachment $attachment)
    {
        /** @var ExtendedSession $session */
        $session = \XF::session();
        if ($session->isRobot())
        {
            return;
        }

        parent::logAttachmentView($attachment);
    }
}
