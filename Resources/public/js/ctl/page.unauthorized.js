$(document).ready(function(){

    var $page = new agit.context.Page(
        agit.intl.L10n.t("Login"), {
            form : new agit.elem.ApiForm(
                "profile.v1/Session.login",
                [
                    new agit.elem.FormRow("email", agit.intl.L10n.t("E-mail"), new agit.field.Text()),
                    new agit.elem.FormRow("password", agit.intl.L10n.t("Password"), new agit.field.Password()),
                ],
                new agit.elem.FormFooter(),
                function(res) { res.success && location.reload(); }
            )
        });

    $page.init();
});
