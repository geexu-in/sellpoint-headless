

var config = {
    paths: {
        'geexu/core/jquery/popup': 'geexu_Core/js/jquery.magnific-popup.min',
        'geexu/core/owl.carousel': 'geexu_Core/js/owl.carousel.min',
        'geexu/core/bootstrap': 'Geexu_Core/js/bootstrap.min',
        mpIonRangeSlider: 'Geexu_Core/js/ion.rangeSlider.min',
        touchPunch: 'Geexu_Core/js/jquery.ui.touch-punch.min',
        mpDevbridgeAutocomplete: 'Geexu_Core/js/jquery.autocomplete.min'
    },
    shim: {
        "geexu/core/jquery/popup": ["jquery"],
        "geexu/core/owl.carousel": ["jquery"],
        "geexu/core/bootstrap": ["jquery"],
        mpIonRangeSlider: ["jquery"],
        mpDevbridgeAutocomplete: ["jquery"],
        touchPunch: ['jquery', 'jquery/ui']
    }
};
