# Behat Examples

[Behat](https://behat.org/en/latest/) is an open source Behavior-Driven Development (BDD) framework for PHP. It is a tool to support you in delivering software that matters through continuous communication, deliberate discovery and test-automation.

This repository contains a working FeatureContext.php file that is intended to jumpstart a project's Behat testing process for Drupal 8. It goes above and beyond what the [Drupal Extension](https://behat-drupal-extension.readthedocs.io/en/3.1/) provides.

Contained in the file are many examples of simple tests that can be used as part of a continuous integration process to test Drupal configuration.

Note that many of these tests are simple to the point of being not useful in a real world scenario. They are intended to demonstrate how core Drupal APIs can be used in a Behat context to facilitate testing.

## Additional Reading

* [Feature Context Overview](http://behat.org/en/latest/user_guide/context.html)
* [Automated Testing with BLT](https://docs.acquia.com/blt/developer/testing)


## Included Examples

The following is an inventory of examples included in the FeatureContext file:

### Entity Examples

#### Existence Tests

These tests are intended to check if a particular entity / bundle exists before doing testing on that entity.

* Examples:
   * Given the :arg1 content type exists
   * Given the :arg1 media type exists
   * Given the :arg1 paragraph type exists
   * Given the :arg1 block_content type exists

#### Field Presence Tests

This tests checks for the presence of a field on a given entity bundle.

* Examples:
   * Then the field "body" is present on the "blog" "node" type
   * Then the field "body" is present on the "hero" "block_content" type
   * Then the field "body" is present on the "slide" "paragraph" type
   * Then the field "body" is present on the "image" "media" type
   * Then the field "body" is present on the "tag" "vocabulary" type 

#### Field Required / Not Required Tests 

This test checks if a field is required (or not) on a given entity bundle.

* Examples:
   * Then the field "body" is required on the "blog" "node" type
   * Then the field "body" is required on the "hero" "block_content" type
   * Then the field "body" is required on the "slide" "paragraph" type
   * Then the field "body" is required on the "image" "media" type
   * Then the field "body" is required on the "tag" "vocabulary" type
   * Then the field "body" is not required on the "blog" "node" type
   * Then the field "body" is not required on the "hero" "block_content" type
   * Then the field "body" is not required on the "slide" "paragraph" type
   * Then the field "body" is not required on the "image" "media" type
   * Then the field "body" is not required on the "tag" "vocabulary" type
    
#### Field Reference Tests

This test checks the entity bundle an entity reference field references.

* Examples:
   * Then the field "categories" on the "blog" "node" type allows references to "categories"
   * Then the field "categories" on the "hero" "block_content" type allows references to "categories"
   * Then the field "categories" on the "slide" "paragraph" type allows references to "categories"
   * Then the field "categories" on the "image" "media" type allows references to "categories"
   * Then the field "categories" on the "tag" "vocabulary" type allows references to "categories"


#### Field Visible / Not Visible on Display Mode Tests

This test confirms if a field is or is not visible on a particular display mode for a given entity bundle.

* Examples:
   * Then the display "teaser" on the "blog" "node" type should display the "field_status" field
   * Then the display "teaser" on the "hero" "block_content" type should display the "field_status" field
   * Then the display "teaser" on the "slide" "paragraph" type should display the "field_status" field
   * Then the display "teaser" on the "image" "media" type should display the "field_status" field
   * Then the display "teaser" on the "tag" "vocabulary" type should display the "field_status" field
   * Then the display "teaser" on the "blog" "node" type should not display the "field_status" field
   * Then the display "teaser" on the "hero" "block_content" type should not display the "field_status" field
   * Then the display "teaser" on the "slide" "paragraph" type should not display the "field_status" field
   * Then the display "teaser" on the "image" "media" type should not display the "field_status" field
   * Then the display "teaser" on the "tag" "vocabulary" type should not display the "field_status" field
   
#### Cardinality Tests

This test confirms the cardinality of a given field on a given bundle.

* Examples:
   * The field "categories" on the "node" bundle has a cardinality of "-1".
   * The field "categories" on the "block_content" bundle has a cardinality of "-1".
   * The field "categories" on the "paragraph" bundle has a cardinality of "-1".
   * The field "categories" on the "media" bundle has a cardinality of "-1".
   * The field "categories" on the "vocabulary" bundle has a cardinality of "-1".

#### Field Length Tests

This tests confirms the maximum length of a given field on a given entity bundle.

* Examples:
   * The field "title" on the "node" bundle has a maximum length of "100"
   * The field "title" on the "block_content" bundle has a maximum length of "100"
   * The field "title" on the "paragraph" bundle has a maximum length of "100"
   * The field "title" on the "media" bundle has a maximum length of "100"
   * The field "title" on the "vocabulary" bundle has a maximum length of "100"

### Permission Examples

#### Specific Role Permission Tests

These tests check for a specific role and if it does or does not have a permission. Note that this can be done in tabular format or on an individual basis. 

All permissions illustrated here can be located in the config file for a given role.

* Examples:
   * Given the following roles have these permissions:
     * | role                  | permission                                  |
     * | anonymous             | access content                              |
     * | authenticated         | access content                              |
     * | reviewer              | use content_workflow transition ready_ready |
   * Given the following roles do not have these permissions:
      * | role                  | permission                                  |
      * | anonymous             | access content                              |
      * | authenticated         | access content                              |
      * | reviewer              | use content_workflow transition ready_ready |
   * Then the "reviewer" role has permission to "access content"
   * Then the "reviewer" role does not have permission to "access content"
   
   
#### Exclusionary Permission Tests

These tests check to ensure that ONLY the specifically defined roles (and the admin role) can act on the permission.

* Examples:
   * Given that only the following roles have content permissions for the :arg1 content type:
      * | role                    | permission |
      * | author           	     | create     |
      * | author           	     | edit own   |
      * | editor           	     | edit any   |
      * | content_administrator   | create     |
      * | content_administrator	 | edit own   |
      * | content_administrator	 | edit any   | 

### Helper Commands

These commands don't necessarily "test" functionality, but they can be used to aid in testing other functions.

#### Visit Last Created Node / Media

After creating a node / media item, navigate to it in the session's browser.

* Examples:
   * Then I visit the last created node.
   * Then I visit the last created media.
   
#### Verify access to URL
   
Verify user has access to particular URL
   
* Examples:
   * Then I should have access to "<URL>"
   * Then I should not have access to "<URL>"
   
#### Assert Page title
   
Verify page title
   
* Examples:
  * Then the page title should be "<TITLE>"