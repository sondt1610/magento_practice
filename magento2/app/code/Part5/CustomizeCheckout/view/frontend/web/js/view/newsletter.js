define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Part5_CustomizeCheckout/newsletter'
            },
            isRegisterNewsletter: true
        });
    }
);