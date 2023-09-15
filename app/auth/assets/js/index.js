const params = new URLSearchParams(location.search);

const AppLanding = (function () {
  var fd, btnLogin, btnRegister;

  //handle signin form
  const _handleLoginForm = function () {
    //var validation;
    var loginForm = $("#loginForm");
    //validate login form on keyup and submit
    loginForm.on("submit", function (e) {
      e.preventDefault();
      fd = new FormData(this);
      btnLogin = $('button[name="loginBtn"]').html();
      let userlogin = $("#signinSrEmail").val();
      $.ajax({
        url: "server/auth/",
        method: "POST",
        data: fd,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $('button[name="loginBtn"]').html("Authenticating...");
          $('button[name="loginBtn"]').attr("disabled", true);
        },
        success: function (response) {
          // console.log(response);
          if (response.status) {
            localStorage.setItem(
              "currentUser",
              btoa(JSON.stringify(response.user))
            );
            localStorage.setItem("accessToken", response.token);
            window.location.href = "./";
          } else {
            $("#alert").removeClass("text-success");
            $("#alert").html(response.error).addClass("text-danger");
          }
          $('button[name="loginBtn"]').html(btnLogin);
          $('button[name="loginBtn"]').attr("disabled", false);
        },
        error: function () {
          //console.log(response);
          $("#alert").removeClass("text-success");
          $("#alert")
            .html("It seems we could not resolve the server. try again later!")
            .addClass("text-danger");
          $('button[name="loginBtn"]').html(btnLogin);
          $('button[name="loginBtn"]').attr("disabled", false);
        },
      });
    });
  };

  //hnadle signin form
  const _handleSignUpForm = function () {
    //var validation;
    var signupForm = $("#signupForm");
    //validate signup form on keyup and submit
    signupForm.on("submit", function (e) {
      e.preventDefault();
      fd = new FormData(this);
      btnRegister = $('button[name="register"]').html();
      $.ajax({
        url: "server/auth/signup.php",
        method: "POST",
        data: fd,
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $('button[name="register"]').html("Submitting...");
          $('button[name="register"]').attr("disabled", true);
        },
        success: function (response) {
          if (response.status) {
            $("#alert").removeClass("text-danger");
            $("#alert").html(response.success).addClass("text-success");
            signupForm[0].reset();
          } else {
            $("#alert").removeClass("text-success");
            $("#alert").html(response.error).addClass("text-danger");
          }
          $('button[name="register"]').html(btnRegister);
          $('button[name="register"]').attr("disabled", false);
        },
        error: function () {
          //console.log(response);
          $("#alert").removeClass("text-success");
          $("#alert")
            .html("It seems we could not resolve the server. try again later!")
            .addClass("text-danger");
          $('button[name="register"]').html(btnRegister);
          $('button[name="register"]').attr("disabled", false);
        },
      });
    });
  };

  return {
    init: function () {
      _handleLoginForm();
      _handleSignUpForm();
    },
  };
})();

jQuery(document).ready(function () {
  AppLanding.init();
});

const modalBtn = document.getElementById("btnmod");
const modalBody = document.getElementById("exampleModalTopCover");
const modalContent = document.getElementById("modalContent");

const getModalShow = async (name) => {
  try {
    if (name) {
      const response = await fetch("server/pages/?pagename=" + name);
      const resp = await response.text();
      modalContent.innerHTML = resp;
      $("#exampleModalTopCover").modal();
    }
  } catch (error) {
    console.error(error);
  }
};

if (params.has("vrfy")) {
  const tkn = params.get("vrfy");
  fetch(`http://localhost:5000/api/auth/verify?vrfy=${tkn}`)
    .then((response) => response.json())
    .then((json) => {
      if (json.status !== "success") {
        document.querySelector(".err").textContent = json.message;
        setTimeout(() => {
          location.replace("login");
        }, 2000);
      } else {
        // Account Successfully Verified
        document.querySelector(".success").textContent = json.message;
      }
    })
    .catch((err) => {
      document.querySelector(".err").textContent = err.message;
    });
}

if (params.has("loggedout")) {
  const alertDiv = document.getElementById("alert");
  if (alertDiv.classList.contains("text-danger")) {
    alertDiv.classList.remove("text-danger");
    alertDiv.classList.add("text-success");
    alertDiv.innerHTML = "You've successfully logged out! ";
  } else {
    alertDiv.classList.add("text-success");
    alertDiv.innerHTML = "You've successfully logged out! ";
  }
}

$(function () {
  $(".hide-show span").show();
  $(".hide-show span i").addClass("show");

  $(".hide-show span i").click(function () {
    if ($(this).hasClass("show")) {
      $('input[name="password"]').attr("type", "text");
      $(this).removeClass("show");
      $(this).removeClass("fas fa-eye-slash");
      $(this).addClass("fas fa-eye");
    } else {
      $('input[name="password"]').attr("type", "password");
      $(this).addClass("show");
      $(this).removeClass("fas fa-eye");
      $(this).addClass("fas fa-eye-slash");
    }
  });
});
