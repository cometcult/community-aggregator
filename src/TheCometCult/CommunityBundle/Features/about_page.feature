Feature: About page
    In order to learn about the project
    As a visitor
    I want to see the about information page

    Scenario: Getting to the about page
        Given I am on homepage
        When I follow "About"
        Then I should be on the about page

    Scenario: Submitting membership from about
        Given I am on the about page
        When I fill member form
        And press submit
        Then I should be on homepage
        And I should see "test" in the people list