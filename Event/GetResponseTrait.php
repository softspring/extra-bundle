<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Component\HttpFoundation\Response;

/**
 * Trait GetResponseTrait
 *
 * @deprecated Use Softspring\CoreBundle\Event\GetResponseTrait
 */
trait GetResponseTrait
{
    /**
     * @var Response|null
     */
    protected $response;

    /**
     * @return Response|null
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }

    /**
     * @param Response|null $response
     */
    public function setResponse(?Response $response): void
    {
        $this->response = $response;
    }
}