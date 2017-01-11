$(document).ready(function(){
    var
        indicator = ag.srv("indicator"),

        form = new ag.profile.Form({
                email : new ag.ui.elem.FormRow(ag.intl.t("E-mail"), new ag.ui.field.Text()),
                password : new ag.ui.elem.FormRow(ag.intl.t("Password"), new ag.ui.field.Password()),
            },

            "profile.v1/Session.login",

            function(res, status) {
                if (status === 200)
                    location.reload();
                else
                    indicator.finish();
            },

            ag.ui.tool.tpl("agitprofile-unauthorized", ".form-footer")
        ),

        page = new ag.ui.ctxt.Page({
            login : new ag.ui.ctxt.View({
                h : new ag.ui.elem.Title(ag.intl.t("Login required")),
                form : form
            })
        });

    form.on("submit", function(){
        // show an extra indicator so it keeps running until the page actually reloads
        indicator.start();
    });

    page.initialize();
});
