<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class GetResponseEvent
 *
 * @deprecated Use Softspring\CoreBundle\Event\GetResponseEvent
 */
class GetResponseEvent extends Event implements GetResponseEventInterface
{
    use GetResponseTrait;
}