"use strict";

(function ($) {
  $("document").ready(function () {
    $("head").append(
      `<style>
      .brandy-site-product-template 
      .brandy-site-product-template__thumbnail-group 
      .wc-block-components-product-button .wp-block-woocommerce-product-button::before {
        background-image: url(${
          window.brandySitesData.urls.assets + "/images/plus-icon.png"
        })
      }
      </style>`
    );
  });
})(window.jQuery);
