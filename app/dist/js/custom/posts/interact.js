const commentsContainer = document.querySelector(".comments-wrapper");

document.addEventListener("DOMContentLoaded", function () {
  function prependComment(comment) {
    if (!commentsContainer) return;

    const { username } = currentUser;
    const { _id, text, date } = comment;

    const parser = new DOMParser();

    const commentHTML = `<div class="tt-item">
    <div class="tt-single-topic">
       <div class="tt-item-header pt-noborder">
           <div class="tt-item-info info-top">
               <div class="tt-avatar-icon">
                   <i class="tt-icon"><svg><use xlink:href="#icon-ava-t"></use></svg></i>
               </div>
               <div class="tt-avatar-title">
                  <a href="#" data-id="${_id}">tesla02</a>
               </div>
               <a href="#" class="tt-info-time">
                   <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i>${toStringTime(
                     date
                   )}
               </a>
           </div>
       </div>
       <div class="tt-item-description">${text}</div>
       <div class="tt-item-info info-bottom">
           <a href="#" class="tt-icon-btn">
               <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
               <span class="tt-text">671</span>
           </a>
           <a href="#" class="tt-icon-btn">
                <i class="tt-icon"><svg><use xlink:href="#icon-dislike"></use></svg></i>
               <span class="tt-text">39</span>
           </a>
           <a href="#" class="tt-icon-btn">
                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
               <span class="tt-text">12</span>
           </a>
           <div class="col-separator"></div>
           <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
               <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
           </a>
           <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
               <i class="tt-icon"><svg><use xlink:href="#icon-flag"></use></svg></i>
           </a>
           <a href="#" class="tt-icon-btn tt-hover-02 tt-small-indent">
                <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
           </a>
       </div>
   </div>
  </div>`;

    const commentFragment = parser.parseFromString(commentHTML, "text/html")
      .body.firstChild;

    commentsContainer.prepend(...commentFragment);
  }

  const commentForm = document.querySelector(".comment-form");
  if (commentForm) {
    commentForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const commentBtn = document.querySelector('button[name="comment-btn"]');
      const formdata = new FormData(commentForm);
      const defaultBtn = commentBtn.innerHTML;
      commentBtn.innerHTML = "Please wait...";
      commentBtn.disabled = true;
      const json = await postRequest(basePath("comment/create"), formdata);
      !json.status ? toastr.error(json.error) : prependComment(json.success);
      commentBtn.innerHTML = defaultBtn;
      commentBtn.disabled = false;
    });
  }

  const likeCount = document.querySelector(".like-count");

  function likeOrUnlike(btn) {
    let iLike = parseInt(likeCount.innerText);
    if (btn.classList.contains("fill")) {
      iLike -= 1;
      btn.classList.remove("fill");
    } else {
      iLike += 1;
      btn.classList.add("fill");
    }
    likeCount.innerText = iLike;
  }

  const postLinkText = document.querySelector('input[name="post-link"]');
  const copyToClipboard = document.querySelector(".clipboard-copy");

  copyToClipboard.addEventListener("click", async (e) => {
    e.preventDefault();
    await navigator.clipboard.writeText(postLinkText.value);
    toastr.success("Link copied to clipboard!");
  });

  function viewPost() {}

  const likeBtn = document.querySelector(".like-btn");
  if (likeBtn) {
    likeBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      const formdata = new FormData();
      const postId = likeBtn.getAttribute("data-pid");
      formdata.append("postid", postId);
      likeBtn.disabled = true; // change attribute
      const json = await postRequest(basePath("post/likes"), formdata);
      if (!json.status) toastr.error(json.error);
      likeOrUnlike(likeBtn); // increment OR decrement like count
      likeBtn.disabled = false;
    });
  }

  const shareBtn = document.querySelector('button[name="share-btn"]');
  if (shareBtn) {
    shareBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      shareBtn.disabled = true;
      // trigger a share modal
    });
  }

  // const fd = JSON.stringify(Object.fromEntries(formdata.entries()));
  // console.log(fd);
});
