<?php

namespace SV\LimitBots\SV\SearchImprovements\Repository;

use SV\LimitBots\XF\Session\Session as ExtendedSession;
use function max;

/**
 * @extends \SV\SearchImprovements\Repository\Search
 */
class Search extends XFCP_Search
{
    public function getSearchLimit(): int
    {
        if (!\XF::visitor()->user_id)
        {
            /** @var ExtendedSession $session */
            $session = \XF::session();
            if ($session->isRobot(false))
            {
                return max(20,  \XF::options()->svMaximumSearchResultsBots ?? 50);
            }
        }

        return parent::getSearchLimit();
    }
}