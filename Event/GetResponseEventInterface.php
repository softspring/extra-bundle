<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Component\HttpFoundation\Response;

interface GetResponseEventInterface
{
    /**
     * @return Response|null
     */
    public function getResponse(): ?Response;
}