const loginCommands = {
    login: function () {
        return this
            .setValue('@userName', process.env.username)
            .setValue('@password', process.env.password)
            .click('@submit');
    },

    StagingSite: function(browser) {
        browser
            .url(browser.globals.staging_site_url)
            .verify.elementPresent('form.user-login-form input#edit-name')
            .verify.elementPresent('form.user-login-form input[id=edit-name]')
            .assert.elementPresent('form.user-login-form input.form-submit')
            .setValue('input[id=edit-name]', process.env.username)
            .setValue('input[id=edit-pass]', process.env.password)
            .click('form.user-login-form input.form-submit')
    },

};

module.exports = {
    commands: [loginCommands],
    elements: {
        userName: "input#edit-name",
        password: "input#edit-pass",
        submit: "input#edit-submit"
    }
};