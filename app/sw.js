const ngCorpers = "ng-corpers-v1"
const assets = [
  "/exactcomputers/ngcorpers1.0/",
  "dist/css/style.css",
  "dist/css/custom.css",
  "dist/js/bundle.js",
  "dist/images/logo.png",
  "dist/favicon/favicon.ico",
]

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(ngCorpers).then(cache => {
      cache.addAll(assets)
    })
  )
})
