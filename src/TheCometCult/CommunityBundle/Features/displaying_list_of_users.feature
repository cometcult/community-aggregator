Feature: Displaying list of users
    In order to learn about community
    As a visitor
    I want to see list of users

    Background:
        Given there are community members:
        | name   | age | fb_id     | bio | homeland | occupancy |
        | Michal | 13  | 755560893 | xyz | Romania  | UK        |
        | Karol  | 7   | 755560892 | xxx | Romania  | Poland    |
        | Jacek  | 35  | 755560891 | abc | Bulgaria | Norway    |

    Scenario: Displaying overall number
        When I am on homepage
        Then I should see "3" in the community counter

    Scenario: Displaying members list
        When I am on homepage
        Then I should see "Michal, 13" in the people list
        And I should see "Karol, 7" in the people list
        And I should see "Jacek, 35" in the people list

    Scenario Outline: Displaying users's info
        When I am on homepage
        Then I should see "<name>, <age>" in the people list
        And I should see "<bio>" in the people list
        And I should see "<occupancy>" in the people list
        And I should see "From: <homeland>" in the people list

        Examples:
        | name   | age | fb_id     | bio | homeland | occupancy |
        | Michal | 13  | 755560893 | xyz | Romania  | UK        |
        | Karol  | 7   | 755560892 | xxx | Romania  | Poland    |
        | Jacek  | 35  | 755560891 | abc | Bulgaria | Norway    |
