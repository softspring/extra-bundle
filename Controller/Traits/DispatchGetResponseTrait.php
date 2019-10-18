<?php

namespace Softspring\ExtraBundle\Controller\Traits;

use Softspring\CoreBundle\Event\GetResponseEventInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Trait DispatchGetResponseTrait
 *
 * @deprecated Use Softspring\CoreBundle\Controller\Traits\DispatchGetResponseTrait instead
 */
trait DispatchGetResponseTrait
{
    /**
     * @param string                          $eventName
     * @param GetResponseEventInterface|Event $event
     *
     * @return null|Response
     */
    protected function dispatchGetResponse(string $eventName, GetResponseEventInterface $event): ?Response
    {
        $this->get('event_dispatcher')->dispatch($event, $eventName);

        if ($event->getResponse()) {
            return $event->getResponse();
        }

        return null;
    }
}