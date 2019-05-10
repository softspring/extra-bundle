<?php

namespace Softspring\ExtraBundle\Controller\Traits;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

trait DoctrineShortcutsTrait
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
}