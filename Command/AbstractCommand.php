<?php

namespace Softspring\ExtraBundle\Command;

use Softspring\ExtraBundle\Controller\Traits\DoctrineShortcutsTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AbstractCommand extends Command implements ContainerAwareInterface
{
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