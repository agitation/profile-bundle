$(document).ready(function(){

    var $page = new ag.ui.ctxt.Page({
        login : new ag.ui.ctxt.View({
            form : new ag.ui.elem.ApiForm(
                "profile.v1/Session.login",
                [
                    new ag.ui.elem.FormRow("email", ag.intl.t("E-mail"), new ag.ui.field.Text()),
                    new ag.ui.elem.FormRow("password", ag.intl.t("Password"), new ag.ui.field.Password()),
                ],
                new ag.ui.elem.FormFooter(),
                function(res, status) { status === 200 && location.reload(); }
            )
        })
    });

    $page.initialize();
});
