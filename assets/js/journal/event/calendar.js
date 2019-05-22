(function(){function t(t){function e(e,n,o,a,r,i){for(;r>=0&&r<i;r+=t){var s=a?a[r]:r;o=n(o,e[s],s,e)}return o}return function(n,o,a,r){o=_(o,r,4);var i=!M(n)&&g.keys(n),s=(i||n).length,l=t>0?0:s-1;return arguments.length<3&&(a=n[i?i[l]:l],l+=t),e(n,o,a,i,l,s)}}function e(t){return function(e,n,o){n=w(n,o);for(var a=T(e),r=t>0?0:a-1;r>=0&&r<a;r+=t)if(n(e[r],r,e))return r;return-1}}function n(t,e,n){return function(o,a,r){var i=0,s=T(o);if("number"==typeof r)t>0?i=r>=0?r:Math.max(r+s,i):s=r>=0?Math.min(r+1,s):r+s+1;else if(n&&r&&s)return r=n(o,a),o[r]===a?r:-1;if(a!==a)return r=e(c.call(o,i,s),g.isNaN),r>=0?r+i:-1;for(r=t>0?i:s-1;r>=0&&r<s;r+=t)if(o[r]===a)return r;return-1}}function o(t,e){var n=S.length,o=t.constructor,a=g.isFunction(o)&&o.prototype||s,r="constructor";for(g.has(t,r)&&!g.contains(e,r)&&e.push(r);n--;)(r=S[n])in t&&t[r]!==a[r]&&!g.contains(e,r)&&e.push(r)}var a=this,r=a._,i=Array.prototype,s=Object.prototype,l=Function.prototype,u=i.push,c=i.slice,p=s.toString,d=s.hasOwnProperty,h=Array.isArray,f=Object.keys,m=l.bind,y=Object.create,v=function(){},g=function(t){return t instanceof g?t:this instanceof g?void(this._wrapped=t):new g(t)};"undefined"!=typeof exports?("undefined"!=typeof module&&module.exports&&(exports=module.exports=g),exports._=g):a._=g,g.VERSION="1.8.3";var _=function(t,e,n){if(void 0===e)return t;switch(null==n?3:n){case 1:return function(n){return t.call(e,n)};case 2:return function(n,o){return t.call(e,n,o)};case 3:return function(n,o,a){return t.call(e,n,o,a)};case 4:return function(n,o,a,r){return t.call(e,n,o,a,r)}}return function(){return t.apply(e,arguments)}},w=function(t,e,n){return null==t?g.identity:g.isFunction(t)?_(t,e,n):g.isObject(t)?g.matcher(t):g.property(t)};g.iteratee=function(t,e){return w(t,e,1/0)};var b=function(t,e){return function(n){var o=arguments.length;if(o<2||null==n)return n;for(var a=1;a<o;a++)for(var r=arguments[a],i=t(r),s=i.length,l=0;l<s;l++){var u=i[l];e&&void 0!==n[u]||(n[u]=r[u])}return n}},D=function(t){if(!g.isObject(t))return{};if(y)return y(t);v.prototype=t;var e=new v;return v.prototype=null,e},k=function(t){return function(e){return null==e?void 0:e[t]}},x=Math.pow(2,53)-1,T=k("length"),M=function(t){var e=T(t);return"number"==typeof e&&e>=0&&e<=x};g.each=g.forEach=function(t,e,n){e=_(e,n);var o,a;if(M(t))for(o=0,a=t.length;o<a;o++)e(t[o],o,t);else{var r=g.keys(t);for(o=0,a=r.length;o<a;o++)e(t[r[o]],r[o],t)}return t},g.map=g.collect=function(t,e,n){e=w(e,n);for(var o=!M(t)&&g.keys(t),a=(o||t).length,r=Array(a),i=0;i<a;i++){var s=o?o[i]:i;r[i]=e(t[s],s,t)}return r},g.reduce=g.foldl=g.inject=t(1),g.reduceRight=g.foldr=t(-1),g.find=g.detect=function(t,e,n){var o;if(void 0!==(o=M(t)?g.findIndex(t,e,n):g.findKey(t,e,n))&&-1!==o)return t[o]},g.filter=g.select=function(t,e,n){var o=[];return e=w(e,n),g.each(t,function(t,n,a){e(t,n,a)&&o.push(t)}),o},g.reject=function(t,e,n){return g.filter(t,g.negate(w(e)),n)},g.every=g.all=function(t,e,n){e=w(e,n);for(var o=!M(t)&&g.keys(t),a=(o||t).length,r=0;r<a;r++){var i=o?o[r]:r;if(!e(t[i],i,t))return!1}return!0},g.some=g.any=function(t,e,n){e=w(e,n);for(var o=!M(t)&&g.keys(t),a=(o||t).length,r=0;r<a;r++){var i=o?o[r]:r;if(e(t[i],i,t))return!0}return!1},g.contains=g.includes=g.include=function(t,e,n,o){return M(t)||(t=g.values(t)),("number"!=typeof n||o)&&(n=0),g.indexOf(t,e,n)>=0},g.invoke=function(t,e){var n=c.call(arguments,2),o=g.isFunction(e);return g.map(t,function(t){var a=o?e:t[e];return null==a?a:a.apply(t,n)})},g.pluck=function(t,e){return g.map(t,g.property(e))},g.where=function(t,e){return g.filter(t,g.matcher(e))},g.findWhere=function(t,e){return g.find(t,g.matcher(e))},g.max=function(t,e,n){var o,a,r=-1/0,i=-1/0;if(null==e&&null!=t){t=M(t)?t:g.values(t);for(var s=0,l=t.length;s<l;s++)(o=t[s])>r&&(r=o)}else e=w(e,n),g.each(t,function(t,n,o){((a=e(t,n,o))>i||a===-1/0&&r===-1/0)&&(r=t,i=a)});return r},g.min=function(t,e,n){var o,a,r=1/0,i=1/0;if(null==e&&null!=t){t=M(t)?t:g.values(t);for(var s=0,l=t.length;s<l;s++)(o=t[s])<r&&(r=o)}else e=w(e,n),g.each(t,function(t,n,o){((a=e(t,n,o))<i||a===1/0&&r===1/0)&&(r=t,i=a)});return r},g.shuffle=function(t){for(var e,n=M(t)?t:g.values(t),o=n.length,a=Array(o),r=0;r<o;r++)e=g.random(0,r),e!==r&&(a[r]=a[e]),a[e]=n[r];return a},g.sample=function(t,e,n){return null==e||n?(M(t)||(t=g.values(t)),t[g.random(t.length-1)]):g.shuffle(t).slice(0,Math.max(0,e))},g.sortBy=function(t,e,n){return e=w(e,n),g.pluck(g.map(t,function(t,n,o){return{value:t,index:n,criteria:e(t,n,o)}}).sort(function(t,e){var n=t.criteria,o=e.criteria;if(n!==o){if(n>o||void 0===n)return 1;if(n<o||void 0===o)return-1}return t.index-e.index}),"value")};var F=function(t){return function(e,n,o){var a={};return n=w(n,o),g.each(e,function(o,r){var i=n(o,r,e);t(a,o,i)}),a}};g.groupBy=F(function(t,e,n){g.has(t,n)?t[n].push(e):t[n]=[e]}),g.indexBy=F(function(t,e,n){t[n]=e}),g.countBy=F(function(t,e,n){g.has(t,n)?t[n]++:t[n]=1}),g.toArray=function(t){return t?g.isArray(t)?c.call(t):M(t)?g.map(t,g.identity):g.values(t):[]},g.size=function(t){return null==t?0:M(t)?t.length:g.keys(t).length},g.partition=function(t,e,n){e=w(e,n);var o=[],a=[];return g.each(t,function(t,n,r){(e(t,n,r)?o:a).push(t)}),[o,a]},g.first=g.head=g.take=function(t,e,n){if(null!=t)return null==e||n?t[0]:g.initial(t,t.length-e)},g.initial=function(t,e,n){return c.call(t,0,Math.max(0,t.length-(null==e||n?1:e)))},g.last=function(t,e,n){if(null!=t)return null==e||n?t[t.length-1]:g.rest(t,Math.max(0,t.length-e))},g.rest=g.tail=g.drop=function(t,e,n){return c.call(t,null==e||n?1:e)},g.compact=function(t){return g.filter(t,g.identity)};var I=function(t,e,n,o){for(var a=[],r=0,i=o||0,s=T(t);i<s;i++){var l=t[i];if(M(l)&&(g.isArray(l)||g.isArguments(l))){e||(l=I(l,e,n));var u=0,c=l.length;for(a.length+=c;u<c;)a[r++]=l[u++]}else n||(a[r++]=l)}return a};g.flatten=function(t,e){return I(t,e,!1)},g.without=function(t){return g.difference(t,c.call(arguments,1))},g.uniq=g.unique=function(t,e,n,o){g.isBoolean(e)||(o=n,n=e,e=!1),null!=n&&(n=w(n,o));for(var a=[],r=[],i=0,s=T(t);i<s;i++){var l=t[i],u=n?n(l,i,t):l;e?(i&&r===u||a.push(l),r=u):n?g.contains(r,u)||(r.push(u),a.push(l)):g.contains(a,l)||a.push(l)}return a},g.union=function(){return g.uniq(I(arguments,!0,!0))},g.intersection=function(t){for(var e=[],n=arguments.length,o=0,a=T(t);o<a;o++){var r=t[o];if(!g.contains(e,r)){for(var i=1;i<n&&g.contains(arguments[i],r);i++);i===n&&e.push(r)}}return e},g.difference=function(t){var e=I(arguments,!0,!0,1);return g.filter(t,function(t){return!g.contains(e,t)})},g.zip=function(){return g.unzip(arguments)},g.unzip=function(t){for(var e=t&&g.max(t,T).length||0,n=Array(e),o=0;o<e;o++)n[o]=g.pluck(t,o);return n},g.object=function(t,e){for(var n={},o=0,a=T(t);o<a;o++)e?n[t[o]]=e[o]:n[t[o][0]]=t[o][1];return n},g.findIndex=e(1),g.findLastIndex=e(-1),g.sortedIndex=function(t,e,n,o){n=w(n,o,1);for(var a=n(e),r=0,i=T(t);r<i;){var s=Math.floor((r+i)/2);n(t[s])<a?r=s+1:i=s}return r},g.indexOf=n(1,g.findIndex,g.sortedIndex),g.lastIndexOf=n(-1,g.findLastIndex),g.range=function(t,e,n){null==e&&(e=t||0,t=0),n=n||1;for(var o=Math.max(Math.ceil((e-t)/n),0),a=Array(o),r=0;r<o;r++,t+=n)a[r]=t;return a};var j=function(t,e,n,o,a){if(!(o instanceof e))return t.apply(n,a);var r=D(t.prototype),i=t.apply(r,a);return g.isObject(i)?i:r};g.bind=function(t,e){if(m&&t.bind===m)return m.apply(t,c.call(arguments,1));if(!g.isFunction(t))throw new TypeError("Bind must be called on a function");var n=c.call(arguments,2),o=function(){return j(t,o,e,this,n.concat(c.call(arguments)))};return o},g.partial=function(t){var e=c.call(arguments,1),n=function(){for(var o=0,a=e.length,r=Array(a),i=0;i<a;i++)r[i]=e[i]===g?arguments[o++]:e[i];for(;o<arguments.length;)r.push(arguments[o++]);return j(t,n,this,this,r)};return n},g.bindAll=function(t){var e,n,o=arguments.length;if(o<=1)throw new Error("bindAll must be passed function names");for(e=1;e<o;e++)n=arguments[e],t[n]=g.bind(t[n],t);return t},g.memoize=function(t,e){var n=function(o){var a=n.cache,r=""+(e?e.apply(this,arguments):o);return g.has(a,r)||(a[r]=t.apply(this,arguments)),a[r]};return n.cache={},n},g.delay=function(t,e){var n=c.call(arguments,2);return setTimeout(function(){return t.apply(null,n)},e)},g.defer=g.partial(g.delay,g,1),g.throttle=function(t,e,n){var o,a,r,i=null,s=0;n||(n={});var l=function(){s=!1===n.leading?0:g.now(),i=null,r=t.apply(o,a),i||(o=a=null)};return function(){var u=g.now();s||!1!==n.leading||(s=u);var c=e-(u-s);return o=this,a=arguments,c<=0||c>e?(i&&(clearTimeout(i),i=null),s=u,r=t.apply(o,a),i||(o=a=null)):i||!1===n.trailing||(i=setTimeout(l,c)),r}},g.debounce=function(t,e,n){var o,a,r,i,s,l=function(){var u=g.now()-i;u<e&&u>=0?o=setTimeout(l,e-u):(o=null,n||(s=t.apply(r,a),o||(r=a=null)))};return function(){r=this,a=arguments,i=g.now();var u=n&&!o;return o||(o=setTimeout(l,e)),u&&(s=t.apply(r,a),r=a=null),s}},g.wrap=function(t,e){return g.partial(e,t)},g.negate=function(t){return function(){return!t.apply(this,arguments)}},g.compose=function(){var t=arguments,e=t.length-1;return function(){for(var n=e,o=t[e].apply(this,arguments);n--;)o=t[n].call(this,o);return o}},g.after=function(t,e){return function(){if(--t<1)return e.apply(this,arguments)}},g.before=function(t,e){var n;return function(){return--t>0&&(n=e.apply(this,arguments)),t<=1&&(e=null),n}},g.once=g.partial(g.before,2);var A=!{toString:null}.propertyIsEnumerable("toString"),S=["valueOf","isPrototypeOf","toString","propertyIsEnumerable","hasOwnProperty","toLocaleString"];g.keys=function(t){if(!g.isObject(t))return[];if(f)return f(t);var e=[];for(var n in t)g.has(t,n)&&e.push(n);return A&&o(t,e),e},g.allKeys=function(t){if(!g.isObject(t))return[];var e=[];for(var n in t)e.push(n);return A&&o(t,e),e},g.values=function(t){for(var e=g.keys(t),n=e.length,o=Array(n),a=0;a<n;a++)o[a]=t[e[a]];return o},g.mapObject=function(t,e,n){e=w(e,n);for(var o,a=g.keys(t),r=a.length,i={},s=0;s<r;s++)o=a[s],i[o]=e(t[o],o,t);return i},g.pairs=function(t){for(var e=g.keys(t),n=e.length,o=Array(n),a=0;a<n;a++)o[a]=[e[a],t[e[a]]];return o},g.invert=function(t){for(var e={},n=g.keys(t),o=0,a=n.length;o<a;o++)e[t[n[o]]]=n[o];return e},g.functions=g.methods=function(t){var e=[];for(var n in t)g.isFunction(t[n])&&e.push(n);return e.sort()},g.extend=b(g.allKeys),g.extendOwn=g.assign=b(g.keys),g.findKey=function(t,e,n){e=w(e,n);for(var o,a=g.keys(t),r=0,i=a.length;r<i;r++)if(o=a[r],e(t[o],o,t))return o},g.pick=function(t,e,n){var o,a,r={},i=t;if(null==i)return r;g.isFunction(e)?(a=g.allKeys(i),o=_(e,n)):(a=I(arguments,!1,!1,1),o=function(t,e,n){return e in n},i=Object(i));for(var s=0,l=a.length;s<l;s++){var u=a[s],c=i[u];o(c,u,i)&&(r[u]=c)}return r},g.omit=function(t,e,n){if(g.isFunction(e))e=g.negate(e);else{var o=g.map(I(arguments,!1,!1,1),String);e=function(t,e){return!g.contains(o,e)}}return g.pick(t,e,n)},g.defaults=b(g.allKeys,!0),g.create=function(t,e){var n=D(t);return e&&g.extendOwn(n,e),n},g.clone=function(t){return g.isObject(t)?g.isArray(t)?t.slice():g.extend({},t):t},g.tap=function(t,e){return e(t),t},g.isMatch=function(t,e){var n=g.keys(e),o=n.length;if(null==t)return!o;for(var a=Object(t),r=0;r<o;r++){var i=n[r];if(e[i]!==a[i]||!(i in a))return!1}return!0};var E=function(t,e,n,o){if(t===e)return 0!==t||1/t==1/e;if(null==t||null==e)return t===e;t instanceof g&&(t=t._wrapped),e instanceof g&&(e=e._wrapped);var a=p.call(t);if(a!==p.call(e))return!1;switch(a){case"[object RegExp]":case"[object String]":return""+t==""+e;case"[object Number]":return+t!=+t?+e!=+e:0==+t?1/+t==1/e:+t==+e;case"[object Date]":case"[object Boolean]":return+t==+e}var r="[object Array]"===a;if(!r){if("object"!=typeof t||"object"!=typeof e)return!1;var i=t.constructor,s=e.constructor;if(i!==s&&!(g.isFunction(i)&&i instanceof i&&g.isFunction(s)&&s instanceof s)&&"constructor"in t&&"constructor"in e)return!1}n=n||[],o=o||[];for(var l=n.length;l--;)if(n[l]===t)return o[l]===e;if(n.push(t),o.push(e),r){if((l=t.length)!==e.length)return!1;for(;l--;)if(!E(t[l],e[l],n,o))return!1}else{var u,c=g.keys(t);if(l=c.length,g.keys(e).length!==l)return!1;for(;l--;)if(u=c[l],!g.has(e,u)||!E(t[u],e[u],n,o))return!1}return n.pop(),o.pop(),!0};g.isEqual=function(t,e){return E(t,e)},g.isEmpty=function(t){return null==t||(M(t)&&(g.isArray(t)||g.isString(t)||g.isArguments(t))?0===t.length:0===g.keys(t).length)},g.isElement=function(t){return!(!t||1!==t.nodeType)},g.isArray=h||function(t){return"[object Array]"===p.call(t)},g.isObject=function(t){var e=typeof t;return"function"===e||"object"===e&&!!t},g.each(["Arguments","Function","String","Number","Date","RegExp","Error"],function(t){g["is"+t]=function(e){return p.call(e)==="[object "+t+"]"}}),g.isArguments(arguments)||(g.isArguments=function(t){return g.has(t,"callee")}),"function"!=typeof/./&&"object"!=typeof Int8Array&&(g.isFunction=function(t){return"function"==typeof t||!1}),g.isFinite=function(t){return isFinite(t)&&!isNaN(parseFloat(t))},g.isNaN=function(t){return g.isNumber(t)&&t!==+t},g.isBoolean=function(t){return!0===t||!1===t||"[object Boolean]"===p.call(t)},g.isNull=function(t){return null===t},g.isUndefined=function(t){return void 0===t},g.has=function(t,e){return null!=t&&d.call(t,e)},g.noConflict=function(){return a._=r,this},g.identity=function(t){return t},g.constant=function(t){return function(){return t}},g.noop=function(){},g.property=k,g.propertyOf=function(t){return null==t?function(){}:function(e){return t[e]}},g.matcher=g.matches=function(t){return t=g.extendOwn({},t),function(e){return g.isMatch(e,t)}},g.times=function(t,e,n){var o=Array(Math.max(0,t));e=_(e,n,1);for(var a=0;a<t;a++)o[a]=e(a);return o},g.random=function(t,e){return null==e&&(e=t,t=0),t+Math.floor(Math.random()*(e-t+1))},g.now=Date.now||function(){return(new Date).getTime()};var O={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#x27;","`":"&#x60;"},N=g.invert(O),C=function(t){var e=function(e){return t[e]},n="(?:"+g.keys(t).join("|")+")",o=RegExp(n),a=RegExp(n,"g");return function(t){return t=null==t?"":""+t,o.test(t)?t.replace(a,e):t}};g.escape=C(O),g.unescape=C(N),g.result=function(t,e,n){var o=null==t?void 0:t[e];return void 0===o&&(o=n),g.isFunction(o)?o.call(t):o};var Y=0;g.uniqueId=function(t){var e=++Y+"";return t?t+e:e},g.templateSettings={evaluate:/<%([\s\S]+?)%>/g,interpolate:/<%=([\s\S]+?)%>/g,escape:/<%-([\s\S]+?)%>/g};var B=/(.)^/,L={"'":"'","\\":"\\","\r":"r","\n":"n","\u2028":"u2028","\u2029":"u2029"},P=/\\|'|\r|\n|\u2028|\u2029/g,J=function(t){return"\\"+L[t]};g.template=function(t,e,n){!e&&n&&(e=n),e=g.defaults({},e,g.templateSettings);var o=RegExp([(e.escape||B).source,(e.interpolate||B).source,(e.evaluate||B).source].join("|")+"|$","g"),a=0,r="__p+='";t.replace(o,function(e,n,o,i,s){return r+=t.slice(a,s).replace(P,J),a=s+e.length,n?r+="'+\n((__t=("+n+"))==null?'':_.escape(__t))+\n'":o?r+="'+\n((__t=("+o+"))==null?'':__t)+\n'":i&&(r+="';\n"+i+"\n__p+='"),e}),r+="';\n",e.variable||(r="with(obj||{}){\n"+r+"}\n"),r="var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n"+r+"return __p;\n";try{var i=new Function(e.variable||"obj","_",r)}catch(t){throw t.source=r,t}var s=function(t){return i.call(this,t,g)};return s.source="function("+(e.variable||"obj")+"){\n"+r+"}",s},g.chain=function(t){var e=g(t);return e._chain=!0,e};var R=function(t,e){return t._chain?g(e).chain():e};g.mixin=function(t){g.each(g.functions(t),function(e){var n=g[e]=t[e];g.prototype[e]=function(){var t=[this._wrapped];return u.apply(t,arguments),R(this,n.apply(g,t))}})},g.mixin(g),g.each(["pop","push","reverse","shift","sort","splice","unshift"],function(t){var e=i[t];g.prototype[t]=function(){var n=this._wrapped;return e.apply(n,arguments),"shift"!==t&&"splice"!==t||0!==n.length||delete n[0],R(this,n)}}),g.each(["concat","join","slice"],function(t){var e=i[t];g.prototype[t]=function(){return R(this,e.apply(this._wrapped,arguments))}}),g.prototype.value=function(){return this._wrapped},g.prototype.valueOf=g.prototype.toJSON=g.prototype.value,g.prototype.toString=function(){return""+this._wrapped},"function"==typeof define&&define.amd&&define("underscore",[],function(){return g})}).call(this),window.calendar_languages||(window.calendar_languages={}),window.calendar_languages["es-ES"]={error_noview:"Calendario: Vista {0} no encontrada",error_dateformat:'Calendario: Formato de fecha invÃ¡lido {0}. Debe ser "now" o "yyyy-mm-dd"',error_loadurl:"Calendario: URL de carga de eventos no configurada",error_where:'Calendario: DirecciÃ³n de navegaciÃ³n incorrecta {0}. Los valores correctos son "next" o "prev" o "today"',error_timedevide:"Calendario: parÃ¡metro para el separador de hora debe dividir 60 por un entero. Por ejemplo 10, 15, 30",no_events_in_day:"No hay eventos hoy",title_year:"AÃ±o {0}",title_month:"{0} {1}",title_week:"Semana {0} del {1}",title_day:"{0} {1} {2} {3}",week:"Semana {0}",all_day:"Todo el dÃ­a",time:"Tiempo",events:"Eventos",before_time:"Horas previas",after_time:"Horas posteriores",m0:"Enero",m1:"Febrero",m2:"Marzo",m3:"Abril",m4:"Mayo",m5:"Junio",m6:"Julio",m7:"Agosto",m8:"Septiembre",m9:"Octubre",m10:"Noviembre",m11:"Diciembre",ms0:"Ene",ms1:"Feb",ms2:"Mar",ms3:"Abr",ms4:"May",ms5:"Jun",ms6:"Jul",ms7:"Ago",ms8:"Sep",ms9:"Oct",ms10:"Nov",ms11:"Dic",d0:"Domingo",d1:"Lunes",d2:"Martes",d3:"MiÃ©rcoles",d4:"Jueves",d5:"Viernes",d6:"SÃ¡bado",easter:"Pascua",easterMonday:"Lunes de Pascua",first_day:1,week_numbers_iso_8601:!0,holidays:{"01-01":"AÃ±o Nuevo","06-01":"DÃ­a de Reyes","19-03":"San JosÃ©","easter-3":"Jueves Santo","easter-2":"Viernes Santo",easter:"Pascua","easter+1":"Lunes de Pascua","01-05":"DÃ­a del Trabajador","15-08":"AsunciÃ³n","12-10":"Fiesta Nacional de EspaÃ±a","01-11":"DÃ­a de todos los Santos","06-12":"DÃ­a de la ConstituciÃ³n","08-12":"Inmaculada ConcepciÃ³n","25-12":"Navidad"}},Date.prototype.getWeek=function(t){if(t){var e=new Date(this.valueOf()),n=(this.getDay()+6)%7;e.setDate(e.getDate()-n+3);var o=e.valueOf();return e.setMonth(0,1),4!=e.getDay()&&e.setMonth(0,1+(4-e.getDay()+7)%7),1+Math.ceil((o-e)/6048e5)}var a=new Date(this.getFullYear(),0,1);return Math.ceil(((this.getTime()-a.getTime())/864e5+a.getDay()+1)/7)},Date.prototype.getMonthFormatted=function(){var t=this.getMonth()+1;return t<10?"0"+t:t},Date.prototype.getDateFormatted=function(){var t=this.getDate();return t<10?"0"+t:t},String.prototype.format||(String.prototype.format=function(){var t=arguments;return this.replace(/{(\d+)}/g,function(e,n){return void 0!==t[n]?t[n]:e})}),String.prototype.formatNum||(String.prototype.formatNum=function(t){for(var e=""+this;e.length<t;)e="0"+e;return e}),function(t){function e(t,e){var n,o,a;a=t,n=t.indexOf("?")<0?"?":"&";for(o in e)a+=n+o+"="+encodeURIComponent(e[o]),n="&";return a}function n(e,n){var o=null!=e.options[n]?e.options[n]:null,a=null!=e.locale[n]?e.locale[n]:null;if("holidays"==n&&e.options.merge_holidays){var r={};return t.extend(!0,r,a||u.holidays),o&&t.extend(!0,r,o),r}return null!=o?o:null!=a?a:u[n]}function o(e,r){var i=[],l=n(e,"holidays");for(var u in l)i.push(u+":"+l[u]);if(i.push(r),(i=i.join("|"))in o.cache)return o.cache[i];var c=[];return t.each(l,function(e,n){var o=null,i=null,l=!1;if(t.each(e.split(">"),function(t,n){var u,c=null;if(u=/^(\d\d)-(\d\d)$/.exec(n))c=new Date(r,parseInt(u[2],10)-1,parseInt(u[1],10));else if(u=/^(\d\d)-(\d\d)-(\d\d\d\d)$/.exec(n))parseInt(u[3],10)==r&&(c=new Date(r,parseInt(u[2],10)-1,parseInt(u[1],10)));else if(u=/^easter(([+\-])(\d+))?$/.exec(n))c=s(r,u[1]?parseInt(u[1],10):0);else if(u=/^(\d\d)([+\-])([1-5])\*([0-6])$/.exec(n)){var p=parseInt(u[1],10)-1,d=u[2],h=parseInt(u[3]),f=parseInt(u[4]);switch(d){case"+":for(var m=new Date(r,p,-6);m.getDay()!=f;)m=new Date(m.getFullYear(),m.getMonth(),m.getDate()+1);c=new Date(m.getFullYear(),m.getMonth(),m.getDate()+7*h);break;case"-":for(var m=new Date(r,p+1,7);m.getDay()!=f;)m=new Date(m.getFullYear(),m.getMonth(),m.getDate()-1);c=new Date(m.getFullYear(),m.getMonth(),m.getDate()-7*h)}}if(!c)return a("Unknown holiday: "+e),l=!0,!1;switch(t){case 0:o=c;break;case 1:if(c.getTime()<=o.getTime())return a("Unknown holiday: "+e),l=!0,!1;i=c;break;default:return a("Unknown holiday: "+e),l=!0,!1}}),!l){var u=[];if(i)for(var p=new Date(o.getTime());p.getTime()<=i.getTime();p.setDate(p.getDate()+1))u.push(new Date(p.getTime()));else u.push(o);c.push({name:n,days:u})}}),o.cache[i]=c,o.cache[i]}function a(e){"object"==t.type(window.console)&&"function"==t.type(window.console.warn)&&window.console.warn("[Bootstrap-Calendar] "+e)}function r(e,n){return this.options=t.extend(!0,{position:{start:new Date,end:new Date}},l,e),this.setLanguage(this.options.language),this.context=n,n.css("width",this.options.width).addClass("cal-context"),this.view(),this}function i(e,n,o,a){e.stopPropagation();var n=t(n),r=n.closest(".cal-cell"),i=r.closest(".cal-before-eventlist"),s=r.data("cal-row");n.fadeOut("fast"),o.slideUp("fast",function(){var e=t(".events-list",r);o.html(a.options.templates["events-list"]({cal:a,events:a.getEventsBetween(parseInt(e.data("cal-start")),parseInt(e.data("cal-end")))})),i.after(o),a.activecell=t("[data-cal-date]",r).text(),t("#cal-slide-tick").addClass("tick"+s).show(),o.slideDown("fast",function(){t("body").one("click",function(){o.slideUp("fast"),a.activecell=0})})}),setTimeout(function(){t("a.event-item").mouseenter(function(){t('a[data-event-id="'+t(this).data("event-id")+'"]').closest(".cal-cell1").addClass("day-highlight dh-"+t(this).data("event-class"))}),t("a.event-item").mouseleave(function(){t("div.cal-cell1").removeClass("day-highlight dh-"+t(this).data("event-class"))}),a._update_modal()},400)}function s(t,e){var n=t%19,o=Math.floor(t/100),a=t%100,r=Math.floor(o/4),i=o%4,s=Math.floor((o+8)/25),l=Math.floor((o-s+1)/3),u=(19*n+o-r-l+15)%30,c=Math.floor(a/4),p=a%4,d=(32+2*i+2*c-u-p)%7,h=Math.floor((n+11*u+22*d)/451),f=u+d+7*h+114,m=Math.floor(f/31)-1,y=f%31+1;return new Date(t,m,y+(e||0),0,0,0)}var l={tooltip_container:"body",width:"100%",view:"month",day:"now",time_start:"06:00",time_end:"22:00",time_split:"30",events_source:"",events_cache:!1,format12:!1,am_suffix:"AM",pm_suffix:"PM",tmpl_path:"tmpls/",tmpl_cache:!0,classes:{months:{inmonth:"cal-day-inmonth",outmonth:"cal-day-outmonth",saturday:"cal-day-weekend",sunday:"cal-day-weekend",holidays:"cal-day-holiday",today:"cal-day-today"},week:{workday:"cal-day-workday",saturday:"cal-day-weekend",sunday:"cal-day-weekend",holidays:"cal-day-holiday",today:"cal-day-today"}},modal:null,modal_type:"iframe",modal_title:null,views:{year:{slide_events:1,enable:1},month:{slide_events:1,enable:1},week:{enable:1},day:{enable:1}},merge_holidays:!1,display_week_numbers:!0,weekbox:!0,onAfterEventsLoad:function(t){},onBeforeEventsLoad:function(t){t()},onAfterViewLoad:function(t){},onAfterModalShown:function(t){},onAfterModalHidden:function(t){},events:[],templates:{year:"",month:"",week:"",day:""},stop_cycling:!1},u={first_day:2,week_numbers_iso_8601:!1,holidays:{"01-01":"New Year's Day","01+3*1":"Birthday of Dr. Martin Luther King, Jr.","02+3*1":"Washington's Birthday","05-1*1":"Memorial Day","04-07":"Independence Day","09+1*1":"Labor Day","10+2*1":"Columbus Day","11-11":"Veterans Day","11+4*4":"Thanksgiving Day","25-12":"Christmas"}},c={error_noview:"Calendar: View {0} not found",error_dateformat:'Calendar: Wrong date format {0}. Should be either "now" or "yyyy-mm-dd"',error_loadurl:"Calendar: Event URL is not set",error_where:'Calendar: Wrong navigation direction {0}. Can be only "next" or "prev" or "today"',error_timedevide:"Calendar: Time split parameter should divide 60 without decimals. Something like 10, 15, 30",no_events_in_day:"No events in this day.",title_year:"{0}",title_month:"{0} {1}",title_week:"week {0} of {1}",title_day:"{0} {1} {2}, {3}",week:"Week {0}",all_day:"All day",time:"Time",events:"Events",before_time:"Ends before timeline",after_time:"Starts after timeline",m0:"January",m1:"February",m2:"March",m3:"April",m4:"May",m5:"June",m6:"July",m7:"August",m8:"September",m9:"October",m10:"November",m11:"December",ms0:"Jan",ms1:"Feb",ms2:"Mar",ms3:"Apr",ms4:"May",ms5:"Jun",ms6:"Jul",ms7:"Aug",ms8:"Sep",ms9:"Oct",ms10:"Nov",ms11:"Dec",d0:"Sunday",d1:"Monday",d2:"Tuesday",d3:"Wednesday",d4:"Thursday",d5:"Friday",d6:"Saturday"},p="";try{"object"==t.type(window.jstz)&&"function"==t.type(jstz.determine)&&(p=jstz.determine().name(),"string"!==t.type(p)&&(p=""))}catch(t){}o.cache={},r.prototype.setOptions=function(e){t.extend(this.options,e),"language"in e&&this.setLanguage(e.language),"modal"in e&&this._update_modal()},r.prototype.setLanguage=function(e){window.calendar_languages&&e in window.calendar_languages?(this.locale=t.extend(!0,{},c,calendar_languages[e]),this.options.language=e):(this.locale=c,delete this.options.language)},r.prototype._render=function(){this.context.html(""),this._loadTemplate(this.options.view),this.stop_cycling=!1;var t={};t.cal=this,t.day=1,1==n(this,"first_day")?t.days_name=[this.locale.d1,this.locale.d2,this.locale.d3,this.locale.d4,this.locale.d5,this.locale.d6,this.locale.d0]:t.days_name=[this.locale.d0,this.locale.d1,this.locale.d2,this.locale.d3,this.locale.d4,this.locale.d5,this.locale.d6];var e=parseInt(this.options.position.start.getTime()),o=parseInt(this.options.position.end.getTime());switch(t.events=this.getEventsBetween(e,o),this.options.view){case"month":break;case"week":case"day":this._calculate_hour_minutes(t)}t.start=new Date(this.options.position.start.getTime()),t.lang=this.locale,this.context.append(this.options.templates[this.options.view](t)),this._update()},r.prototype._format_hour=function(t){var e=t.split(":"),n=parseInt(e[0]),o=parseInt(e[1]),a="";return this.options.format12&&(a=n<12?this.options.am_suffix:this.options.pm_suffix,0==(n%=12)&&(n=12)),n.toString().formatNum(2)+":"+o.toString().formatNum(2)+a},r.prototype._format_time=function(t){return this._format_hour(t.getHours()+":"+t.getMinutes())},r.prototype._calculate_hour_minutes=function(e){var n=this,o=parseInt(this.options.time_split),r=60/o,i=Math.min(r,1);(r>=1&&r%1!=0||r<1&&1440/o%1!=0)&&t.error(this.locale.error_timedevide);var s=this.options.time_start.split(":"),l=this.options.time_end.split(":");e.hours=(parseInt(l[0])-parseInt(s[0]))*i;var u=e.hours*r-parseInt(s[1])/o,c=6e4*o,p=new Date(this.options.position.start.getTime());p.setHours(s[0]),p.setMinutes(s[1]);var d=new Date(this.options.position.end.getTime());d.setHours(l[0]),d.setMinutes(l[1]),e.all_day=[],e.by_hour=[],e.after_time=[],e.before_time=[],t.each(e.events,function(t,o){var r=new Date(parseInt(o.start)),i=new Date(parseInt(o.end));if(o.start_hour=n._format_time(r),o.end_hour=n._format_time(i),o.start<p.getTime()&&(a(1),o.start_hour=r.getDate()+" "+n.locale["ms"+r.getMonth()]+" "+o.start_hour),o.end>d.getTime()&&(a(1),o.end_hour=i.getDate()+" "+n.locale["ms"+i.getMonth()]+" "+o.end_hour),o.start<p.getTime()&&o.end>d.getTime())return void e.all_day.push(o);if(o.end<p.getTime())return void e.before_time.push(o);if(o.start>d.getTime())return void e.after_time.push(o);var s=p.getTime()-o.start;o.top=s>=0?0:Math.abs(s)/c;var l=Math.abs(u-o.top),h=(o.end-o.start)/c;s>=0&&(h=(o.end-p.getTime())/c),o.lines=h,h>l&&(o.lines=l),e.by_hour.push(o)})},r.prototype._hour_min=function(t){var e=this.options.time_start.split(":"),n=parseInt(this.options.time_split),o=60/n;return 0==t?o-parseInt(e[1])/n:o},r.prototype._hour=function(t,e){var n=this.options.time_start.split(":"),o=parseInt(this.options.time_split),a=""+(parseInt(n[0])+t*Math.max(o/60,1)),r=""+o*e;return this._format_hour(a.formatNum(2)+":"+r.formatNum(2))},r.prototype._week=function(e){this._loadTemplate("week-days");var o={},a=parseInt(this.options.position.start.getTime()),r=parseInt(this.options.position.end.getTime()),i=[],s=this,l=n(this,"first_day");return t.each(this.getEventsBetween(a,r),function(t,e){e.start_day=new Date(parseInt(e.start)).getDay(),1==l&&(e.start_day=(e.start_day+6)%7),e.end-e.start<=864e5?e.days=1:e.days=(e.end-e.start)/864e5,e.start<a&&(e.days=e.days-(a-e.start)/864e5,e.start_day=0),e.days=Math.ceil(e.days),e.start_day+e.days>7&&(e.days=7-e.start_day),i.push(e)}),o.events=i,o.cal=this,s.options.templates["week-days"](o)},r.prototype._month=function(t){this._loadTemplate("year-month");var e={cal:this},n=t+1;e.data_day=this.options.position.start.getFullYear()+"-"+(n<10?"0"+n:n)+"-01",e.month_name=this.locale["m"+t];var o=new Date(this.options.position.start.getFullYear(),t,1,0,0,0);return e.start=parseInt(o.getTime()),e.end=parseInt(new Date(this.options.position.start.getFullYear(),t+1,1,0,0,0).getTime()),e.events=this.getEventsBetween(e.start,e.end),this.options.templates["year-month"](e)},r.prototype._day=function(e,o){this._loadTemplate("month-day");var a={tooltip:"",cal:this},r=this.options.classes.months.outmonth,i=this.options.position.start.getDay();2==n(this,"first_day")?i++:i=0==i?7:i,o=o-i+1;var s=new Date(this.options.position.start.getFullYear(),this.options.position.start.getMonth(),o,0,0,0);o>0&&(r=this.options.classes.months.inmonth);var l=new Date(this.options.position.end.getTime()-1).getDate();if(o+1>l&&(this.stop_cycling=!0),o>l&&(o-=l,r=this.options.classes.months.outmonth),r=t.trim(r+" "+this._getDayClass("months",s)),o<=0){o=new Date(this.options.position.start.getFullYear(),this.options.position.start.getMonth(),0).getDate()-Math.abs(o),r+=" cal-month-first-row"}var u=this._getHoliday(s);return!1!==u&&(a.tooltip=u),a.data_day=s.getFullYear()+"-"+s.getMonthFormatted()+"-"+(o<10?"0"+o:o),a.cls=r,a.day=o,a.start=parseInt(s.getTime()),a.end=parseInt(a.start+864e5),a.events=this.getEventsBetween(a.start,a.end),this.options.templates["month-day"](a)},r.prototype._getHoliday=function(e){var n=!1;return t.each(o(this,e.getFullYear()),function(){var o=!1;if(t.each(this.days,function(){if(this.toDateString()==e.toDateString())return o=!0,!1}),o)return n=this.name,!1}),n},r.prototype._getHolidayName=function(t){var e=this._getHoliday(t);return!1===e?"":e},r.prototype._getDayClass=function(t,e){var n=this,o=function(e,o){var a;"string"==typeof(a=n.options.classes&&t in n.options.classes&&e in n.options.classes[t]?n.options.classes[t][e]:"")&&a.length&&o.push(a)},a=[];switch(e.toDateString()==(new Date).toDateString()&&o("today",a),!1!==this._getHoliday(e)&&o("holidays",a),e.getDay()){case 0:o("sunday",a);break;case 6:o("saturday",a)}return o(e.toDateString(),a),a.join(" ")},r.prototype.view=function(t){if(t){if(!this.options.views[t].enable)return;this.options.view=t}this._init_position(),this._loadEvents(),this._render(),this.options.onAfterViewLoad.call(this,this.options.view)},r.prototype.navigate=function(e,n){var o=t.extend({},this.options.position);if("next"==e)switch(this.options.view){case"year":o.start.setFullYear(this.options.position.start.getFullYear()+1);break;case"month":o.start.setMonth(this.options.position.start.getMonth()+1);break;case"week":o.start.setDate(this.options.position.start.getDate()+7);break;case"day":o.start.setDate(this.options.position.start.getDate()+1)}else if("prev"==e)switch(this.options.view){case"year":o.start.setFullYear(this.options.position.start.getFullYear()-1);break;case"month":o.start.setMonth(this.options.position.start.getMonth()-1);break;case"week":o.start.setDate(this.options.position.start.getDate()-7);break;case"day":o.start.setDate(this.options.position.start.getDate()-1)}else"today"==e?o.start.setTime((new Date).getTime()):t.error(this.locale.error_where.format(e));this.options.day=o.start.getFullYear()+"-"+o.start.getMonthFormatted()+"-"+o.start.getDateFormatted(),this.view(),_.isFunction(n)&&n()},r.prototype._init_position=function(){var e,o,a;if("now"==this.options.day){var r=new Date;e=r.getFullYear(),o=r.getMonth(),a=r.getDate()}else if(this.options.day.match(/^\d{4}-\d{2}-\d{2}$/g)){var i=this.options.day.split("-");e=parseInt(i[0],10),o=parseInt(i[1],10)-1,a=parseInt(i[2],10)}else t.error(this.locale.error_dateformat.format(this.options.day));switch(this.options.view){case"year":
this.options.position.start.setTime(new Date(e,0,1).getTime()),this.options.position.end.setTime(new Date(e+1,0,1).getTime());break;case"month":this.options.position.start.setTime(new Date(e,o,1).getTime()),this.options.position.end.setTime(new Date(e,o+1,1).getTime());break;case"day":this.options.position.start.setTime(new Date(e,o,a).getTime()),this.options.position.end.setTime(new Date(e,o,a+1).getTime());break;case"week":var s,l=new Date(e,o,a);s=1==n(this,"first_day")?l.getDate()-(l.getDay()+6)%7:l.getDate()-l.getDay(),this.options.position.start.setTime(new Date(e,o,s).getTime()),this.options.position.end.setTime(new Date(e,o,s+7).getTime());break;default:t.error(this.locale.error_noview.format(this.options.view))}return this},r.prototype.getTitle=function(){var t=this.options.position.start;switch(this.options.view){case"year":return this.locale.title_year.format(t.getFullYear());case"month":return this.locale.title_month.format(this.locale["m"+t.getMonth()],t.getFullYear());case"week":return this.locale.title_week.format(t.getWeek(n(this,"week_numbers_iso_8601")),t.getFullYear());case"day":return this.locale.title_day.format(this.locale["d"+t.getDay()],t.getDate(),this.locale["m"+t.getMonth()],t.getFullYear())}},r.prototype.getYear=function(){return this.options.position.start.getFullYear()},r.prototype.getMonth=function(){var t=this.options.position.start;return this.locale["m"+t.getMonth()]},r.prototype.getDay=function(){var t=this.options.position.start;return this.locale["d"+t.getDay()]},r.prototype.isToday=function(){var t=(new Date).getTime();return t>this.options.position.start&&t<this.options.position.end},r.prototype.getStartDate=function(){return this.options.position.start},r.prototype.getEndDate=function(){return this.options.position.end},r.prototype._loadEvents=function(){var n=this,o=null;"events_source"in this.options&&""!==this.options.events_source?o=this.options.events_source:"events_url"in this.options&&(o=this.options.events_url,a("The events_url option is DEPRECATED and it will be REMOVED in near future. Please use events_source instead."));var r;switch(t.type(o)){case"function":r=function(){return o(n.options.position.start,n.options.position.end,p)};break;case"array":r=function(){return[].concat(o)};break;case"string":o.length&&(r=function(){var a=[],r=n.options.position.start,i=n.options.position.end,s={from:r.getTime(),to:i.getTime(),utc_offset_from:r.getTimezoneOffset(),utc_offset_to:i.getTimezoneOffset()};return p.length&&(s.browser_timezone=p),t.ajax({url:e(o,s),dataType:"json",type:"GET",async:!1}).done(function(e){e.success||t.error(e.error),e.result&&(a=e.result)}),a})}r||t.error(this.locale.error_loadurl),this.options.onBeforeEventsLoad.call(this,function(){n.options.events.length&&n.options.events_cache||(n.options.events=r(),n.options.events.sort(function(t,e){var n;return n=t.start-e.start,0==n&&(n=t.end-e.end),n})),n.options.onAfterEventsLoad.call(n,n.options.events)})},r.prototype._templatePath=function(t){return"function"==typeof this.options.tmpl_path?this.options.tmpl_path(t):this.options.tmpl_path+t+".html"},r.prototype._loadTemplate=function(e){if(!this.options.templates[e]){var n=this;t.ajax({url:n._templatePath(e),dataType:"html",type:"GET",async:!1,cache:this.options.tmpl_cache}).done(function(t){n.options.templates[e]=_.template(t)})}},r.prototype._update=function(){var e=this;t('*[data-toggle="tooltip"]').tooltip({container:this.options.tooltip_container}),t("*[data-cal-date]").click(function(){var n=t(this).data("cal-view");e.options.day=t(this).data("cal-date"),e.view(n)}),t(".cal-cell").dblclick(function(){var n=t("[data-cal-date]",this).data("cal-view");e.options.day=t("[data-cal-date]",this).data("cal-date"),e.view(n)}),this["_update_"+this.options.view](),this._update_modal()},r.prototype._update_modal=function(){var e=this;if(t("a[data-event-id]",this.context).unbind("click"),e.options.modal){var n=t(e.options.modal);if(n.length){var o=null;"iframe"==e.options.modal_type&&(o=t(document.createElement("iframe")).attr({width:"100%",frameborder:"0"})),t("a[data-event-id]",this.context).on("click",function(a){a.preventDefault(),a.stopPropagation();var r=t(this).attr("href"),i=t(this).data("event-id"),a=_.find(e.options.events,function(t){return t.id==i});"iframe"==e.options.modal_type&&(o.attr("src",r),t(".modal-body",n).html(o)),(!n.data("handled.bootstrap-calendar")||n.data("handled.bootstrap-calendar")&&n.data("handled.event-id")!=a.id)&&n.off("show.bs.modal").off("shown.bs.modal").off("hidden.bs.modal").on("show.bs.modal",function(){var o=t(this).find(".modal-body");switch(e.options.modal_type){case"iframe":var i=o.height()-parseInt(o.css("padding-top"),10)-parseInt(o.css("padding-bottom"),10);t(this).find("iframe").height(Math.max(i,50));break;case"ajax":t.ajax({url:r,dataType:"html",async:!1,success:function(t){o.html(t)}});break;case"template":e._loadTemplate("modal"),o.html(e.options.templates.modal({event:a,calendar:e}))}_.isFunction(e.options.modal_title)&&n.find(".modal-title").html(e.options.modal_title(a))}).on("shown.bs.modal",function(){e.options.onAfterModalShown.call(e,e.options.events)}).on("hidden.bs.modal",function(){e.options.onAfterModalHidden.call(e,e.options.events)}).data("handled.bootstrap-calendar",!0).data("handled.event-id",a.id),n.modal("show")})}}},r.prototype._update_day=function(){t("#cal-day-panel").height(t("#cal-day-panel-hour").height())},r.prototype._update_week=function(){},r.prototype._update_year=function(){this._update_month_year()},r.prototype._update_month=function(){this._update_month_year();var e=this;if(1==this.options.weekbox){var o=t(document.createElement("div")).attr("id","cal-week-box"),a=this.options.position.start.getFullYear()+"-"+this.options.position.start.getMonthFormatted()+"-";e.context.find(".cal-month-box .cal-row-fluid").on("mouseenter",function(){var r=new Date(e.options.position.start),i=t(".cal-cell1:first-child .cal-month-day",this),s=i.hasClass("cal-month-first-row")?1:t("[data-cal-date]",i).text();r.setDate(parseInt(s)),s=s<10?"0"+s:s,o.html(e.locale.week.format(1==e.options.display_week_numbers?r.getWeek(n(e,"week_numbers_iso_8601")):"")),o.attr("data-cal-week",a+s).show().appendTo(i)}).on("mouseleave",function(){o.hide()}),o.click(function(){e.options.day=t(this).data("cal-week"),e.view("week")})}e.context.find("a.event").mouseenter(function(){t('a[data-event-id="'+t(this).data("event-id")+'"]').closest(".cal-cell1").addClass("day-highlight dh-"+t(this).data("event-class"))}),e.context.find("a.event").mouseleave(function(){t("div.cal-cell1").removeClass("day-highlight dh-"+t(this).data("event-class"))})},r.prototype._update_month_year=function(){if(this.options.views[this.options.view].slide_events){var e=this,n=t(document.createElement("div")).attr("id","cal-day-tick").html('<i class="icon-chevron-down glyphicon glyphicon-chevron-down"></i>');e.context.find(".cal-month-day, .cal-year-box .span3").on("mouseenter",function(){0!=t(".events-list",this).length&&t(this).children("[data-cal-date]").text()!=e.activecell&&n.show().appendTo(this)}).on("mouseleave",function(){n.hide()}).on("click",function(a){0!=t(".events-list",this).length&&t(this).children("[data-cal-date]").text()!=e.activecell&&i(a,n,o,e)});var o=t(document.createElement("div")).attr("id","cal-slide-box");o.hide().click(function(t){t.stopPropagation()}),this._loadTemplate("events-list"),n.click(function(n){i(n,t(this),o,e)})}},r.prototype.getEventsBetween=function(e,n){var o=[];return t.each(this.options.events,function(){if(null==this.start)return!0;var t=this.end||this.start;parseInt(this.start)<n&&parseInt(t)>=e&&o.push(this)}),o},t.fn.calendar=function(t){return new r(t,this)}}(jQuery);