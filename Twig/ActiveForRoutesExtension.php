<?php

namespace Softspring\ExtraBundle\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ActiveForRoutesExtension extends AbstractExtension
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * ClassToolsExtension constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('activeForRoutes', [$this, 'activeForRoutes']),
        ];
    }

    /**
     * Replaces twig compare function for adding "active" class:
     *      app.request.attributes.get('_route') starts with 'admin_dashboard' ? 'active': ''
     *
     * @param string    $routesStartsWith
     * @param bool|null $andCondition
     * @param string    $class
     * @return string
     */
    public function activeForRoutes(string $routesStartsWith, bool $andCondition = null, string $class = 'active'): string
    {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            return '';
        }

        $route = $request->attributes->get('_route');

        if (preg_match("/^$routesStartsWith/i", $route) || preg_match("/^admin_$routesStartsWith/i", $route)) {
            return $andCondition === null || $andCondition === true ? $class : '';
        }

        return '';
    }
}