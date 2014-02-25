<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Behat\CommonContexts\WebApiContext;

/**
 * ClientContext
 */
class ClientContext extends WebApiContext
{
    protected $baseUrl;

    /**
     * @param string  $baseUrl base API url
     * @param Browser $browser browser instance (optional)
     */
    public function __construct($baseUrl, Browser $browser = null)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        parent::__construct($baseUrl, $browser);
    }

    /**
     * @When /^I try to register duplicate of "([^"]*)"$/
     */
    public function iTryToRegisterDuplicateOf($fbId)
    {
        $fields = array(
            'member[age]' => 'test',
            'member[bio]' => 'test',
            'member[fbId]' => $fbId,
            'member[homeland]' => 'test',
            'member[name]' => 'test',
            'member[occupancy]' => 'test'
        );
        $method = 'POST';
        $browser = $this->getBrowser();
        $browser->submit($this->baseUrl, $fields, $method, $this->getHeaders());
    }

    protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }
}
