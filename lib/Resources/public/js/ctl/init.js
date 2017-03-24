$(document).ready(function() {
    var ind = new ag.ui.elem.OverlayIndicator(window),
        msgH = new ag.ui.elem.ModalMessageHandler();

    ag.srv("messageHandler", msgH);
    ag.srv("indicator", ind);
    ag.srv("api", new ag.api.Api(ind, msgH));

    ag.srv("menu", new ag.ui.elem.Menu({
        lang : new ag.ui.elem.LanguageMenuEntry(ag.cfg.languages)
    }));
});
