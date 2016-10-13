$(document).ready(function(){
    var
        form = new ag.ui.elem.Form({
                email : new ag.ui.elem.FormRow(ag.intl.t("E-mail"), new ag.ui.field.Text()),
                password : new ag.ui.elem.FormRow(ag.intl.t("Password"), new ag.ui.field.Password()),
            },
            "profile.v1/Session.login",
            function(res, status) { status === 200 && location.reload(); }
        ),

        page = new ag.ui.ctxt.Page({
            login : new ag.ui.ctxt.View({
                h : new ag.ui.elem.Heading(ag.intl.t("Login required")),
                form : form
            })
        });

    form.on("submit", function(ev){
        // show an extra indicator so it keeps running until the page actually reloads
        ag.srv("indicator").start();
    });

    page.initialize();
});
