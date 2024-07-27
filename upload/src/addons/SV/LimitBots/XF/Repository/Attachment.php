<?php

namespace SV\LimitBots\XF\Repository;

/**
 * @extends \XF\Repository\Attachment
 */
class Attachment extends XFCP_Attachment
{
    public function logAttachmentView(\XF\Entity\Attachment $attachment)
    {
        /** @var \SV\LimitBots\XF\Session\Session $session */
        $session = \XF::session();
        if ($session->isRobot())
        {
            return;
        }

        parent::logAttachmentView($attachment);
    }
}
