<main id="tt-pageContent" class="tt-offset-small">
  <div class="tt-wrapper-section">
    <div class="container">
      <div class="tt-user-header">
        <div class="tt-col-avatar">
          <div class="tt-icon my-avatar"></div>
        </div>
        <div class="tt-col-title">
          <div class="tt-title">
            <a href="javascript:;" class="my-username"></a>
          </div>
          <!-- <ul class="tt-list-badge">
            <li>
              <a href="#"><span class="tt-color14 tt-badge">LVL : 26</span></a>
            </li>
          </ul> -->
        </div>
        <div class="tt-col-btn">
          <div class="tt-list-btn">
            <a href="javascript:;" class="tt-btn-icon" id="js-settings-btn">
              <svg class="tt-icon">
                <use xlink:href="#icon-settings_fill"></use>
              </svg>
              &nbsp;<span>Settings</span>
            </a>
            <!-- <a href="javascript:;" class="btn btn-primary">Message</a>
            <a href="javascript:;" class="btn btn-secondary">Follow</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="tt-tab-wrapper">
      <div class="tt-wrapper-inner">
        <ul class="nav nav-tabs pt-tabs-default" role="tablist">
          <li class="nav-item show">
            <a
              class="nav-link active"
              data-toggle="tab"
              href="#tt-tab-01"
              role="tab"
              ><span>Activities</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tt-tab-02" role="tab"
              ><span>Threads</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"
              ><span>Replies</span></a
            >
          </li>
          <li class="nav-item tt-hide-md">
            <a class="nav-link" data-toggle="tab" href="#tt-tab-04" role="tab"
              ><span>Badges</span></a
            >
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div
          class="tab-pane tt-indent-none show active"
          id="tt-tab-01"
          role="tabpanel"
        >
          <div class="tt-topic-list" id="activities">
              <div class="tt-list-header">
                  <div class="tt-col-topic">Topic</div>
                  <div class="tt-col-value-large hide-mobile">Category</div>
                  <div class="tt-col-value-large hide-mobile">Status</div>
                  <div class="tt-col-value-large hide-mobile">Activity</div>
              </div>
              <?php include path("src", "tabs/activities"); ?>
          </div>
        </div>
        <div class="tab-pane tt-indent-none" id="tt-tab-02" role="tabpanel">
          <div class="tt-topic-list" id="threads">
            <div class="tt-list-header">
              <div class="tt-col-topic">Topic</div>
              <div class="tt-col-category">Category</div>
              <div class="tt-col-value hide-mobile">Likes</div>
              <div class="tt-col-value hide-mobile">Replies</div>
              <div class="tt-col-value hide-mobile">Views</div>
              <div class="tt-col-value">Activity</div>
            </div>
            <?php include path("src", "tabs/threads"); ?>
          </div>
        </div>
        <div class="tab-pane tt-indent-none" id="tt-tab-03" role="tabpanel">
          <div class="tt-topic-list" id="replies">
            <div class="tt-list-header">
                <div class="tt-col-topic">Topic</div>
                <div class="tt-col-category">Category</div>
                <div class="tt-col-value">Activity</div>
            </div>
            <?php include path("src", "tabs/replies"); ?>
          </div>
        </div>
        <div class="tab-pane" id="tt-tab-04" role="tabpanel">
          <div class="tt-wrapper-inner">
            <div class="tt-categories-list">
              <div class="row" id="badges">
              <?php include path("src", "tabs/badges"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
