<?php

namespace Softspring\ExtraBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class GetResponseEvent extends Event implements GetResponseEventInterface
{
    use GetResponseTrait;
}