ag.ns("ag.profile");

(function(){

var NavigationLogout = function()
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

NavigationLogout.prototype = Object.create(ag.ui.elem.NavigationItem.prototype);

ag.profile.NavigationLogout = NavigationLogout;

})();
