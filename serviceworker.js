const staticDev = 'dev-shoe-v1'
const assets = [
  'index.html',
  'connexion.html',
  'inscription.html',
  'mon-compte.html',
  'mes-adresses.html',
  'mon-courrier.html',
  'mes-precommandes.html',
  'mes-commandes.html',
  'mon-panier.html',
  'android-chrome-144x144.png',
  'android-chrome-192x192.png',
  'android-chrome-256x256.png',
  'apple-touch-icon.png',
  'browserconfig.xml',
  'favicon-16x16.png',
  'favicon-32x32.png',
  'favicon.ico',
  'mstile-150x150.png',
  'safari-pinned-tab.svg',
  'serviceworker.js',
  'site.webmanifest',
  'assets/css/styles.min.css',
  'assets/img/bg_cover.png',
  'assets/img/bg_home.jpg',
  'assets/img/bg_main.png',
  'assets/img/bg_sign.jpg',
  'assets/img/handmade.jpg',
  'assets/img/logo_f.png',
  'assets/img/logo_w.png',
  'assets/img/logo.png',
  'assets/img/made_in_france.png',
  'assets/img/catalog/shoes/shoes01_r.png',
  'assets/img/catalog/shoes/shoes01.jpg',
  'assets/img/catalog/shoes/shoes02_r.png',
  'assets/img/catalog/shoes/shoes02.jpg',
  'assets/img/catalog/shoes/shoes03_r.png',
  'assets/img/catalog/shoes/shoes03.jpg',
  'assets/img/catalog/shoes/shoes04_r.png',
  'assets/img/catalog/shoes/shoes04.jpg',
  'assets/js/index.js',
  'assets/js/sw.js',
  'assets/js/cart.js',
  'assets/js/factory/cart.js',
  'assets/js/factory/slider.js'
]

self.addEventListener('install', installEvent => {
  installEvent.waitUntil(
    caches.open(staticDev).then(cache => {
      cache.addAll(assets)
    })
  )
})

self.addEventListener('activate', activateEvent => {
  activateEvent.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (staticDev.indexOf(cacheName) === -1) {
            return caches.delete(cacheName)
          }
        })
      )
    })
  )
})

self.addEventListener('fetch', fetchEvent => {
  fetchEvent.respondWith(
    caches.match(fetchEvent.request).then(res => {
      return res || fetch(fetchEvent.request)
    })
  )
})
