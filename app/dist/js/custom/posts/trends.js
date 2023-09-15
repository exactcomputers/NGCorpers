const ctaReg = `<div class="tt-topic-list" id="cta-reg">
<div class="tt-item tt-item-popup">
    <div class="tt-col-avatar">
        <svg class="tt-icon">
        <use xlink:href="#icon-ava-f"></use>
        </svg>
    </div>
    <div class="tt-col-message">
        Looks like you are new here. Register for free, learn and contribute.
    </div>
    <div class="tt-col-btn">
        <a href="login" class="btn btn-primary">Log in</a>
        <a href="signup" class="btn btn-secondary">Sign up</a>
        <button type="button" class="btn-icon" id="btn-cancel">
            <svg class="tt-icon">
            <use xlink:href="#icon-cancel"></use>
            </svg>
        </button>
    </div>
</div>
</div>`;

document.addEventListener("DOMContentLoaded", function () {
  const postsContainer = document.querySelector(".all-trending-posts");
  const showMoreButton = document.querySelector(".js-topiclist-showmore");
  const noPostContainer = document.querySelector(".no-posts");

  let currentPage = 1; // Initialize current page

  function appendPosts(posts) {
    if (!postsContainer) return;

    const parser = new DOMParser(); // Create a DOMParser instance

    const postFragments = posts.map((post, index) => {
      let i = index + 1;
      let iStr = i.toString().padStart(2, "0"); // Fixed length format

      const {
        user,
        slug,
        title,
        category,
        tags,
        createdAt,
        likes,
        comments,
        views,
      } = post;

      const tagElements = (tags || [])
        .map((tag) => `<li><span class="tt-badge">${tag.trim()}</span></li>`)
        .join("");

      const postHTML = `<div class="tt-item ">
        <div class="tt-col-avatar">
            <svg class="tt-icon">
            <use xlink:href="#icon-ava-${acronym(user.username)}"></use>
            </svg>
        </div>
        <div class="tt-col-description">
            <h6 class="tt-title">
            <a href="topic/${slug}" class="slug" data-id="${slug}">
                ${title}
            </a></h6>
            <div class="row align-items-center no-gutters">
                <div class="col-11">
                    <ul class="tt-list-badge">
                        <li class="show-mobile"><a href="cat/${
                          category.slug
                        }"><span class="tt-color${iStr} tt-badge">${sentenceCase(
        category.name
      )}</span></a></li>
                        ${tagElements}
                    </ul>
                </div>
                <div class="col-1 ml-auto show-mobile">
                    <div class="tt-value">${toStringTime(createdAt)}</div>
                </div>
            </div>
        </div>
        <div class="tt-col-category"><a href="cat/${
          category.slug
        }"><span class="tt-color${iStr} tt-badge">${sentenceCase(
        category.name
      )}</span></a></div>
        <div class="tt-col-value hide-mobile">${likes.length}</div>
        <div class="tt-col-value tt-color-select hide-mobile">${
          comments.length
        }</div>
        <div class="tt-col-value hide-mobile">${views.length}</div>
        <div class="tt-col-value hide-mobile">${toStringTime(createdAt)}</div>
    </div>${currentUser?._id && i % 10 === 0 ? ctaReg : ""}`;

      const postFragment = parser.parseFromString(postHTML, "text/html").body
        .firstChild;

      return postFragment;
    });

    postsContainer.append(...postFragments); // Use spread operator to append multiple nodes

    // Hide the "Show More" button if there are no more posts
    if (posts.length === 0) {
      showMoreButton.style.display = "none";
    }
  }

  function fetchAndAppendMorePosts() {
    // Make http call to the API
    const defaultShowMoreButton = showMoreButton.innerHTML;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
      if (this.readyState === 4 && this.status === 200) {
        const { posts } = JSON.parse(this.responseText);
        const nextPosts = posts;
        if (nextPosts.length > 0) {
          appendPosts(nextPosts); //Append new Posts
          currentPage++; // Increment current page
        } else {
          // No post row
          const noPostRow = `<div class="tt-topic-alert tt-alert-default" role="alert">
              There are no more posts to display
          </div>`;
          noPostContainer.innerHTML = noPostRow;
          showMoreButton.style.display = "none"; // Hide button if no more posts
        }
        if (showMoreButton) {
          showMoreButton.disabled = false;
          showMoreButton.innerHTML = defaultShowMoreButton;
        }
      }
    });
    xhttp.addEventListener("loadstart", function () {
      showMoreButton.innerHTML = "loading...";
      showMoreButton.disabled = true;
    });
    xhttp.open("GET", basePath("post/trends") + `?pg=${currentPage + 1}`);
    xhttp.send();
  }

  // Click event on "Show More"
  if (showMoreButton) {
    showMoreButton.addEventListener("click", fetchAndAppendMorePosts);
  }
});
