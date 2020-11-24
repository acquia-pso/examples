// Scenario 1 - Demo test to create an article content as administrator

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
var timestamp = today.toLocaleTimeString('en-US', {
    hour12: true,
    hour: "numeric",
    minute: "numeric"
});

today = mm + '/' + dd + '/' + yyyy;

var articleTitle = today + ' ' + timestamp + ' ' + 'Test Article Scenario 1';


module.exports = {


    'Step 1 - Visit the homepage and login as administrator and Create an Article': function (browser) {
        var login = browser.page.login();
        login.navigate()
            .StagingSite(browser);
        browser
            .click('a.toolbar-icon.toolbar-icon-system-admin-content')
            .waitForElementVisible('body')
            .verify.elementPresent('h1')
            .assert.containsText('h1', 'Content')
            .click('link text', 'Add content')
            .click('partial link text', 'Article')
            .waitForElementVisible('body')
            .pause(2000)
            .assert.containsText('h1', 'Create Article')
            .setValue('input#edit-title-0-value', articleTitle)
            .click('input.button[value=Save]')
            .waitForElementVisible('body')
            .click('link text', articleTitle)
    },
};
