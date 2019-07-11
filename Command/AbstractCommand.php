<?php

namespace Softspring\ExtraBundle\Command;

use Softspring\ExtraBundle\Controller\Traits\DoctrineShortcutsTrait;
use Softspring\ExtraBundle\Controller\Traits\GetDoctrineTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractCommand extends Command implements ContainerAwareInterface
{
    use GetDoctrineTrait;
    use DoctrineShortcutsTrait;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @inheritDoc
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}