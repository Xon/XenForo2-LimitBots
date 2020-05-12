<?php

namespace SV\LimitBots\XF\Repository;

/**
 * Extends \XF\Repository\SessionActivity
 */
class SessionActivity extends XFCP_SessionActivity
{
    public function updateSessionActivity($userId, $ip, $controller, $action, array $params, $viewState, $robotKey)
    {
        if ($robotKey || !$userId)
        {
            // only sample non-member/robot session activity
            $options = \XF::options();
            if ($options->offsetExists('svSampleNonUserSessionActivity'))
            {
                $threshold = $options->svSampleNonUserSessionActivity;
                if (!$threshold)
                {
                    return;
                }
                if ($threshold < 1 && \mt_rand(0, 100) < $threshold)
                {
                    return;
                }
            }
        }

        parent::updateSessionActivity($userId, $ip, $controller, $action, $params, $viewState, $robotKey);
    }
}