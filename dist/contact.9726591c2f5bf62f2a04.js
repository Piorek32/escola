!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=2)}({2:function(e,t){const r=[...[...document.querySelectorAll('.form__contact input[type="text"]')],...[...document.querySelectorAll('.form__contact input[type="textarea"]')]];let n=document.querySelector('input[type="checkbox"'),o=!1;const u=document.querySelector(".error"),c=document.querySelector(".success");jQuery(document).ready((function(e){e(".wordpress-ajax-form2").on("submit",(function(t){if(u.innerHTML="",c.innerHTML="",t.preventDefault(),o=r.every(e=>""!=e.value),isChecked=n.checked,((e,t)=>!(!e||!t))(o,isChecked)){var i=e(this);e.post(i.attr("action"),i.serialize(),(function(e){e.error?(e=>{let t=e.error_message.map(e=>`<p>${e}</p>`).join("");u.innerHTML=t})(e):(e=>{let t=e.error_message.map(e=>`<p>${e}</p>`).join("");c.innerHTML=t})(e)}),"json")}else o?isChecked||(u.innerHTML="<p>Zaakceptuje regulamin</p>"):u.innerHTML="<p>Uzupełnuj wszystkie pola</p>"}))}))}});