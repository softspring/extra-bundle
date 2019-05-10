<?php

namespace Softspring\ExtraBundle\Controller;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Softspring\ExtraBundle\Event\GetResponseEventInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SfAbstractController;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController extends SfAbstractController
{
    /**
     * @param object $entity
     * @param bool   $flush
     */
    protected function persist($entity, bool $flush = true): void
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);

        if ($flush) {
            $em->flush();
        }
    }

    /**
     * @param object $entity
     * @param bool   $flush
     */
    protected function remove($entity, bool $flush = true): void
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);

        if ($flush) {
            $em->flush();
        }
    }

    /**
     * @param string|null $name
     * @return EntityManagerInterface
     */
    public function getEntityManager(?string $name): EntityManagerInterface
    {
        return $this->getDoctrine()->getManager($name);
    }

    /**
     * @param string      $className
     * @param string|null $managerName
     * @return ObjectRepository
     */
    public function getRepository(string $className, ?string $managerName): ObjectRepository
    {
        return $this->getEntityManager($managerName)->getRepository($className);
    }

    /**
     * @param string                          $eventName
     * @param GetResponseEventInterface|Event $event
     *
     * @return null|Response
     */
    protected function dispatchGetResponse(string $eventName, GetResponseEventInterface $event): ?Response
    {
        $this->get('event_dispatcher')->dispatch($eventName, $event);

        if ($event->getResponse()) {
            return $event->getResponse();
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedServices()
    {
        return array_merge(parent::getSubscribedServices(), ['event_dispatcher']);
    }
}