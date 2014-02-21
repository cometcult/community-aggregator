<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext;

class VisitorContext extends MinkContext
{
	protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }
}