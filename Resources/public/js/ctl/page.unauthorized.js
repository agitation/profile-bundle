$(document).ready(function(){

    var $page = new ag.ui.ctxt.Page(
        agit.intl.t("Login"), {
            form : new ag.ui.elem.ApiForm(
                "profile.v1/Session.login",
                [
                    new ag.ui.elem.FormRow("email", agit.intl.t("E-mail"), new ag.ui.field.Text()),
                    new ag.ui.elem.FormRow("password", agit.intl.t("Password"), new ag.ui.field.Password()),
                ],
                new ag.ui.elem.FormFooter(),
                function(res, status) { status === 200 && location.reload(); }
            )
        });

    $page.initialize();
});
