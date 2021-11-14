<?php
/**
 * @noinspection PhpMissingReturnTypeInspection
 */

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

	public function isRobot(bool $checkVisitor = true): bool
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

            if (($options->svCountGuestViews ?? true) && !$visitor->user_id)
            {
                return false;
            }
            else if ($options->svZeroPostUsersAsBots ?? true)
            {
                if (!$visitor->message_count)
                {
                    return true;
                }
                if ($visitor->reaction_score <= 0)
                {
                    return true;
                }
            }
        }

		return false;
	}
}
