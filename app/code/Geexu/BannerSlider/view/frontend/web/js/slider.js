

define(['uiComponent', 'jquery','slick'],
    function (Component, $) {
        'use strict';
        return Component.extend({
            initialize: function (config, node) {
                $(node).slick(config);
            }
        });
    });