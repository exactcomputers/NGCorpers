const titleInput = document.querySelector('input[name="title"]');
const titleInputValueCount = document.querySelector(".tt-value-input");
if (titleInput) {
  titleInput.addEventListener("keyup", (e) => {
    let maxCount = titleInput.getAttribute("maxLength");
    let remCount = 0;
    let titleInputCount = titleInput.value.length;
    if (titleInputCount > 0) {
      remCount = maxCount - titleInputCount;
      titleInputValueCount.textContent = remCount;
    } else {
      titleInputValueCount.textContent = maxCount;
    }
  });
}

const createForm = document.querySelector(".create-form");
if (createForm) {
  createForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const createBtn = document.querySelector('button[name="create-btn"]');
    const formdata = new FormData(createForm);
    const defaultBtn = createBtn.innerHTML;
    createBtn.innerHTML = "Please wait...";
    createBtn.disabled = true;
    const json = await postRequest(basePath("post/create"), formdata);
    if (!json.status) {
      toastr.error(json.error);
    } else {
      toastr.success(json.success);
      createForm.reset();
    }
    createBtn.innerHTML = defaultBtn;
    createBtn.disabled = false;
  });
}
