<?php if ( isset($_SESSION['accessToken']) && @$_GET['page'] !== "create-topic" ): ?>
  <a href="create-topic" class="tt-btn-create-topic" title="create topic">
      <span class="tt-icon">
          <svg>
            <use xlink:href="#icon-create_new"></use>
          </svg>
      </span>
  </a>
<?php endif; ?>
