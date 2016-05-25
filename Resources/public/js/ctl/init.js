$(document).ready(function() {
    var
        ind = new ag.ui.elem.OverlayIndicator(window),
        msgH = new ag.ui.elem.Modal();

    ag.srv("state", new ag.ui.ctxt.State());
    ag.srv("messageHandler", msgH);
    ag.srv("indicator", ind);
    ag.srv("api", new ag.api.Api(ind, msgH));
});
