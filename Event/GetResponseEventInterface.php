<?php

namespace Softspring\ExtraBundle\Event;

use Softspring\CoreBundle\Event\GetResponseEventInterface as CoreGetResponseEventInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface GetResponseEventInterface
 *
 * @deprecated Use Softspring\CoreBundle\Event\GetResponseEventInterface
 */
interface GetResponseEventInterface extends CoreGetResponseEventInterface
{
    /**
     * @return Response|null
     */
    public function getResponse(): ?Response;
}