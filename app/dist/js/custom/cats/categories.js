const categoriesList = document.getElementById("categories-list");
if (categoriesList) {
  fetch(basePath("categories/index"))
    .then((response) => response.text())
    .then((resp) => {
      if (categoriesList) {
        categoriesList.innerHTML = resp;
      }
      // console.log(resp);
      toggleFavourite();
    })
    .catch((error) => console.error(error));
}

const singleCategories = async () => {
  try {
    const catSingle = document.getElementById("catSingle");
    var slug = document.getElementById("slug");
    if (slug) {
      const response = await fetch(
        basePath("categories/single-categories") + "?slug=" + slug.value
      );
      const data = await response.text();
      if (catSingle) {
        catSingle.innerHTML = data;
      }
    }
  } catch (error) {
    console.error(error);
  }
};
singleCategories();
