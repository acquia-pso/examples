@api @blocks @content
Feature: Example Tests for Block Content

  Scenario: Hero block content type has necessary field settings.
    Given the "hero" block_content type exists
    Then the "body" field is present on the "hero" "block_content" type
    And the field "image" is present on the "hero" "block_content" type
    And the field "body" is required on the "hero" "block_content" type
    And the field "image" on the "hero" "block_content" type allows references to "image"
    And the display "teaser" on the "hero" "block_content" type should display the "body" field
    And field "body" on the "block_content" bundle has a cardinality of "-1".

  @user @permissions
  Scenario: User permissions for the Hero block content type are accurate
    Given the following roles have these permissions:
      | role                  | permission                                  |
      | anonymous             | access content                              |
      | authenticated         | access content                              |
      | reviewer              | use content_workflow transition ready_ready |