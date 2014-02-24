Feature: Adding to the list
    In order to be a member of community
    As a visitor
    I want to register my info

    @wip
    Scenario: Displaying the form
        When I am on the homepage
        Then I should see "short info" in the ".new-member-form" element
        And I should see "country" in the ".new-member-form" element
        And I should see "current country" in the ".new-member-form" element
        And I should see "Add me to the list!" in the ".new-member-form" element

    @wip
    Scenario: Disabling "Add me to the list!" button
        When I am on the homepage
        And I have not filled the form
        Then "Add me to the list!" button is disabled and gray

    @wip
    Scenario: Enabling "Add me to the list!" button
        When I am on the homepage
        And I have filled the form
        Then "Add me to the list!" button is enabled

    Scenario: Sending the form
        Given I am on the homepage
        When I fill in "member_bio" with "test"
        When I fill in "member_homeland" with "test"
        When I fill in "member_occupancy" with "test"
        And press "member_submit"
        Then I should see "You were added"