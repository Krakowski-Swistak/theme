!function(e){var n={};function t(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,t),o.l=!0,o.exports}t.m=e,t.c=n,t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:r})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(t.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var o in e)t.d(r,o,function(n){return e[n]}.bind(null,o));return r},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="",t(t.s=12)}([function(e,n){e.exports=function(e,n,t){return n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}},function(e,n){e.exports=function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}},function(e,n){function t(e,n){for(var t=0;t<n.length;t++){var r=n[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}},,,,,,,,,,function(e,n,t){e.exports=t(13)},function(e,n,t){"use strict";t.r(n);var r=t(1),o=t.n(r),a=t(2),l=t.n(a),u=t(0),i=t.n(u),c=function(){function e(){o()(this,e)}return l()(e,null,[{key:"showHeader",value:function(){e.header.classList.add(e.fixedClassname)}},{key:"hideHeader",value:function(){e.header.classList.remove(e.fixedClassname)}},{key:"scrollPage",value:function(){window.addEventListener("scroll",(function(){var n=window.pageYOffset||document.documentElement.scrollTop;window.scrollY>e.header.clientHeight?(n>e.lastScrollTop?e.hideHeader():e.showHeader(),e.lastScrollTop=n<=0?0:n):e.hideHeader()}),!1)}}]),e}();i()(c,"header",document.querySelector("[data-header]")),i()(c,"fixedClassname","ks-header__fixed"),i()(c,"lastScrollTop",0),document.addEventListener("DOMContentLoaded",(function(){console.log(c),c.scrollPage()}))}]);