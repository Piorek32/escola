!function(e){var r={};function n(t){if(r[t])return r[t].exports;var o=r[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=r,n.d=function(e,r,t){n.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,r){if(1&r&&(e=n(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(n.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var o in e)n.d(t,o,function(r){return e[r]}.bind(null,o));return t},n.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(r,"a",r),r},n.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},n.p="",n(n.s=3)}({3:function(e,r){const n=[...[...document.querySelectorAll('.sing__up input[type="text"]')],...[...document.querySelectorAll('.sing__up input[type="number"]')]];let t=document.querySelector('input[type="checkbox"'),o=!1;const u=document.querySelector(".error"),c=document.querySelector(".success");successHandler=e=>{let r=e.error_message.map(e=>`<p>${e}</p>`).join("");c.innerHTML=r},errorHandler=e=>{let r=e.error_message.map(e=>`<p>${e}</p>`).join("");u.innerHTML=r},jQuery(document).ready((function(e){e(".wordpress-ajax-form").on("submit",(function(r){if(u.innerHTML="",c.innerHTML="",r.preventDefault(),o=n.every(e=>""!=e.value),isChecked=t.checked,((e,r)=>!(!e||!r))(o,isChecked)){var i=e(this);e.post(i.attr("action"),i.serialize(),(function(e){e.error?errorHandler(e):successHandler(e)}),"json")}else o?isChecked||(u.innerHTML="<p>Zaakceptuje regulamin<?p>"):u.innerHTML="<p>Uzupełnuj wszystkie pola</p>"}))}))}});