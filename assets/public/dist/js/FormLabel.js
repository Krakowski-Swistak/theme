!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=8)}([function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,t,r){return t&&n(e.prototype,t),r&&n(e,r),e}},,,,,,function(e,t,n){e.exports=n(9)},function(e,t,n){"use strict";n.r(t);var r=n(1),o=n.n(r),a=n(2),u=n.n(a),i=n(0),l=n.n(i),c=function(){function e(){o()(this,e)}return u()(e,null,[{key:"toggleLabelClassNameIfEmpty",value:function(t,n){var r=t.closest(e.acfFieldClassName);n?r.classList.add(e.activeClassName):r.classList.remove(e.activeClassName)}},{key:"eachInputInit",value:function(){e.inputs.forEach((function(t){e.toggleLabelClassNameIfEmpty(t,t.value),t.addEventListener("change",(function(n){e.toggleLabelClassNameIfEmpty(t,n.target.value)}))}))}}]),e}();l()(c,"inputs",document.querySelectorAll(".ks-input")),l()(c,"activeClassName","active"),l()(c,"acfFieldClassName",".acf-field"),document.addEventListener("DOMContentLoaded",(function(){c.eachInputInit()}))}]);