"use strict";

(function ($) {
  $("document").ready(function () {
    $("head").append(
      `<style>
      .brandy-halloween-product-group
      [data-block-name="woocommerce/product-button"] button::before {
        background-image: url(${
          window.brandySitesData.urls.assets + "/images/plus-icon.png"
        })
      }
      </style>`
    );
  });
})(window.jQuery);
