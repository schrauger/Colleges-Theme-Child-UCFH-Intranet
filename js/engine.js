/**
 * Created by stephen on 8/29/18.
 */

// Load Typekit font handler.
// Note: engine.js enqueue requires TypeKit enqueue to be done first.
try{Typekit.load();}catch(e){}

// Fancybox calls
jQuery( document ).ready(function($) {

    $('.accordion-container').accordion({
        header: '> div.accordion > span.accordion-title',
        active: false, // start with all collapsed
        collapsible: true, // allow all to be closed
        heightStyle: "content", // variable height based on inner content
    });

});