<?php

namespace Softspring\ExtraBundle\Controller\Traits;

use Softspring\ExtraBundle\Event\GetResponseEventInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;

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
        $this->get('event_dispatcher')->dispatch($eventName, $event);

        if ($event->getResponse()) {
            return $event->getResponse();
        }

        return null;
    }
}