!(function (e) {
  var t = {};
  function n(r) {
    if (t[r]) return t[r].exports;
    var i = (t[r] = { i: r, l: !1, exports: {} });
    return e[r].call(i.exports, i, i.exports, n), (i.l = !0), i.exports;
  }
  (n.m = e),
    (n.c = t),
    (n.d = function (e, t, r) {
      n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: r });
    }),
    (n.r = function (e) {
      "undefined" != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
        Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (n.t = function (e, t) {
      if ((1 & t && (e = n(e)), 8 & t)) return e;
      if (4 & t && "object" == typeof e && e && e.__esModule) return e;
      var r = Object.create(null);
      if (
        (n.r(r),
        Object.defineProperty(r, "default", { enumerable: !0, value: e }),
        2 & t && "string" != typeof e)
      )
        for (var i in e)
          n.d(
            r,
            i,
            function (t) {
              return e[t];
            }.bind(null, i)
          );
      return r;
    }),
    (n.n = function (e) {
      var t =
        e && e.__esModule
          ? function () {
              return e.default;
            }
          : function () {
              return e;
            };
      return n.d(t, "a", t), t;
    }),
    (n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t);
    }),
    (n.p = ""),
    n((n.s = 16));
})({
  16: function (e, t, n) {
    e.exports = n(17);
  },
  17: function (e, t) {
    new Swiper("[data-slider-case-studies]", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: { el: ".ks-case-studies__swiper-pagination", clickable: !0 },
    });
    ({
      indexSpots: Array.from(
        document.getElementsByClassName("ks-case-studies-swiper-slide")
      ),
      renderIndexInSpots: function () {
        for (var e = 0; e < this.indexSpots.length; e++) {
          var t = this.indexSpots[e],
            n = e + 1;
          t.textContent = n <= 9 ? "0".concat(n, ".") : "".concat(n, ".");
        }
      },
      initSwiper: function () {
        return this.renderIndexInSpots();
      },
    }).initSwiper();
    new Swiper("[data-slider-materials]", {
      slidesPerView: 1,
      spaceBetween: 50,
      pagination: { el: ".ks-content__swiper-pagination", clickable: !0 },
    }),
      new Swiper("[data-slider-recommendation]", {
        slidesPerView: 1,
        spaceBetween: 95,
        pagination: {
          el: ".ks-recommendations__swiper-pagination",
          clickable: !0,
        },
        breakpoints: { 1024: { slidesPerView: 2 } },
      }),
      new Swiper(".swiper-blog", {
        slidesPerView: 1,
        spaceBetween: 100,
        loop: true,
        // pagination: {
        //   el: ".swiper-pagination",
        // },
        // navigation: {
        //   nextEl: ".swiper-button-next",
        //   prevEl: ".swiper-button-prev",
        // },
      });
  },
});
