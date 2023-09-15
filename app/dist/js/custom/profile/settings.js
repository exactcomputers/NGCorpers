if (currentUser?.isVerified) {
  const myAvatar = document.querySelector(".my-avatar");
  const myUname = document.querySelector(".my-username");
  myAvatar.innerHTML = currentUser?.profilePicUrl
    ? `<img src="${currentUser?.profilePicUrl}" alt="${currentUser?.username}" width="40" height="40" style="border-radius: 50%" />`
    : `<svg class="tt-icon"><use xlink:href="#icon-ava-${currentUser?.username[0].toLowerCase()}"></use></svg>`;
  myUname.textContent = sentenceCase(currentUser?.username);
}

// Update avatar
const updateAvatar = document.querySelector("#upload-picture");
if (updateAvatar) {
  updateAvatar.addEventListener("change", async (e) => {
    e.preventDefault();
    const avatar = document.querySelector(".input-avatar");
    const labelAvatar = document.querySelector(".picture-label");
    const spanAvatar = document.querySelector(".picture-name");
    const defaultBtn = labelAvatar.innerText;
    labelAvatar.innerText = "Please wait...";
    labelAvatar.disabled = true;
    const picture = e.target.files[0];
    if (!picture) {
      toastr.error("Please, choose a picture");
      return;
    }
    if (picture.size > 1024 * 200) {
      toastr.error("Invalid picture size! Maximum size is 200KB");
      return;
    }
    const fd = new FormData();
    fd.append("picture", picture);
    const json = await postRequest(basePath("profile/uppics"), fd);
    console.log(json);
    !json.status ? toastr.error(json.error) : toastr.success(json.success);
    avatar.innerHTML = `<img src="${URL.createObjectURL(picture)}" alt="${
      picture.name
    }" width="40" height="40" style="border-radius: 50%" />`;
    spanAvatar.textContent = picture.name;
    labelAvatar.innerText = defaultBtn;
    labelAvatar.disabled = false;
  });
}

const profileForm = document.querySelector(".profile-form");
if (profileForm) {
  profileForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const profileBtn = document.querySelector('button[name="profile-btn"]');
    const formdata = new FormData(profileForm);
    const defaultBtn = profileBtn.innerHTML;
    profileBtn.innerHTML = "Saving changes...";
    profileBtn.disabled = true;
    const json = await postRequest(basePath("profile/update"), formdata);
    !json.status ? toastr.error(json.error) : toastr.success(json.success);
    profileBtn.innerHTML = defaultBtn;
    profileBtn.disabled = false;
  });
}

const pwdForm = document.querySelector(".password-form");
if (pwdForm) {
  pwdForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const pwdBtn = document.querySelector('button[name="paaword-btn"]');
    const fd = new FormData(pwdForm);
    const defaultBtn = pwdBtn.innerHTML;
    pwdBtn.innerHTML = "Saving changes...";
    pwdBtn.disabled = true;
    const json = await postRequest(basePath("profile/uppass"), fd);
    !json.status ? toastr.error(json.error) : toastr.success(json.success);
    pwdBtn.innerHTML = defaultBtn;
    pwdBtn.disabled = false;
  });
}
