<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class GetResponseEvent extends Event implements GetResponseEventInterface
{
    use GetResponseTrait;
}