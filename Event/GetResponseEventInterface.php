<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface GetResponseEventInterface
 *
 * @deprecated Use Softspring\CoreBundle\Event\GetResponseEventInterface
 */
interface GetResponseEventInterface
{
    /**
     * @return Response|null
     */
    public function getResponse(): ?Response;
}