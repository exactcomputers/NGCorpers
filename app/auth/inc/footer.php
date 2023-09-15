<footer class="position-absolute right-0 bottom-0 text-center pr-4">
      <div class="container">
          <ul class="row quicklinks">
              <li><a href="javascript:;" onclick="getModalShow('adverts')">Advertisement</a></li>
              <li><a href="javascript:;" onclick="getModalShow('terms-of-service')">Terms of Service</a></li>
              <!-- <li><a href="https://exactcomputers.com.ng" target="_blank">Exactcomputers</a></li> -->
              <li><a href="javascript:;" onclick="getModalShow('privacy')">Privacy</a></li>
          </ul>
      </div>
      </footer>
      <!--/footer-->
      <?php include 'footer-modal.php'; ?>
    </div>
   </div>
</main>
<!-- ========== END MAIN ========== -->


<!-- JS Implementing Plugins -->
<script src="<?=AUTH?>assets/js/vendor.min.js"></script>
<!-- JS NGCorpers -->
<script src="<?=AUTH?>assets/js/nc.min.js"></script>
<script src="<?=AUTH?>assets/js/index.js"></script>

<!-- JS Plugins Init. -->
<script>
  $(document).on('ready', function () {
    // INITIALIZATION OF SLICK CAROUSEL
    // =======================================================
    $('.js-slick-carousel').each(function() {
      var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
    });

    // INITIALIZATION OF FORM VALIDATION
    // =======================================================
    // $('.js-validate').each(function (e) {
    //   e.preventDefault();
    //   var validation = $.HSCore.components.HSValidation.init($(this));
    // });


      // INITIALIZATION OF FORM VALIDATION
      // =======================================================
      // $('.js-validate').each(function(e) {
      //   e.preventDefault();
      //   $.HSCore.components.HSValidation.init($(this), {
      //     rules: {
      //       confirmPassword: {
      //         equalTo: '#signupPassword'
      //       }
      //     }
      //   });
      // });
  });
</script>

<!-- IE Support -->
<script>
  if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?=AUTH?>assets/vendor/babel-polyfill/dist/polyfill.js"><\/script>');
</script>
</body>
</html>
