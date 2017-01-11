ag.ns("ag.profile");

(function(){
var
    form = function(rows, endpoint, callback, footer)
    {
        ag.ui.elem.Form.call(this, rows);

        this.endpoint = endpoint;
        this.callback = callback;
        this.find("table").append(footer);

        this.on("submit", onSubmit.bind(this));
    },

    onSubmit = function(ev)
    {
        var values = {}, self = this;

        Object.keys(self.rows).forEach(function(key) {
            values[key] = self.rows[key].getField().getValue();
        });

        ag.srv("api").doCall(this.endpoint, values, this.callback);

        ev.preventDefault();
    };

form.prototype = Object.create(ag.ui.elem.Form.prototype);

ag.profile.Form = form;

})();
