Feature: Adding to the list
    In order to be a member of community
    As a visitor
    I want to register my info

    Scenario: Displaying the form
        When I am on the homepage
        Then I should see "Write a brief bio, what do you do, where do you work, etc." in the form area
        Then I should see "Where are you from?" in the form area
        Then I should see "Where do you live?" in the form area
        Then I should see "Your website/twitter/facebook (optional)" in the form area
        And I should see "Add me to the list!" in the form area

    Scenario: Sending the form
        Given I am on the homepage
        When I fill member form
        And press submit
        Then I should see "test" in the people list

    Scenario: Sending incomplete form
        Given I am on the homepage
        When I fill in "member_bio" with "Something about me"
        And press submit
        Then I should see "Please connect with Facebook account"

    @wip
    Scenario: Trying to register user already in the list
        Given I am on the homepage
        And there are community members:
        | name   | age | fb_id     | bio | homeland | occupancy |
        | Michal | 13  | 755560893 | xyz | Romania  | UK        |
        When I try to register duplicate of "755560893"
        Then new member should not be added