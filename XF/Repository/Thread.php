<?php

namespace SV\LimitBots\XF\Repository;

class Thread extends XFCP_Thread
{
	public function logThreadView(\XF\Entity\Thread $thread)
	{
		if (\XF::session()->isRobot())
		{
			return;
		}

		parent::logThreadView($thread);
	}
}