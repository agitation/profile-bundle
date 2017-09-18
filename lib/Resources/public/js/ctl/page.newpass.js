$(document).ready(function(){
    var
        page = new ag.ui.ctxt.Page({
            reset : new ag.ui.ctxt.View({
                h : new ag.ui.elem.Title(ag.intl.t("Password update")),
                main : new ag.ui.ctxt.Container({
                    msg : new ag.ui.elem.Callout(ag.intl.t("If you have forgotten your password, please enter your e-mail address and a new password. You will receive an e-mail with instructions for resetting your password.")),
                    form : new ag.profile.Form(
                        {
                            email : new ag.ui.elem.FormRow(ag.intl.t("E-mail"), new ag.ui.field.Text()),
                            password : new ag.ui.elem.FormRow(ag.intl.t("New password"), new ag.ui.field.Password()),
                        },
                        "profile.v1/Password.reset",
                        function(res, status) { if (status === 200) ag.srv("state").switchTo("/thanks"); },
                        ag.ui.tool.tpl("agitprofile-form", ".form-footer")
                    )
                })
            }),

            thanks : new ag.ui.ctxt.View({
                h : new ag.ui.elem.Title(ag.intl.t("Password update")),
                main : new ag.ui.ctxt.Container({
                    msg : new ag.ui.elem.Callout(ag.intl.t("A confirmation e-mail has been sent. Please check your inbox for further instructions."))
                })
            }),

            confirm : new ag.ui.ctxt.View({
                h : new ag.ui.elem.Title(ag.intl.t("Password update")),
                main : new ag.ui.ctxt.Container({
                    handler : new ag.trigger.TriggerHandler(
                        ag.intl.t("Updating your password, please wait."),
                        ag.intl.t("Your password has been updated successfully.")
                    )
                })
            }),
        });

    page.initialize();
});
