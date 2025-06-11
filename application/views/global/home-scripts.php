<!-- slider revolution core javaScript files -->
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- slider revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!-- Slider Revolution add on files -->
<script
  type="text/javascript"
  src="/assets/site-assets/revolution/revolution-addons/particles/js/revolution.addon.particles.min.js?ver=1.0.3"></script>
<!-- Slider Revolution add on files -->
<script
  type="text/javascript"
  src="/revolution/revolution-addons/particles/js/revolution.addon.particles.min.js?ver=1.0.3"></script>
<!-- Slider's main "init" script -->
<script type="text/javascript">
  /* https://learn.jquery.com/using-jquery-core/document-ready/ */
  jQuery(document).ready(function() {
    /* initialize the slider based on the Slider's ID attribute from the wrapper above */
    jQuery("#pizza-parlor-slider")
      .show()
      .revolution({
        sliderType: "standard",
        /* sets the Slider's default timeline */
        delay: 9000,
        /* options are 'auto', 'fullwidth' or 'fullscreen' */
        sliderLayout: "fullwidth",
        /* RESPECT ASPECT RATIO */
        autoHeight: "off",
        /* options that disable autoplay */
        stopLoop: "on",
        stopAfterLoops: 0,
        stopAtSlide: 1,
        parallax: {
          type: "mouse+scroll",
          origo: "slidercenter",
          speed: 400,
          levels: [
            2, 4, 6, 8, 10, 12, 14, 16, 45, 46, 47, 48, 49, 50, 51, 55,
          ],
          disable_onmobile: "on",
        },
        /* Lazy Load options are "all", "smart", "single" and "none" */
        lazyType: "smart",
        spinner: "spinner0",
        /* DISABLE FORCE FULL-WIDTH */
        fullScreenAlignForce: "off",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        responsiveLevels: [1240, 1024, 778, 480],
        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        gridwidth: [1240, 1024, 778, 480],
        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        gridheight: [1276, 1000, 960, 720],
        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
        visibilityLevels: [1240, 1024, 1024, 480],
        fallbacks: {
          simplifyAll: "on",
          nextSlideOnWindowFocus: "off",
          disableFocusListener: false,
        },
      });
  });
</script>
<script type="text/javascript" src="/assets/site-assets/js/main.js"></script>