const likes = document.querySelector(".activities");
const replies = document.querySelector(".replies");
const threads = documen.querySelector(".threads");
const categories = document.querySelector(".categories");

getRequest(basePath("profile/index")).then((res) => {
  if (replies) {
    const repliesRow = "";
    res.replies &&
      res.replies.map((row) => {
        repliesRow += `<div class="tt-item">
            <div class="tt-col-avatar">
               <svg class="tt-icon">
                  <use xlink:href="#icon-ava-${acronym(
                    row?.user?.username
                  )}"></use>
                </svg>
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title"><a href="#">
                    Does Envato act against the authors of Envato markets?
                </a></h6>
                <div class="row align-items-center no-gutters hide-desktope">
                    <div class="col-9">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></li>
                        </ul>
                    </div>
                    <div class="col-3 ml-auto show-mobile">
                        <div class="tt-value">5 Jan,19</div>
                    </div>
                </div>
                <div class="tt-content">
                    I really liked new badge - T-shirt. Will there be new contests with new badges for AudioJungle?
                </div>
            </div>
            <div class="tt-col-category"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></div>
            <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
        </div>`;
      });
    replies.innerHTML = repliesRow;
  }
  //   threads
  if (threads) {
    const threadsRow = "";
    res.threads.length > 0 &&
      res.threads.map((row) => {
        threadsRow += `<div class="tt-item">
        <div class="tt-col-avatar">
            <svg class="tt-icon">
            <use xlink:href="#icon-ava-${acronym(row?.user?.username)}"></use>
            </svg>
        </div>
        <div class="tt-col-description">
        <h6 class="tt-title">
            <a href="topic/${row?.slug}">${row?.title}</a></h6>
            <div class="row align-items-center no-gutters">
                <div class="col-11">
                    <ul class="tt-list-badge">
                        <li class="show-mobile"><a href="cat/${
                          row?.category
                        }"><span class="tt-color01 tt-badge">${
          row?.category
        }</span></a></li>
                        ${row?.tags.map(
                          (tag) =>
                            `<li><span class="tt-badge">${tag}</span></li>`
                        )}
                    </ul>
                </div>
                <div class="col-1 ml-auto show-mobile">
                    <div class="tt-value">${row?.createdAt}</div>
                </div>
            </div>
        </div>
        <div class="tt-col-category"><span class="tt-color01 tt-badge">${
          row?.category
        }</span></div>
        <div class="tt-col-value hide-mobile">${row?.likes.length}</div>
        <div class="tt-col-value tt-color-select  hide-mobile">${
          row?.comments.length
        }</div>
        <div class="tt-col-value hide-mobile">${row?.views.length}</div>
        <div class="tt-col-value hide-mobile">${row?.createdAt}</div>
    </div>`;
      });
    threads.innerHTML = threadsRow;
  }

  if (categories) {
    const categoryRow = "";
    res.category.length > 0 &&
      res.category.map((row) => {
        categoryRow += `<div class="col-md-6 col-lg-4">
        <div class="tt-item">
            <div class="tt-item-header">
                <ul class="tt-list-badge">
                    <li><a href="cat/${
                      row?.category
                    }"><span class="tt-color01 tt-badge">${
          row?.category
        }</span></a></li>
                </ul>
                <h6 class="tt-title"><a href="cat/${
                  row?.category
                }">Threads - 0</a></h6>
            </div>
            <div class="tt-item-layout">
               <div class="innerwrapper">
                   <?=$row['description']?>
               </div>
               <div class="innerwrapper">
                    <h6 class="tt-title">Similar TAGS</h6>
                    <ul class="tt-list-badge">
                        ${row?.tags.map(
                          (tag) =>
                            `<li><span class="tt-badge">${tag}</span></li>`
                        )}
                    </ul>
               </div>
               <a href="javascript:;" class="tt-btn-icon">
                    <i class="tt-icon favorite"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                </a>
            </div>
        </div>
    </div>`;
      });
    categories.innerHTML = categoryRow;
  }
});
