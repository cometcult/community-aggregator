Feature: Displaying list of users
    In order to learn about community
    As a visitor
    I want see list of users

    Background:
        Given there are community members:
        | name   | age | fb_id     | bio | homeland | occupancy |
        | Michal | 13  | 755560893 | xyz | Romania  | UK        |
        | Karol  | 7   | 755560892 | xxx | Romania  | Poland    |
        | Jacek  | 35  | 755560891 | abc | Bulgaria | Norway    |

    Scenario: Displaying overall number
        When I am on homepage
        Then I should see "3" in the ".members-counter" element

    Scenario: Displaying members list
        When I am on homepage
        Then I should see "Michal" in the ".members-list" element
        And I should see "Karol" in the ".members-list" element
        And I should see "Jacek" in the ".members-list" element

    @wip
    Scenario Outline: Displaying users's info
        When I am on the homepagege
        And I hover on <profile picture>
        Then I can see <name>, <age>
        And I can see <bio>
        And I can see <country>
        And I can see From: <living country>

        Examples:
        | name  | age | profile picture | bio | country  | living country |
        | Nico  | 13  | nico.jpg        | xyz | Romania  | UK             |
        | Karol | 7   | karol.jpg       | xxx | Romania  | Poland         |
        | Jacek | 35  | jacek.jpg       | abc | Bulgaria | Norway         |