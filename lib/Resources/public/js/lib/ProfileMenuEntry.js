ag.ns("ag.profile");

(function(){

var
    profileMenuEntry = function(pages)
    {
        this.extend(this, ag.ui.tool.tpl("agitprofile-menu", ".profile"));

        this.find(".logout").click(function(){
            ag.srv("api").doCall("profile.v1/Session.logout", null, function(result, status){
                if (status === 200)
                {
                    // show an extra indicator so it keeps running until the page actually reloads
                    ag.srv("indicator").start();
                    location.reload();
                }
            });
        });
    };

profileMenuEntry.prototype = Object.create(ag.ui.elem.MenuEntry.prototype);

ag.profile.ProfileMenuEntry = profileMenuEntry;

})();
