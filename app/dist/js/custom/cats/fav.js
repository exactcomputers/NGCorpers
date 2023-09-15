const toggleFavourite = () => {
  var favoriteBtn = document.querySelectorAll(".favorite");
  if (favoriteBtn) {
    favoriteBtn.forEach((fav) => {
      fav.addEventListener("click", (e) => {
        e.preventDefault();
        const favID = fav.getAttribute("data-id");
        fetch(basePath("categories/fav") + "?term_id=" + favID)
          .then((resp) => resp.text())
          .then((data) => {
            if (data === "like") {
              fav.style.fill = "#2172cd";
            } else if (data === "unlike") {
              fav.style.fill = "#666f74";
            }
          });
        // alert("favorite "+favID+" clicked")
      });
    });
  }
};
