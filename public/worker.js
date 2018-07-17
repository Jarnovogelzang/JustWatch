self.addEventListener('install', function (objEvent) {
  objEvent.waitUntil(caches.open('MilliSeconde').then(function (objCache) {
    return objCache.addAll(['/']);
  }));
});

self.addEventListener('fetch', function (objEvent) {
  objEvent.respondWith(caches.match(objEvent.request).then(function (objResponse) {
    if (objResponse) {
      return objResponse;
    }

    var objRequestCloned = objEvent.request.clone();
    return fetch(objRequestCloned).then(function (objResponse) {
      if (!objResponse || objResponse.status !== 200 || objResponse.type !== 'basic') {
        return objResponse;
      }

      var objResponseCloned = objResponse.clone();
      caches.open('MilliSeconde').then(function (objCache, objResponseCloned) {
        objCache.put(objEvent.request, objResponseCloned);
      });

      return objResponseCloned;
    });
  }));
});

self.addEventListener('activate', function (objEvent) {
  objEvent.waitUntil(caches.keys().then(function (arrayCacheNames) {
    return Promise.all(arrayCacheNames.map(function (stringCacheName) {
      return caches.delete(stringCacheName);
    }));
  }));
});
