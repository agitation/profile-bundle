$(document).ready(function() {
    var
        ind = new agit.misc.OverlayIndicator(window),
        msgH = new agit.misc.msgh.Modal();

    agit.srv("state", new agit.context.State());
    agit.srv("messageHandler", msgH);
    agit.srv("indicator", ind);
    agit.srv("api", new agit.common.Api(ind, msgH));
});
