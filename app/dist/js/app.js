// TOP BAR:
const ext = ".php";
topbar.config({
  autoRun: true,
  barThickness: 3,
  barColors: {
    0: "rgba(103, 148, 54, .9)",
    ".25": "rgba(103, 148, 54, .9)",
    ".50": "rgba(103, 148, 54, .9)",
    ".75": "rgba(103, 148, 54, .9)",
    "1.0": "rgba(103, 148, 54, .9)",
  },
  shadowBlur: 10,
  shadowColor: "rgba(0,   0,   0,   .6)",
});
topbar.show();

document.addEventListener("DOMContentLoaded", () => {
  topbar.hide();
});

const sentenceCase = (string) => string[0].toUpperCase() + string.slice(1);
let currentUser = {};
if (localStorage.getItem("currentUser") !== null) {
  currentUser = JSON.parse(atob(localStorage.getItem("currentUser")));
}

const loggedInUser = document.querySelector(".display-avatar");
const inputAvatar = document.querySelector(".input-avatar");
const inputUsername = document.querySelector('input[name="username"]');
const inputFullname = document.querySelector('input[name="fullname"]');
const inputMobileno = document.querySelector('input[name="mobileno"]');
const inputEmail = document.querySelector('input[name="email"]');
// const textareaBio = document.querySelector('textarea[name="bio"]');
const checkBoxLike = document.querySelector('input[name="likes"]');
const checkBoxReply = document.querySelector('input[name="replies"]');

/**
 * App info
 * Name NgCorpers
 */
const auth_url = "./auth/";
const base_url = "server/";
const accountDiv = document.getElementById("account");
if (!currentUser?.isVerified) {
  let accountContent = `<div class="tt-account-btn">
  <a href="login" class="btn btn-primary" >Log in</a>
  <a href="signup" class="btn btn-secondary">Sign up</a>
  </div>`;
  if (accountDiv) accountDiv.innerHTML = accountContent;
}

const basePath = (filename) => base_url + filename + ext;
const filePath = (filename) => filename + ext;
const acronym = (str) => str[0].toLowerCase();
const extractText = (str, maxWords) => {
  const txt = str.split(" ");
  return txt.slice(0, maxWords).join(" ") + "...";
};
const toStringTime = (dateTime) => {
  const currentTime = new Date();
  // Time difference in milliseconds
  const timeDifference = currentTime - new Date(dateTime);

  // Convert time difference to seconds, minutes, hours, and days
  const seconds = Math.floor(timeDifference / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);

  switch (true) {
    case days > 0:
      return `${days}d`;
    case hours > 0:
      return `${hours}h`;
    case minutes > 0:
      return `${minutes}m`;
    default:
      return `${seconds}s`;
  }
};

// Logout action
const logout = document.querySelector("#logout");
if (logout) {
  logout.addEventListener("click", () => {
    location.replace("logout");
  });
}

// Cancel visitor's prompt for register or Login action
const cancel = () => {
  const cancel = document.querySelector("#btn-cancel");
  if (sessionStorage.getItem("showCtaReg") !== null) {
    if (!sessionStorage.getItem("showCtaReg"))
      document.getElementById("cta-reg").style.visibility = "hidden";
  }
  if (cancel) {
    cancel.addEventListener("click", () => {
      document.getElementById("cta-reg").remove();
      sessionStorage.setItem("showCtaReg", false);
    });
  }
};
cancel();

// Logged In User Profile
const profile = () => {
  const avatar = currentUser?.profilePicUrl
    ? `<img src="${currentUser?.profilePicUrl}" alt="${currentUser?.username}" width="40" height="40" style="border-radius: 50%" />`
    : `<svg class="tt-icon"><use xlink:href="#icon-ava-${currentUser?.username[0].toLowerCase()}"></use></svg>`;
  //
  loggedInUser.innerHTML = avatar;
  inputAvatar.innerHTML = avatar;
  inputUsername.value = currentUser?.username;
  inputFullname.value = currentUser?.fullname || "";
  inputMobileno.value = currentUser?.mobileno || "";
  inputEmail.value = currentUser?.email || "";
  // textareaBio.value = currentUser?.bio || "";
  checkBoxLike.checked = currentUser?.newLikeMessage || false;
  checkBoxReply.checked = currentUser?.newCommentMessage || false;
};
if (currentUser?.isVerified) profile();

//
const postRequest = async (url, data) => {
  try {
    const response = await fetch(url, {
      method: "POST",
      body: data,
    });
    return await response.json();
  } catch (error) {
    console.log(error.message);
    toastr.error(error.message);
  }
};

const getRequest = async (url) => {
  try {
    const response = await fetch(url);
    return await response.json();
  } catch (error) {
    console.log(error.message);
  }
};
