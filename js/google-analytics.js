/**
 * Created by stephen on 7/31/17.
 */
// Used by google analytics to track every page (this is different from google tag manager)
// https://analytics.google.com/analytics/web/?authuser=3#management/Settings/a23626514w50598311p51212540/%3Fm.page%3DTrackingCode/
// Google analytics (medicus account) ->  UCF Health App/Property -> Admin -> Tracking Info -> Tracking Code
// Should be placed in the <head or beginning of <body>

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23626514-7', 'auto');
ga('send', 'pageview');
