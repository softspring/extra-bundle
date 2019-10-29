<?php

namespace Softspring\ExtraBundle\Http;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class HttpRedirectException
 *
 * @deprecated
 */
class HttpRedirectException extends HttpException
{
    /**
     * @var RedirectResponse
     */
    protected $response;

    /**
     * HttpRedirectException constructor.
     * @param RedirectResponse $response
     */
    public function __construct(RedirectResponse $response)
    {
        parent::__construct($response->getStatusCode());
        $this->response = $response;
    }

    /**
     * @return RedirectResponse
     */
    public function getResponse(): RedirectResponse
    {
        return $this->response;
    }
}