<?php

namespace SV\LimitBots\XF\Repository;

/**
 * @Extends \XF\Repository\SessionActivity
 */
class SessionActivity extends XFCP_SessionActivity
{
    public function updateSessionActivity($userId, $ip, $controller, $action, array $params, $viewState, $robotKey)
    {
        if ($robotKey || !$userId)
        {
            // only sample non-member/robot session activity
            $threshold = \XF::options()->svSampleNonUserSessionActivity ?? null;
            if ($threshold !== null)
            {
                $threshold = (int)$threshold;
                if ($threshold <= 0)
                {
                    return;
                }
                if ($threshold < 100 && \mt_rand(0, 100) < $threshold)
                {
                    return;
                }
            }
        }

        parent::updateSessionActivity($userId, $ip, $controller, $action, $params, $viewState, $robotKey);
    }
}