<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\RawMinkContext;

use Doctrine\Common\DataFixtures\Purger\MongoDBPurger;
use Doctrine\Common\DataFixtures\Executor\MongoDBExecutor;

/**
 * Feature context
 */
class FeatureContext extends RawMinkContext implements KernelAwareInterface
{
    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * @BeforeScenario
     */
    public function setUp()
    {
        $dm = $this->getContainer()->get('doctrine_mongodb')->getManager();
        $purger = new MongoDBPurger($dm);
        $executor = new MongoDBExecutor($dm, $purger);
        $executor->purge();
    }

    /**
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->useContext('member', new MemberContext());
        $this->useContext('visitor', new VisitorContext());
        $this->useContext('client', new ClientContext($parameters['base_url']));
    }

    /**
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->kernel->getContainer();
    }
}
