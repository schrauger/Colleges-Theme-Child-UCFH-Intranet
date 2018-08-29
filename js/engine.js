/**
 * Created by stephen on 8/29/18.
 */

// Fancybox calls
jQuery( document ).ready(function($) {

    $('.accordion-container').accordion({
        header: '> div.accordion > span.accordion-title',
        active: false, // start with all collapsed
        collapsible: true, // allow all to be closed
        heightStyle: "content", // variable height based on inner content
    });

});