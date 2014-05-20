<?php

namespace TheCometCult\CommunityBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext;

class VisitorContext extends MinkContext
{
    /**
     * @Then /^I should see "([^"]*)" in the form area$/
     */
    public function iShouldSeeInTheFormArea($content)
    {
        $this->assertElementContains('form[name="member"]', $content);
    }

    /**
     * @Then /^I should see "([^"]*)" in the people list$/
     */
    public function iShouldSeeInThePeopleList($content)
    {
        $this->assertElementContains('.people', $content);
    }

    /**
     * @Then /^I should be on the about page$/
     */
    public function iShouldBeOnTheAboutPage()
    {
        $this->assertPageAddress('about/');
    }

    /**
     * @Given /^I am on the about page$/
     */
    public function iAmOnTheAboutPage()
    {
        $this->visit('about/');
    }

    /**
     * @Then /^I should see "([^"]*)" in the community counter$/
     */
    public function iShouldSeeInTheCommunityCounter($content)
    {
        $this->assertElementContains('.home .description h2', $content);
    }

    protected function getContainer()
    {
        return $this->getMainContext()->getContainer();
    }

    /**
     * @When /^I fill member form$/
     */
    public function iFillMemberForm()
    {
        $this->getSession()->getPage()->findById('member_fbId')->setValue('test');
        $this->getSession()->getPage()->findById('member_name')->setValue('test');
        $this->getSession()->getPage()->findById('member_age')->setValue('10');
        $this->fillField('member_bio', 'test');
        $this->fillField('member_homeland', 'test');
        $this->fillField('member_occupancy', 'test');
    }

    /**
     * @Given /^press submit$/
     */
    public function pressSubmit()
    {
        $this->pressButton('member_submit');
    }
}