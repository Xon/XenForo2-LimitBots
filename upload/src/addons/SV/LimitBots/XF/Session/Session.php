<?php

namespace SV\LimitBots\XF\Session;

class Session extends XFCP_Session
{
	public function save()
	{
		if (!$this->isRobot(false))
		{
			return parent::save();
		}

		return false;
	}

    /**
     * @param bool $checkVisitor
     * @return bool
     */
	public function isRobot($checkVisitor = true)
	{
	    if (!empty($this->data['robot']))
        {
            return true;
        }

	    if ($checkVisitor)
        {
            $visitor = \XF::visitor();
            if ($visitor->is_banned)
            {
                return true;
            }

            $options = \XF::options();

            if ($options->svCountGuestViews && !$visitor->user_id)
            {
                return false;
            }
            else if ($options->svZeroPostUsersAsBots)
            {
                if (!$visitor->message_count || !$visitor->like_count)
                {
                    return true;
                }
            }
        }

		return false;
	}
}
