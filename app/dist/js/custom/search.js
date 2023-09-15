const searchQuery = document.querySelector(".search-input");
const searchResultsList = document.querySelector(".search-results");
const advancedSearchForm = document.querySelector(".advanced-search-form");
const advancedSearchBtn = document.querySelector(
  'button[name="advanced-search-btn"]'
);
/**
 * Lodash is a utility library in JavaScript that provides a variety of helpful functions,
 * including debounce and throttle,
 * which are often used for handling user interactions, such as search input.
 */
const debounceSearch = _.debounce(searchPosts, 1000); // Call searchFunction 1000ms after the last call

function searchPosts(searchQ) {
  // Clear previous search results
  searchResultsList.innerHTML = "";

  if (!searchQ) return;

  const xhttp = new XMLHttpRequest();
  xhttp.addEventListener("readystatechange", handleReadyStateChange);
  //   load start
  xhttp.addEventListener("loadstart", function () {
    searchResultsList.innerHTML = "loading...";
  });

  const url = basePath("search/index") + `?searchQ=${searchQ}`;
  xhttp.open("GET", url, true);
  xhttp.send();

  function handleReadyStateChange() {
    if (this.readyState === 4 && this.status === 200) {
      updateSearchResults(JSON.parse(this.responseText));
    }
  }

  function updateSearchResults(posts) {
    let searchResultsContent = "";
    if (posts.length > 0) {
      searchResultsContent = posts
        .map((post) => createPostsListItem(post))
        .join("");
    } else {
      searchResultsContent = createNotFoundListItem();
    }

    searchResultsList.innerHTML = `
      <div class="tt-search-scroll">
      <ul>${searchResultsContent}</ul>
      </div>
      <button type="button" class="tt-view-all" data-toggle="modal" data-target="#modalAdvancedSearch">Advanced Search</button>
    `;
  }

  function createPostsListItem(post) {
    const { title, slug, excerpt } = post;
    return `
      <li>
          <a href="topic/${slug}">
              <h6 class="tt-title">${title}</h6>
              <div class="tt-description">${excerpt}</div>
          </a>
      </li>`;
  }

  function createNotFoundListItem() {
    return `
    <li>
      <a href="javascript:void(0);">
        <h6 class="tt-title">Searched Post Not Found!</h6>
        <div class="tt-description"></div>
      </a>
    </li>`;
  }
}

if (searchQuery) {
  searchQuery.addEventListener("input", function (e) {
    const query = e.target.value;
    debounceSearch(query);
  });
}

/** Advanced Search */
function advancedSearch(formdata) {
  const defaultBtn = advancedSearchBtn.innerHTML;
  advancedSearchBtn.innerHTML = "Please wait...";
  advancedSearchBtn.disabled = true;
  // const json = await postRequest(basePath("post/create"), formdata);
  // !json.status ? toastr.error(json.error) : toastr.success(json.success);
  advancedSearchBtn.innerHTML = defaultBtn;
  advancedSearchBtn.disabled = false;
}

if (advancedSearchForm) {
  advancedSearchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const formdata = new FormData(advancedSearchForm);
    advancedSearch(formdata);
  });
}
