<?php

namespace SV\LimitBots\XF\Session;

class Session extends XFCP_Session
{
	public function save()
	{
		if (!$this->isRobot())
		{
			return parent::save();
		}

		return false;
	}

	public function isRobot()
	{
		return !empty($this->data['robot']);
	}
}
