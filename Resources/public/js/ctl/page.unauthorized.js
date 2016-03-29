$(document).ready(function(){

    var $page = new agit.context.Page(
        agit.intl.t("Login"), {
            form : new agit.elem.ApiForm(
                "profile.v1/Session.login",
                [
                    new agit.elem.FormRow("email", agit.intl.t("E-mail"), new agit.field.Text()),
                    new agit.elem.FormRow("password", agit.intl.t("Password"), new agit.field.Password()),
                ],
                new agit.elem.FormFooter(),
                function(res) { res.success && location.reload(); }
            )
        });

    $page.init();
});
