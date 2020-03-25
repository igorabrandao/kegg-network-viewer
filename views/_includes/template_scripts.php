<?php
/**
 * template_scripts.php
 *
 * Author: igorbrandao
 *
 * All vital JS scripts are included here
 *
 */
?>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php echo HOME_URI;?>/assets/js/vendor/jquery.min.js"></script>
<script src="<?php echo HOME_URI;?>/assets/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo HOME_URI;?>/assets/js/plugins.js"></script>
<script src="<?php echo HOME_URI;?>/assets/js/accessibility-buttons.js"></script>
<script src="<?php echo HOME_URI;?>/assets/js/intro.js"></script>
<script src="<?php echo HOME_URI;?>/assets/js/app.js"></script>


<script type="text/javascript">
    /* GOOGLE TRANSLATE COMPONENT */
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }

    function triggerHtmlEvent(element, eventName) {
        var event;
        if (document.createEvent) {
            event = document.createEvent('HTMLEvents');
            event.initEvent(eventName, true, true);
            element.dispatchEvent(event);
        } else {
            event = document.createEventObject();
            event.eventType = eventName;
            element.fireEvent('on' + event.eventType, event);
        }
    }

    jQuery('.lang-select').click(function() {
        var theLang = jQuery(this).attr('data-lang');
        jQuery('.goog-te-combo').val(theLang);

        //alert(jQuery(this).attr('href'));
        window.location = jQuery(this).attr('href');
        location.reload();
    });
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>