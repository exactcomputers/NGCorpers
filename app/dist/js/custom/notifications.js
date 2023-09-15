const enableNotification = document.querySelector(".enable-notification");
const enableNotificationWrapper = document.querySelector(".notification-alert");
const _log = document.querySelector(".log-list");

// Function Definition

function notificationList(res) {
  const { notifications } = res;
  const _logContent = notifications
    .map((el) => {
      return `
            <div class="tt-item">
              <div class="tt-col-avatar">
                  <svg class="tt-icon">
                      <use xlink:href="#icon-ava-${acronym(
                        el.user.username
                      )}"></use>
                  </svg>
              </div>
              <div class="tt-col-description">
                  <h4 class="tt-title">
                    <span>${extractText(el.post.title, 6)}</span> 
                    <span class="time">
                      ${new Date(el.date).toDateString()}
                    </span>
                  </h4>
                  <div class="tt-message tt-select">
                    ${el.user.username}: ${el.text}
                  </div>
              </div>
            </div>`;
    })
    .join("");
  //
  _log.innerHTML = _logContent;
}

if (_log) {
  $.ajax({
    url: basePath("notifications/index"),
    dataType: "json",
    success: function (res) {
      if (res.notifications.length > 0) {
        notificationList(res);
      } else {
        _log.innerHTML = `<div class="text-center" style="margin-top:100px"><h3>There are no notifications!</h3></div>`;
      }
    },
  });
}

const _showNotification = () => {
  const notification = new Notification("Notification Title", {
    body: "Notification body",
    icon: "./dist/images/apple-touch-icon.png",
  });

  notification.onclick = (e) => {
    // window.location.href = app_url;
    console.log(e);
  };
};

document.addEventListener("DOMContentLoaded", () => {
  const notifPermisson = Notification.permission;
  const isPermissionDenied = () => {
    if (localStorage.getItem("push_notifications-permission-denied")) {
      enableNotificationWrapper &&
        enableNotificationWrapper.classList.add("d-none");
      // _showNotification();
    } else {
      enableNotificationWrapper &&
        enableNotificationWrapper.classList.remove("d-none");
    }
  };

  isPermissionDenied();

  const notificationPrompt = () => {
    if ("Notification" in window && notifPermisson !== "denied") {
      Notification.requestPermission().then((permission) => {
        if (permission === "granted") {
          // console.log(`${permission} show notification`);
          enableNotificationWrapper.classList.add("d-none");
          localStorage.setItem("push_notifications-permission-denied", false);
          // _showNotification();
        } else {
          localStorage.setItem("push_notifications-permission-denied", true);
          enableNotificationWrapper.classList.add("d-none");
        }
      });
    }
  };

  if (enableNotificationWrapper)
    enableNotification.addEventListener("click", notificationPrompt);
});

// define("discourse/lib/push-notifications", ["exports", "discourse/lib/key-value-store", "discourse/lib/ajax", "discourse-common/lib/helpers"], function (_exports, _keyValueStore, _ajax, _helpers) {
//   "use strict";

//   Object.defineProperty(_exports, "__esModule", {
//     value: true
//   });
//   _exports.isPushNotificationsEnabled = isPushNotificationsEnabled;
//   _exports.isPushNotificationsSupported = isPushNotificationsSupported;
//   _exports.keyValueStore = void 0;
//   _exports.register = register;
//   _exports.subscribe = subscribe;
//   _exports.unsubscribe = unsubscribe;
//   _exports.userSubscriptionKey = userSubscriptionKey;
//   0; //eaimeta@70e063a35619d71f0,"discourse/lib/key-value-store",0,"discourse/lib/ajax",0,"discourse-common/lib/helpers"eaimeta@70e063a35619d71f
//   const keyValueStore = new _keyValueStore.default("discourse_push_notifications_");
//   _exports.keyValueStore = keyValueStore;
//   function userSubscriptionKey(user) {
//     return `subscribed-${user.get("id")}`;
//   }
//   function sendSubscriptionToServer(subscription, sendConfirmation) {
//     (0, _ajax.ajax)("/push_notifications/subscribe", {
//       type: "POST",
//       data: {
//         subscription: subscription.toJSON(),
//         send_confirmation: sendConfirmation
//       }
//     });
//   }
//   function resetIdle() {
//     if ("controller" in navigator.serviceWorker && navigator.serviceWorker.controller != null) {
//       navigator.serviceWorker.controller.postMessage({
//         lastAction: Date.now()
//       });
//     }
//   }
//   function setupActivityListeners(appEvents) {
//     window.addEventListener("focus", resetIdle);
//     if (document) {
//       document.addEventListener("scroll", resetIdle);
//     }
//     appEvents.on("page:changed", resetIdle);
//   }
//   function isPushNotificationsSupported() {
//     let caps = (0, _helpers.helperContext)().capabilities;
//     if (!("serviceWorker" in navigator && typeof ServiceWorkerRegistration !== "undefined" && typeof Notification !== "undefined" && "showNotification" in ServiceWorkerRegistration.prototype && "PushManager" in window && !caps.isAppWebview && navigator.serviceWorker.controller && navigator.serviceWorker.controller.state === "activated")) {
//       return false;
//     }
//     return true;
//   }
//   function isPushNotificationsEnabled(user) {
//     return user && !user.isInDoNotDisturb() && isPushNotificationsSupported() && keyValueStore.getItem(userSubscriptionKey(user));
//   }
//   function register(user, router, appEvents) {
//     if (!isPushNotificationsSupported()) {
//       return;
//     }
//     if (Notification.permission === "denied" || !user) {
//       return;
//     }
//     navigator.serviceWorker.ready.then(serviceWorkerRegistration => {
//       serviceWorkerRegistration.pushManager.getSubscription().then(subscription => {
//         if (subscription) {
//           sendSubscriptionToServer(subscription, false);
//           // Resync localStorage
//           keyValueStore.setItem(userSubscriptionKey(user), "subscribed");
//         }
//         setupActivityListeners(appEvents);
//       }).catch(e => {
//         // eslint-disable-next-line no-console
//         console.error(e);
//       });
//     });
//     navigator.serviceWorker.addEventListener("message", event => {
//       if ("url" in event.data) {
//         const url = event.data.url;
//         router.handleURL(url);
//       }
//     });
//   }
//   function subscribe(callback, applicationServerKey) {
//     if (!isPushNotificationsSupported()) {
//       return;
//     }
//     navigator.serviceWorker.ready.then(serviceWorkerRegistration => {
//       serviceWorkerRegistration.pushManager.subscribe({
//         userVisibleOnly: true,
//         applicationServerKey: new Uint8Array(applicationServerKey.split("|")) // eslint-disable-line no-undef
//       }).then(subscription => {
//         sendSubscriptionToServer(subscription, true);
//         if (callback) {
//           callback();
//         }
//       }).catch(e => {
//         // eslint-disable-next-line no-console
//         console.error(e);
//       });
//     });
//   }
//   function unsubscribe(user, callback) {
//     if (!isPushNotificationsSupported()) {
//       return;
//     }
//     keyValueStore.setItem(userSubscriptionKey(user), "");
//     navigator.serviceWorker.ready.then(serviceWorkerRegistration => {
//       serviceWorkerRegistration.pushManager.getSubscription().then(subscription => {
//         if (subscription) {
//           subscription.unsubscribe().then(successful => {
//             if (successful) {
//               (0, _ajax.ajax)("/push_notifications/unsubscribe", {
//                 type: "POST",
//                 data: {
//                   subscription: subscription.toJSON()
//                 }
//               });
//             }
//           });
//         }
//       }).catch(e => {
//         // eslint-disable-next-line no-console
//         console.error(e);
//       });
//       if (callback) {
//         callback();
//       }
//     });
//   }
// });
