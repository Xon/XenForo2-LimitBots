<?php

namespace SV\LimitBots\XF\Repository;

class Attachment extends XFCP_Attachment
{
	public function logAttachmentView(\XF\Entity\Attachment $attachment)
	{
		if (\XF::session()->isRobot())
		{
			return;
		}

		parent::logAttachmentView($attachment);
	}
}