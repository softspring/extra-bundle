<?php

namespace Softspring\ExtraBundle\Controller;

use Softspring\ExtraBundle\Controller\Traits\DispatchGetResponseTrait;
use Softspring\ExtraBundle\Controller\Traits\DoctrineShortcutsTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SfAbstractController;

abstract class AbstractController extends SfAbstractController
{
    use DispatchGetResponseTrait;
    use DoctrineShortcutsTrait;

    /**
     * @inheritDoc
     */
    public static function getSubscribedServices()
    {
        return array_merge(parent::getSubscribedServices(), ['event_dispatcher']);
    }
}