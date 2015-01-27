
<!DOCTYPE html>
<html class="projects_show  fontface no-js" lang="en">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# kickstarter: http://ogp.me/ns/fb/kickstarter#"><script>
  //<![CDATA[
    docElement = this.document.documentElement;
    docElement.className=docElement.className.replace(/\bno-js\b/,'') + 'js';
  //]]>
</script>
<title>BlocksCAD: Easy 3D CAD for Kids & Adults, Open-Sourced by Einstein's Workshop &mdash; Kickstarter</title><script>
  //<![CDATA[
    window.report_errors = true;
    window.honeybadger_configuration = {
      api_key : "02ab109335c0dd1a93506d92f22217a7",
      environment : "production",
      component : "projects",
      action : "show",
      onerror : false
    };
  //]]>
</script>


<!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-5.newrelic.com","errorBeacon":"bam.nr-data.net","licenseKey":"b04b883ad2","applicationID":"11086","transactionName":"cFteRUULX1wHFhtIEFxeVVJDFxxDCgtD","queueTime":1,"applicationTime":255,"ttGuid":"","agentToken":null,"agent":"js-agent.newrelic.com/nr-412.min.js","userAttributes":"SEk="}</script>
<script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"Vw4BVEVSCQMIUg=="};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e){function n(t,e,n){n||(n={});for(var r=o[t],a=r&&r.length||0,s=n[i]||(n[i]={}),u=0;a>u;u++)r[u].apply(s,e);return s}function r(t,e){var n=o[t]||(o[t]=[]);n.push(e)}var o={},i="nr@context";e.exports={on:r,emit:n}},{}],2:[function(t){function e(t,e,n,i,s){try{u?u-=1:r("err",[s||new UncaughtException(t,e,n)])}catch(c){try{r("ierr",[c,(new Date).getTime(),!0])}catch(d){}}return"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(6),i=t(5),a=window.onerror,s=!1,u=0;t("loader").features.push("err"),window.onerror=e,NREUM.noticeError=n;try{throw new Error}catch(c){"stack"in c&&(t(1),t(2),"addEventListener"in window&&t(3),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(4),s=!0)}i.on("fn-start",function(){s&&(u+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&u>0&&(u-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:5,2:4,3:3,4:6,5:1,6:14,handle:"D5DuLP",loader:"G9z0Bl"}],3:[function(t){function e(t){r.inPlace(t,["addEventListener","removeEventListener"],"-",n)}function n(t){return t[1]}var r=t(1),o=(t(3),t(2));if(e(window),"getPrototypeOf"in Object){for(var i=document;i&&!i.hasOwnProperty("addEventListener");)i=Object.getPrototypeOf(i);i&&e(i);for(var a=XMLHttpRequest.prototype;a&&!a.hasOwnProperty("addEventListener");)a=Object.getPrototypeOf(a);a&&e(a)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&e(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=e["nr@wrapped"]?t[1]=e["nr@wrapped"]:e["nr@wrapped"]=t[1]=r(e,"fn-"):"function"==typeof e.handleEvent&&r.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:15,2:1,3:14}],4:[function(t){var e=(t(3),t(1)),n=t(2);e.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=e(t[0],"fn-")})},{1:15,2:1,3:14}],5:[function(t){function e(t){var e=t[0];"string"==typeof e&&(e=new Function(e)),t[0]=n(e,"fn-")}var n=(t(3),t(1)),r=t(2);n.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",e)},{1:15,2:1,3:14}],6:[function(t){function e(){o.inPlace(this,s,"fn-")}function n(t,e){o.inPlace(e,["onreadystatechange"],"fn-")}function r(t,e){return e}var o=t(1),i=t(2),a=window.XMLHttpRequest,s=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];window.XMLHttpRequest=function(t){var n=new a(t);try{i.emit("new-xhr",[],n),o.inPlace(n,["addEventListener","removeEventListener"],"-",function(t,e){return e}),n.addEventListener("readystatechange",e,!1)}catch(r){try{i.emit("internal-error",r)}catch(s){}}return n},window.XMLHttpRequest.prototype=a.prototype,o.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",r),i.on("send-xhr-start",n),i.on("open-xhr-start",n)},{1:15,2:1}],7:[function(t){function e(){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;u>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,c="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,d=e(c);if(d&&(r.rxSize=d),this.sameOrigin){var f=t.getResponseHeader("X-NewRelic-App-Data");f&&(n.cat=f.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}t("loader").features.push("xhr");var o=t("handle"),i=t(1),a=t(5),s=["load","error","abort","timeout"],u=s.length,c=t(2);t(3),t(4),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var c=e(o);c&&(r.txSize=c)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){try{a.emit("internal-error",e)}catch(r){}}};for(var d=0;u>d;d++)n.addEventListener(s[d],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+c(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+c(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)&&e()},{1:8,2:11,3:3,4:6,5:1,handle:"D5DuLP",loader:"G9z0Bl"}],8:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],D5DuLP:[function(t,e){function n(t,e){var n=r[t];return n?n.apply(this,e):(o[t]||(o[t]=[]),void o[t].push(e))}var r={},o={};e.exports=n,n.queues=o,n.handlers=r},{}],11:[function(t,e){function n(t){if(!t||"object"!=typeof t&&"function"!=typeof t)return-1;if(t===window)return 0;if(o.call(t,"__nr"))return t.__nr;try{return Object.defineProperty(t,"__nr",{value:r,writable:!0,enumerable:!1}),r}catch(e){return t.__nr=r,r}finally{r+=1}}var r=1,o=Object.prototype.hasOwnProperty;e.exports=n},{}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],G9z0Bl:[function(t,e){function n(){var t=p.info=NREUM.info;if(t&&t.agent&&t.licenseKey&&t.applicationID&&u&&u.body){p.proto="https"===f.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=u.createElement("script");e.src=p.proto+t.agent,u.body.appendChild(e)}}function r(){"complete"===u.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=window,u=s.document,c="addEventListener",d="attachEvent",f=(""+location).split("?")[0],p=e.exports={offset:i(),origin:f,features:[]};u[c]?(u[c]("DOMContentLoaded",o,!1),s[c]("load",n,!1)):(u[d]("onreadystatechange",r),s[d]("onload",n)),a("mark",["firstbyte",i()])},{handle:"D5DuLP"}],14:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],15:[function(t,e){function n(t,e,r,s){function nrWrapper(){try{var n,a=u(arguments),c=this,d=r&&r(a,c)||{}}catch(f){i([f,"",[a,c,s],d])}o(e+"start",[a,c,s],d);try{return n=t.apply(c,a)}catch(p){throw o(e+"err",[a,c,p],d),p}finally{o(e+"end",[a,c,n],d)}}return a(t)?t:(e||(e=""),nrWrapper[n.flag]=!0,nrWrapper)}function r(t,e,r,o){r||(r="");var i,s,u,c="-"===r.charAt(0);for(u=0;u<e.length;u++)s=e[u],i=t[s],a(i)||(t[s]=n(i,c?s+r:r,o,s,t))}function o(t,e,n){try{s.emit(t,e,n)}catch(r){i([r,t,e,n])}}function i(t){try{s.emit("internal-error",t)}catch(e){}}function a(t){return!(t&&"function"==typeof t&&t.apply&&!t[n.flag])}var s=t(1),u=t(2);e.exports=n,n.inPlace=r,n.flag="nr@wrapper"},{1:1,2:14}]},{},["G9z0Bl",2,7]);</script>
<meta content="telephone=no" name="format-detection">

<!--[if !IE]> -->
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/base-8704018adf1f0f42d9c121290e61ffdb.css" media="screen,print" rel="stylesheet" />
<!-- <![endif]-->
<!--[if IE]>
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/base_blessed-2f08976b9f6fbe2e04012370ffb13c02.css" media="screen" rel="stylesheet" />
<![endif]-->


<!--[if lte IE 9]>
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/ie_nine-35e66660ff52ef9358362a02d536b382.css" media="screen" rel="stylesheet" />
<![endif]-->
<!--[if lte IE 8]>
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/ie_eight-2077265988ac83c0955d16f5fe920132.css" media="screen" rel="stylesheet" />
<![endif]-->
<!--[if lte IE 7]>
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/ie-cd8d70f31eb4c58a0f4d1e1967047636.css" media="screen" rel="stylesheet" />
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/ie_seven-acf78cef7d86c8e9ffd356ae7ce35315.css" media="screen,print" rel="stylesheet" />
<![endif]-->
<!--[if IE 6]>
  <link href="https://d297h9he240fqh.cloudfront.net/assets/packages/ie_six-8492cf8e5a5ea8143c43cda460b4aed7.css" media="screen,print" rel="stylesheet" />
<![endif]-->


<link href="https://d297h9he240fqh.cloudfront.net/favicon.ico" rel="icon" type="image/x-icon">
<link href="https://d297h9he240fqh.cloudfront.net/assets/apple-touch-icon-precomposed-4df6b6e9e0f6f73b508208d4640f4cc4.png" rel="apple-touch-icon-precomposed" type="image/png">
<link href="https://d297h9he240fqh.cloudfront.net/assets/apple-touch-icon-ipad-precomposed-318fa037ae41f3cfaa9a2b5f961eff51.png" rel="apple-touch-icon-precomposed" sizes="72x72" type="image/png">
<link href="https://d297h9he240fqh.cloudfront.net/assets/apple-touch-icon-iphone4-precomposed-8f1dd9de021029e56bf4f617ab2a45da.png" rel="apple-touch-icon-precomposed" sizes="114x114" type="image/png">
<link href="https://www.kickstarter.com/services/oembed?url=https%3A%2F%2Fwww.kickstarter.com%2Fprojects%2Feinsteinsworkshop%2Fblockscad-easy-3d-cad-for-kids-and-adults-open-sou" rel="alternate" title="BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced Script Tag oEmbed" type="application/json+oembed">
<link rel="alternate" type="application/atom+xml" title="BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced : Kickstarter" href="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/posts.atom" />
<meta property="twitter:app:id:iphone" content="596961532"/>
<meta property="twitter:app:name:iphone" content="Kickstarter"/>
<meta property="twitter:app:url:iphone" content="ksr://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou"/>
<meta name="video_height" content="360"/>
<meta name="video_width" content="640"/>
<meta name="video_type" content="application/x-shockwave-flash"/>
<meta name="title" content="Kickstarter &gt;&gt; BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced by Einstein&#39;s Workshop"/>
<meta name="description" content="Einstein&#39;s Workshop is raising funds for BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced on Kickstarter! 

 BlocksCAD is an easy-to-use 3D CAD tool with professional-level capabilities designed for kids. Help us open-source this project!"/>
<meta property="og:title" content="BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced"/>
<meta property="og:type" content="kickstarter:project"/>
<meta property="og:image" content="https://s3.amazonaws.com/ksr/projects/1114436/photo-main.jpg?1410100513"/>
<meta property="og:url" content="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou"/>
<meta property="og:site_name" content="Kickstarter"/>
<meta property="fb:app_id" content="69103156693"/>
<meta property="og:description" content="BlocksCAD is an easy-to-use 3D CAD tool with professional-level capabilities designed for kids. Help us open-source this project!"/>
<meta property="kickstarter:creator" content="https://www.kickstarter.com/profile/einsteinsworkshop"/>
<meta property="twitter:url:landing_url" content="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou"/>
<meta property="twitter:card" content="2427656750:kickstarter_project"/>
<meta property="twitter:site" content="@kickstarter"/>
<meta property="twitter:site:id" content="16186995"/>
<meta property="twitter:text:title" content="BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced"/>
<meta property="twitter:text:artist" content="Einstein&#39;s Workshop"/>
<meta property="twitter:text:backers" content="37"/>
<meta property="twitter:text:pledged" content="$1,670 USD"/>
<meta property="twitter:text:time" content="26 days"/>
<meta property="twitter:text:location" content="Burlington, MA"/>
<meta property="twitter:image:location_image" content="https://d3mlfyygrfdi2i.cloudfront.net/b40e/pin.png"/>
<meta property="twitter:text:description" content="BlocksCAD is an easy-to-use 3D CAD tool with professional-level capabilities designed for kids. Help us open-source this project!"/>
<meta property="twitter:image:media" content="https://s3.amazonaws.com/ksr/projects/1114436/photo-main.jpg?1410100513"/>
<meta property="twitter:image:width" content="640"/>
<meta property="twitter:image:height" content="480"/>
<meta property="twitter:player:stream:url" content="https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.mp4"/>
<meta property="twitter:player:stream:content" content="video/mp4"/>
<meta property="twitter:player:url" content="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/widget/video.html"/>
<meta property="twitter:player:height" content="360"/>
<meta property="twitter:player:width" content="640"/>
<meta property="twitter:maxage" content="60"/>
<meta property="og:video" content="https://d3mlfyygrfdi2i.cloudfront.net/321f/kickplayer.swf?allowfullscreen=true&amp;autostart=true&amp;backcolor=000000&amp;controlbar=over&amp;file=https%3A%2F%2Fd2pq0u4uni88oo.cloudfront.net%2Fprojects%2F1114436%2Fvideo-434238-h264_high.mp4&amp;image=https%3A%2F%2Fs3.amazonaws.com%2Fksr%2Fprojects%2F1114436%2Fphoto-full.jpg&amp;project_creators=A+Software+project+by+Einstein%27s+Workshop&amp;project_title=BlocksCAD%3A+Easy+3D+CAD+for+Kids+%26+Adults%2C+Open-Sourced&amp;project_url=https%3A%2F%2Fwww.kickstarter.com%2Fprojects%2Feinsteinsworkshop%2Fblockscad-easy-3d-cad-for-kids-and-adults-open-sou&amp;screencolor=000000&amp;skin=https%3A%2F%2Fd3mlfyygrfdi2i.cloudfront.net%2Fcc3a%2Fkickskin.swf&amp;wmode=opaque"/>
<meta property="og:video:secure_url" content="https://d3mlfyygrfdi2i.cloudfront.net/321f/kickplayer.swf?allowfullscreen=true&amp;autostart=true&amp;backcolor=000000&amp;controlbar=over&amp;file=https%3A%2F%2Fd2pq0u4uni88oo.cloudfront.net%2Fprojects%2F1114436%2Fvideo-434238-h264_high.mp4&amp;image=https%3A%2F%2Fs3.amazonaws.com%2Fksr%2Fprojects%2F1114436%2Fphoto-full.jpg&amp;project_creators=A+Software+project+by+Einstein%27s+Workshop&amp;project_title=BlocksCAD%3A+Easy+3D+CAD+for+Kids+%26+Adults%2C+Open-Sourced&amp;project_url=https%3A%2F%2Fwww.kickstarter.com%2Fprojects%2Feinsteinsworkshop%2Fblockscad-easy-3d-cad-for-kids-and-adults-open-sou&amp;screencolor=000000&amp;skin=https%3A%2F%2Fd3mlfyygrfdi2i.cloudfront.net%2Fcc3a%2Fkickskin.swf&amp;wmode=opaque"/>
<meta property="og:video:height" content="360"/>
<meta property="og:video:width" content="640"/>
<meta property="og:video:type" content="application/x-shockwave-flash"/>
<meta content="authenticity_token" name="csrf-param" />
<meta content="j5Uaa5xgZv1s8ez7L7LuYWjIELw1XHdD3Ti3r+6fiGg=" name="csrf-token" />
<script type="text/javascript">
  var _sift = _sift || [];
  _sift.push(['_setAccount', '637102']);
  _sift.push(['_setUserId', '']);
  _sift.push(['_trackPageview']);

  (function() {
    function loadSift() {
      var sift, s;
      if (root.visitor_id) {
        _sift.push(['_setSessionId', root.visitor_id]);
      }
      sift = document.createElement('script');
      sift.type = 'text/javascript';
      sift.async = true;
      sift.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'dtlilztwypawv.cloudfront.net/s.js';
      s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(sift, s);
    }
    if (window.attachEvent) {
      window.attachEvent('onload', loadSift);
    } else {
      window.addEventListener('load', loadSift, false);
    }
  })();
</script>
<link href="http://kck.st/1Ajv50R" rel="shorturl">
<link href="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou" rel="canonical">
<link href="https://s3.amazonaws.com/ksr/projects/1114436/photo-med.jpg?1410100513" rel="image_src">
<link href="https://d3mlfyygrfdi2i.cloudfront.net/321f/kickplayer.swf?allowfullscreen=true&amp;autostart=true&amp;backcolor=000000&amp;controlbar=over&amp;file=https%3A%2F%2Fd2pq0u4uni88oo.cloudfront.net%2Fprojects%2F1114436%2Fvideo-434238-h264_high.mp4&amp;image=https%3A%2F%2Fs3.amazonaws.com%2Fksr%2Fprojects%2F1114436%2Fphoto-full.jpg&amp;project_creators=A+Software+project+by+Einstein%27s+Workshop&amp;project_title=BlocksCAD%3A+Easy+3D+CAD+for+Kids+%26+Adults%2C+Open-Sourced&amp;project_url=https%3A%2F%2Fwww.kickstarter.com%2Fprojects%2Feinsteinsworkshop%2Fblockscad-easy-3d-cad-for-kids-and-adults-open-sou&amp;screencolor=000000&amp;skin=https%3A%2F%2Fd3mlfyygrfdi2i.cloudfront.net%2Fcc3a%2Fkickskin.swf&amp;wmode=opaque" rel="video_src">
<script>
  //<![CDATA[
    window.current_checkout = "{&quot;id&quot;:0,&quot;domestic&quot;:null,&quot;amount&quot;:0.0,&quot;updated_at&quot;:0,&quot;created_at&quot;:0}";
  //]]>
</script>


<script>
  //<![CDATA[
    window.current_ip = '112.196.33.83';
    window.current_ip_datacenter = 'false';
    window.enabled_features = {"elasticsearch":true,"security_history_read":true,"security_history_write":true,"advanced_discovery_es":true,"ios_crashlytics":true,"ios_mixpanel":true,"handbook_hero":true,"password_reset_banner":true,"play_page":true,"watch_page":true};
    window.I18n = {};
    window.fb_app_id = '69103156693';
    
    var _sf_startpt=(new Date()).getTime();
    
    window.current_project = "{&quot;id&quot;:89340412,&quot;name&quot;:&quot;BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced&quot;,&quot;blurb&quot;:&quot;BlocksCAD is an easy-to-use 3D CAD tool with professional-level capabilities designed for kids. Help us open-source this project!&quot;,&quot;goal&quot;:42000.0,&quot;pledged&quot;:1670.0,&quot;state&quot;:&quot;live&quot;,&quot;slug&quot;:&quot;blockscad-easy-3d-cad-for-kids-and-adults-open-sou&quot;,&quot;disable_communication&quot;:false,&quot;country&quot;:&quot;US&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;currency_symbol&quot;:&quot;$&quot;,&quot;currency_trailing_code&quot;:true,&quot;deadline&quot;:1412467200,&quot;state_changed_at&quot;:1410024739,&quot;created_at&quot;:1404911253,&quot;launched_at&quot;:1410024739,&quot;backers_count&quot;:37,&quot;photo&quot;:{&quot;full&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-full.jpg?1410100513&quot;,&quot;ed&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-ed.jpg?1410100513&quot;,&quot;med&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-med.jpg?1410100513&quot;,&quot;little&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-little.jpg?1410100513&quot;,&quot;small&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-small.jpg?1410100513&quot;,&quot;thumb&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-thumb.jpg?1410100513&quot;,&quot;1024x768&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-1024x768.jpg?1410100513&quot;,&quot;1536x1152&quot;:&quot;https://s3.amazonaws.com/ksr/projects/1114436/photo-1536x1152.jpg?1410100513&quot;},&quot;creator&quot;:{&quot;id&quot;:1753736569,&quot;name&quot;:&quot;Einstein&#39;s Workshop&quot;,&quot;slug&quot;:&quot;einsteinsworkshop&quot;,&quot;avatar&quot;:{&quot;thumb&quot;:&quot;https://s3.amazonaws.com/ksr/avatars/11322890/logo_ew_square_800x800.thumb.jpg?1404911209&quot;,&quot;small&quot;:&quot;https://s3.amazonaws.com/ksr/avatars/11322890/logo_ew_square_800x800.small.jpg?1404911209&quot;,&quot;medium&quot;:&quot;https://s3.amazonaws.com/ksr/avatars/11322890/logo_ew_square_800x800.medium.jpg?1404911209&quot;},&quot;urls&quot;:{&quot;web&quot;:{&quot;user&quot;:&quot;https://www.kickstarter.com/profile/einsteinsworkshop&quot;},&quot;api&quot;:{&quot;user&quot;:&quot;https://api.kickstarter.com/v1/users/1753736569?signature=1410255233.46f7f9abc6c163a3bdd2ae4ee303614d8b00a7c0&quot;}}},&quot;location&quot;:{&quot;id&quot;:2372081,&quot;name&quot;:&quot;Burlington&quot;,&quot;slug&quot;:&quot;burlington-ma&quot;,&quot;short_name&quot;:&quot;Burlington, MA&quot;,&quot;displayable_name&quot;:&quot;Burlington, MA&quot;,&quot;country&quot;:&quot;US&quot;,&quot;state&quot;:&quot;MA&quot;,&quot;urls&quot;:{&quot;web&quot;:{&quot;discover&quot;:&quot;https://www.kickstarter.com/discover/places/burlington-ma&quot;,&quot;location&quot;:&quot;https://www.kickstarter.com/locations/burlington-ma&quot;},&quot;api&quot;:{&quot;nearby_projects&quot;:&quot;https://api.kickstarter.com/v1/discover?signature=1410219561.f8295ba5699f87ebed5a35d28a8062f3aa148833&amp;woe_id=2372081&quot;}}},&quot;category&quot;:{&quot;id&quot;:51,&quot;name&quot;:&quot;Software&quot;,&quot;slug&quot;:&quot;technology/software&quot;,&quot;position&quot;:11,&quot;parent_id&quot;:16,&quot;urls&quot;:{&quot;web&quot;:{&quot;discover&quot;:&quot;http://www.kickstarter.com/discover/categories/technology/software&quot;}}},&quot;urls&quot;:{&quot;web&quot;:{&quot;project&quot;:&quot;https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou&quot;,&quot;rewards&quot;:&quot;https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/rewards&quot;,&quot;project_short&quot;:&quot;http://kck.st/1Ajv50R&quot;,&quot;updates&quot;:&quot;https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/posts&quot;},&quot;api&quot;:{&quot;project&quot;:&quot;https://api.kickstarter.com/v1/projects/89340412?signature=1410255233.73381e95e893af004004555ff72e95a886e64d5c&quot;,&quot;comments&quot;:&quot;https://api.kickstarter.com/v1/projects/89340412/comments?signature=1410255233.24ef696973a9234f955150dff787a9bf5ffa3b1c&quot;,&quot;updates&quot;:&quot;https://api.kickstarter.com/v1/projects/89340412/updates?signature=1410255233.fb5fb76e364c2021dcd5d695471838a9ba8c4fc2&quot;}},&quot;updated_at&quot;:1410127726,&quot;video&quot;:{&quot;id&quot;:434238,&quot;status&quot;:&quot;successful&quot;,&quot;high&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_high.mp4?2014&quot;,&quot;base&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.mp4?2014&quot;,&quot;webm&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-webm.webm?2014&quot;,&quot;width&quot;:640,&quot;height&quot;:360,&quot;frame&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.jpg?2014&quot;},&quot;comments_count&quot;:0,&quot;updates_count&quot;:0,&quot;rewards&quot;:[{&quot;id&quot;:0,&quot;minimum&quot;:1,&quot;reward&quot;:&quot;No Reward&quot;},{&quot;id&quot;:2827297,&quot;minimum&quot;:5.0,&quot;reward&quot;:&quot;Every dollar counts! Contributors at this level will receive exclusive backer-only updates and will be listed in the credits page.&quot;,&quot;shipping_applicable&quot;:false,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;backers_count&quot;:2,&quot;updated_at&quot;:1410137352},{&quot;id&quot;:3026516,&quot;minimum&quot;:15.0,&quot;reward&quot;:&quot;Give us a boost! Back us at $15 and download an STL 3D model of our mascot, The Blockhead. Remix our design or print your own! Also includes your name in the credits and backer-only updates.&quot;,&quot;shipping_applicable&quot;:false,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;backers_count&quot;:2,&quot;updated_at&quot;:1410050363},{&quot;id&quot;:2827299,&quot;minimum&quot;:30.0,&quot;reward&quot;:&quot;Welcome to the Beta Tester level! You&#39;ll gain early access to the BlocksCAD software, with an opportunity to help us make it the best CAD software it can be. And of course, you&#39;ll get your name in the credits and a digital 3D model of the Blockhead.&quot;,&quot;shipping_applicable&quot;:false,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;backers_count&quot;:12,&quot;updated_at&quot;:1410141486},{&quot;id&quot;:3026517,&quot;minimum&quot;:42.0,&quot;reward&quot;:&quot;You are The Answer to our needs!  This is a limited-edition early-bird price for the $50 T-shirt level, detailed below.&quot;,&quot;limit&quot;:42,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;remaining&quot;:30,&quot;backers_count&quot;:12,&quot;updated_at&quot;:1410140393},{&quot;id&quot;:2827298,&quot;minimum&quot;:50.0,&quot;reward&quot;:&quot;BlocksCAD: The T-shirt. Wear your heart on your sleeve... or your chest... with our \\&quot;I &lt;block&gt; CAD T-shirt\\&quot; and proudly announce your support!\\r\\n\\r\\nThis reward level also includes high-fives when we see you wearing the shirt, early access to the BlocksCAD software, the digital 3D Blockhead download, your name in the credits, and backer-only updates.&quot;,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;backers_count&quot;:4,&quot;updated_at&quot;:1410039852},{&quot;id&quot;:2827300,&quot;minimum&quot;:100.0,&quot;reward&quot;:&quot;Early adopters are VIPs! You&#39;ll receive the VIP version of our mascot, \\&quot;The Blockhead\\&quot; (normally only available at the $1000 level). This reward level is limited to 50 backers, so if you want the top hat, act quickly!\\r\\n\\r\\nThis reward level also includes everything in the previous reward levels.&quot;,&quot;limit&quot;:50,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;remaining&quot;:45,&quot;backers_count&quot;:5,&quot;updated_at&quot;:1410101200},{&quot;id&quot;:2827301,&quot;minimum&quot;:100.0,&quot;reward&quot;:&quot;Get a 3D Printed Mascot! Back at this level and we&#39;ll mail you a full-color 3D print of our mascot, \\&quot;The Blockhead\\&quot;.\\r\\n\\r\\nThis reward level also includes the digital model and everything in the $50 reward level.&quot;,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;domestic&quot;,&quot;shipping_amount&quot;:&quot;0.0&quot;,&quot;estimated_delivery_on&quot;:1420070400,&quot;project_id&quot;:89340412,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1408539318},{&quot;id&quot;:2827365,&quot;minimum&quot;:250.0,&quot;reward&quot;:&quot;Join us at Einstein&#39;s Workshop for a 3-hour BlocksCAD Boot Camp in Burlington, MA!\\r\\n\\r\\nThis reward level also includes everything in the $100 backer level. (Lodging and transportation not included; subject to scheduling availability)&quot;,&quot;limit&quot;:60,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1433116800,&quot;project_id&quot;:89340412,&quot;remaining&quot;:60,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1408539318},{&quot;id&quot;:2827547,&quot;minimum&quot;:500.0,&quot;reward&quot;:&quot;Join us for the Boot Camp AND our BlocksCAD launch party! Chill with the founders of Einstein&#39;s Workshop and the developers of BlocksCAD as we declare victory at last. This reward level includes access to a BlocksCAD Boot Camp session at Einstein&#39;s Workshop in Burlington, MA, an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included; subject to scheduling availability)&quot;,&quot;limit&quot;:24,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1441065600,&quot;project_id&quot;:89340412,&quot;remaining&quot;:24,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1407973018},{&quot;id&quot;:2827490,&quot;minimum&quot;:500.0,&quot;reward&quot;:&quot;Don&#39;t need Boot Camp, but want to join us for the Launch Party?  Back our project at this level and get an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included.)&quot;,&quot;limit&quot;:50,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1441065600,&quot;project_id&quot;:89340412,&quot;remaining&quot;:50,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1407973018},{&quot;id&quot;:2827600,&quot;minimum&quot;:1000.0,&quot;reward&quot;:&quot;Exclusive BlocksCAD VIP dinner! Help us celebrate our success. Back at this level to get a sneak-peek demo of BlocksCAD, and meet the founders and developers over dinner.\\r\\n\\r\\nThis level includes dinner for two at an exclusive VIP gathering in Burlington, MA, a limited-edition \\&quot;VIP Top Hat Blockhead\\&quot; 3D printed model, an invitation for two to the BlocksCAD launch party, two BlocksCAD t-shirts, early access to the BlocksCAD software, the digital 3D Blockhead model download, your name in the credits, and backer-only updates. (Lodging and transportation not included)&quot;,&quot;limit&quot;:10,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;12.0&quot;,&quot;estimated_delivery_on&quot;:1414800000,&quot;project_id&quot;:89340412,&quot;remaining&quot;:10,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1409846846},{&quot;id&quot;:2827855,&quot;minimum&quot;:5000.0,&quot;reward&quot;:&quot;At this level, we&#39;ll bring a 2-day BlocksCAD class to you anywhere in the Continental US!\\r\\n\\r\\nPlease contact us prior to selecting this reward. Outside continental US may be available, contact us for details.&quot;,&quot;limit&quot;:5,&quot;shipping_applicable&quot;:true,&quot;shipping&quot;:&quot;international&quot;,&quot;shipping_amount&quot;:&quot;1000.0&quot;,&quot;estimated_delivery_on&quot;:1451606400,&quot;project_id&quot;:89340412,&quot;remaining&quot;:5,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1409846918},{&quot;id&quot;:2827856,&quot;minimum&quot;:10000.0,&quot;reward&quot;:&quot;Sponsor a School: Be a hero for your local school. We&#39;ll send one of our experts to train up to 12 teachers on the BlocksCAD software, donate a 3D printer, and train up to 3 staff members on its operation. Everything your school needs to get started in 3D printing! Hawaii, Alaska, and international backers, please contact us if you&#39;re interested in backing at this level.&quot;,&quot;limit&quot;:3,&quot;shipping_applicable&quot;:false,&quot;estimated_delivery_on&quot;:1451606400,&quot;project_id&quot;:89340412,&quot;remaining&quot;:3,&quot;backers_count&quot;:0,&quot;updated_at&quot;:1408539318}]}";
    
    
    
    window.current_location = "{&quot;id&quot;:2295391,&quot;name&quot;:&quot;Chandigarh&quot;,&quot;slug&quot;:&quot;chandigarh-chandigarh-chandigarh&quot;,&quot;short_name&quot;:&quot;Chandigarh, India&quot;,&quot;displayable_name&quot;:&quot;Chandigarh, India&quot;,&quot;country&quot;:&quot;IN&quot;,&quot;state&quot;:&quot;Chandigarh&quot;,&quot;urls&quot;:{&quot;web&quot;:{&quot;discover&quot;:&quot;https://www.kickstarter.com/discover/places/chandigarh-chandigarh-chandigarh&quot;,&quot;location&quot;:&quot;https://www.kickstarter.com/locations/chandigarh-chandigarh-chandigarh&quot;},&quot;api&quot;:{&quot;nearby_projects&quot;:&quot;https://api.kickstarter.com/v1/discover?signature=1410255233.01e491e754d52bebf87642da36d8882c6262cbbf&amp;woe_id=2295391&quot;}}}";
    
    
    
    
    window.timeRemaining = function timeRemaining(epochTime){
    
      var diff = epochTime - ((new Date()).getTime() / 1000);
      var num_unit = (diff < 60 && [Math.max(diff, 0), 'seconds']) ||
        ((diff/=60) < 60 && [diff, 'minutes']) ||
        ((diff/=60) < 72 && [diff, 'hours']) ||
        [diff/=24, 'days'];
    
      // Round down
      num_unit[0] = Math.floor(num_unit[0]);
      // Singularize unit
      if (num_unit[0] == 1) { num_unit[1] = num_unit[1].replace(/s$/,""); }
    
      return num_unit;
    };
  //]]>
</script>

<script>
  //<![CDATA[
    window.current_variants = ["discover_newest_vs_recently_launched[newest]"];
  //]]>
</script>


</head>

<body class="project projects not-mobile not-phone not-forces-video-controls not-tablet not-ipad not-iphone not-ios not-touchable not-native-app-request fixed-width video_mode" id="projects_show">
<div class="jGrowl center" id="growl_section"></div>
<nav class="NS_layouts__navigation" id="header">
<div class="main-nav relative bg-white">
<h1 class="h3 no-margin pl1 col mobile-block mobile-center">
<a class="block p2" href="/?ref=nav"><span class="ss-icon green-dark">KICK</span><span class="ss-icon green">STARTER</span>
</a></h1>
<div class="mobile-show border-bottom"></div>
<ul class="primary-links list no-margin col">
<li class="left discover-link">
<a class="block px1 py2 grey-dark h5 bold" href="/discover?ref=nav">Discover</a>
</li>
<li class="left mr1 mobile-hide">&nbsp;</li>
<li class="left mr2">
<a class="block px1 py2 grey-dark h5 bold" href="/learn?ref=nav">Start</a>
</li>
</ul>
<ul class="list no-margin right" id="menu-sub">
<li class="right mr1 mobile-hide">&nbsp;</li>
<li class="right"><a class="block h5 bold px1 py2" href="/login?ref=nav">Log in</a></li>
<li class="right"><a class="block h5 bold px1 py2" href="/signup?ref=nav">Sign up</a></li>
</ul>
<div class="search-link pl2 full-height border-left border-box clip mobile-hide">
<form accept-charset="UTF-8" action="/projects/search" class="search pt1 pb1 block relative form-simple" method="get"><div style="margin:0;padding:0;display:inline"><input class="hidden" name="utf8" type="hidden" value="&#x2713;" /></div>
<div class="field relative pl3">
<span class="ss-icon ss-search grey-dark ml1 mt1 absolute"></span>
<input class="input-search header full-width text" data-tracker-name="Header Live Search" id="term" name="term" placeholder="Search projects" type="text" />
</div>
</form>

</div>
<div class="clear"></div>
</div>
</nav>
<div class="hide pt4 pb4 bg-grey-light" id="search_results-wrap">
<div class="relative container" id="search_results">
<a class="close right grey-dark mr1"><span class="ss-icon ss-delete"></span></a>
<h3 class="header ml1 clearfix"></h3>
<div class="clip clearfix" id="search_results_panel"></div>
<a class="prev arrow grey-dark absolute h3">
<span class="ss-icon ss-navigateleft"></span>
</a>
<a class="next arrow grey-dark absolute h3">
<span class="ss-icon ss-navigateright"></span>
</a>
</div>
</div>




<div class="Project-ended-false Project-is_starred- Project-state-live Project89340412_cxt border-top" id="main_content">
<div id="running-board-wrap">
<div class="container" id="running-board">
<div id="project-header">
<div class="NS_projects__running_board ml1 mr1 clearfix">
<div class="title center py4">
<h2 class="mb1">
<a class="green-dark" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou">BlocksCAD: Easy 3D CAD for Kids &amp; Adults, Open-Sourced</a>
</h2>
<p class="no-margin">
<span class="creator">
by
<a class="green-dark remote_modal_dialog" data-modal-class="modal_project_by" data-modal-title="Biography" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/creator_bio" id="name">Einstein&#39;s Workshop</a>
</span>
</p>
</div>
<ul class="project-nav list-inline left h5 bold mb1">
<li class="mr2">
<a class="grey-dark py1 current" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou" id="home_nav">Home</a>
</li>
<li class="mr2">
<span data-updates-count="0" id="updates_count">
<a class="grey-dark py1" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/posts" id="updates_nav">Updates
<span class="count h6 bg-grey-dark white">0</span>
</a></span>
</li>
<li class="mr2">
<a class="grey-dark py1" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/backers" id="backers_nav">Backers
<span class="count h6 bg-grey-dark white"><data class="Project89340412" data-format="number" data-value="37" itemprop="Project[backers_count]">37</data></span>
</a></li>
<li>
<span data-comments-count="0" id="comments_count">
<a class="grey-dark py1" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/comments" id="comments_nav">Comments
<span class="count h6 bg-grey-dark white"><data class="Project89340412" data-format="number" data-value="0" itemprop="Project[comments_count]">0</data></span>
</a></span>
</li>
</ul>
<ul class="list-inline right h5 bold mb1">
<li class="location mr2">
<a class="grey-dark" href="/discover/places/burlington-ma?ref=city"><span class="ss-icon ss-location margin-right"></span>
Burlington, MA
</a></li>
<li class="category" data-project-parent-category="Technology">
<a class="grey-dark" href="/discover/categories/technology/software?ref=category"><span class="ss-icon ss-tag margin-right"></span>
Software
</a></li>
</ul>
</div>

</div>
</div>
</div>
<div class="bg-grey-light pb4" id="content-wrap">
<div class="Project89340412" data-conditions="[{&quot;!state&quot;:&quot;live&quot;}]" data-evaluation="false" data-render="&quot;&lt;div class=\&quot;NS_projects__funding_bar Project-ended-false Project-is_starred- Project-state-live Project89340412_cxt bg-grey container pb1 pt1\&quot;&gt;\n&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:&amp;quot;successful&amp;quot;}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;\\n&amp;lt;b&amp;gt;Funded!&amp;lt;/b&amp;gt;\\nThis project was successfully funded &amp;lt;data class=\\&amp;quot;Project89340412\\&amp;quot; data-format=\\&amp;quot;distance_date\\&amp;quot; data-value=\\&amp;quot;&amp;amp;quot;2014-10-04T20:00:00-04:00&amp;amp;quot;\\&amp;quot; itemprop=\\&amp;quot;Project[deadline]\\&amp;quot;&amp;gt;just now&amp;lt;/data&amp;gt;.\\n&amp;lt;/p&amp;gt;\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:[&amp;quot;started&amp;quot;,&amp;quot;submitted&amp;quot;]}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;\\n&amp;lt;b&amp;gt;THIS PROJECT IS NOT LIVE&amp;lt;/b&amp;gt;\\nThis is only a draft that the creator has chosen to share.\\n&amp;lt;/p&amp;gt;\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:&amp;quot;suspended&amp;quot;}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;&amp;lt;/p&amp;gt;\\n&amp;lt;b&amp;gt;Funding Suspended&amp;lt;/b&amp;gt;\\nFunding for this project was suspended &amp;lt;data class=\\&amp;quot;Project89340412\\&amp;quot; data-format=\\&amp;quot;distance_date\\&amp;quot; data-value=\\&amp;quot;&amp;amp;quot;2014-09-06T13:32:19-04:00&amp;amp;quot;\\&amp;quot; itemprop=\\&amp;quot;Project[state_changed_at]\\&amp;quot;&amp;gt;1 day ago&amp;lt;/data&amp;gt;.\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:&amp;quot;canceled&amp;quot;}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;&amp;lt;/p&amp;gt;\\n&amp;lt;b&amp;gt;Funding Canceled&amp;lt;/b&amp;gt;\\nFunding for this project was canceled by the project creator &amp;lt;data class=\\&amp;quot;Project89340412\\&amp;quot; data-format=\\&amp;quot;distance_date\\&amp;quot; data-value=\\&amp;quot;&amp;amp;quot;2014-09-06T13:32:19-04:00&amp;amp;quot;\\&amp;quot; itemprop=\\&amp;quot;Project[state_changed_at]\\&amp;quot;&amp;gt;1 day ago&amp;lt;/data&amp;gt;.\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:&amp;quot;failed&amp;quot;}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;&amp;lt;/p&amp;gt;\\n&amp;lt;b&amp;gt;Funding Unsuccessful&amp;lt;/b&amp;gt;\\nThis project’s funding goal was not reached on &amp;lt;time class=\\&amp;quot;js-adjust\\&amp;quot; data-format=\\&amp;quot;LL\\&amp;quot; datetime=\\&amp;quot;2014-10-04T20:00:00-04:00\\&amp;quot;&amp;gt;October 4, 2014&amp;lt;/time&amp;gt;.\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;div class=\&quot;Project89340412\&quot; data-conditions=\&quot;[{&amp;quot;state&amp;quot;:&amp;quot;purged&amp;quot;}]\&quot; data-evaluation=\&quot;false\&quot; data-render=\&quot;&amp;quot;&amp;lt;p class=\\&amp;quot;no-margin\\&amp;quot;&amp;gt;&amp;lt;/p&amp;gt;\\n&amp;lt;b&amp;gt;This project is purged and only visible to staff.&amp;lt;/b&amp;gt;\\n&amp;quot;\&quot;&gt;&lt;/div&gt;&lt;/div&gt;\n&quot;"></div>
<div class="bg-white border container pl2 pr2 py3 rounded" id="content">
<div class="NS-projects-content">
<div class="grid_11">
<div data-has-video="true" id="video-section">
<div class="video-player" data-dimensions="{&quot;width&quot;:640,&quot;height&quot;:480}" data-image="https://s3.amazonaws.com/ksr/projects/1114436/photo-main.jpg?1410100513" data-video-tracker-url="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/video/plays" data-video-url="https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_high.mp4" data-video="{&quot;id&quot;:434238,&quot;status&quot;:&quot;successful&quot;,&quot;high&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_high.mp4?2014&quot;,&quot;base&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.mp4?2014&quot;,&quot;webm&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-webm.webm?2014&quot;,&quot;width&quot;:640,&quot;height&quot;:360,&quot;frame&quot;:&quot;https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.jpg?2014&quot;}" id="video_pitch"><video class="has_webm landscape" preload="none">
<source src="https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_high.mp4" type='video/mp4; codecs="avc1.64001E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-h264_base.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/projects/1114436/video-434238-webm.webm" type="video/webm"></source>
You'll need an HTML5 capable browser to see this content.
</video>
<img alt="Video image." class="has_played_hide poster landscape" src="https://s3.amazonaws.com/ksr/projects/1114436/photo-main.jpg?1410100513" />
<div class="play_button_big play_button_dark absolute-center rounded has_played_hide">
<span class="ss-icon ss-play"></span>
Play
</div>
<div class="player_controls clearfix absolute-bottom mb2 rounded white bg-green-dark forces-video-controls_hide">
<div class="left">
<a class="button button_icon button_dark playpause play mr1">
<span class="play ss-icon ss-play"></span>
<span class="pause ss-icon ss-pause"></span>
</a>
<span class="time current_time h12 left">00:00</span>
</div>
<div class="right">
<span class="time total_time h12 left mr1">00:00</span>
<a class="left button button_icon button_icon_white volume">
<span class="ss-icon ss-volume icon_volume_nudge"></span>
<span class="ss-icon ss-highvolume"></span>
</a>
<div class="volume_container left">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
<a class="left button button_icon button_icon_white fullscreen">
<span class="ss-icon ss-expand"></span>
<span class="ss-icon ss-contract"></span>
</a>
</div>
<div class="clip">
<div class="progress_container pr1 pl1">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="buffer progress_bar_buffer"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div data-project-state="live" id="about">
<div class="NS_projects__project_share clearfix py2 pl1 pr1">
<ul class="left list-inline no-margin h5 bold">
<li class="facebook mr2">
<a href="https://www.kickstarter.com/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou"><span class="ss-icon ss-social ss-facebook color-facebook"></span>
<span class="color-facebook">Share</span>
<span class="share_bubble"><div class="triangle grey"></div>
<div class="triangle white"></div>
<span class="count"></span></span>
</a></li>
<li class="twitter mr2">
<a href="https://twitter.com/intent/tweet?text=BlocksCAD%3A%20Easy%203D%20CAD%20for%20Kids%20%26%20Adults%2C%20Open-Sourced%20by%20Einstein%27s%20Workshop&amp;via=kickstarter&amp;url=http://kck.st/1Ajv50R" rel="nofollow"><span class="ss-icon ss-social ss-twitter color-twitter"></span>
<span class="color-twitter">Tweet</span>
</a></li>
<li class="embed">
<a class="remote_modal_dialog grey-dark" data-modal-title="Embed a widget on your site" data-tracker-name="Embed" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/widget"><span class="ss-icon ss-navigateleft"></span>
<span class="ss-icon ss-navigateright"></span>
Embed
</a></li>
</ul>
<ul class="right list-inline no-margin h5 bold">
<li class="curate mr2">
</li>
<li class="remind">
<div class="ajax-container" id="watching-widget">
<div class="Project89340412" data-conditions="[{&quot;is_starred&quot;:true}]" data-evaluation="false" data-render="&quot;&lt;div id=\&quot;unwatch\&quot;&gt;\n&lt;a class=\&quot;on\&quot; href=\&quot;/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/unwatch\&quot;&gt;&lt;span class=\&quot;ss-icon ss-star\&quot;&gt;&lt;/span&gt;\n&lt;span class=\&quot;text\&quot;&gt;Reminder on&lt;/span&gt;\n&lt;/a&gt;&lt;/div&gt;\n\n&quot;"></div><div class="Project89340412" data-conditions="[{&quot;!is_starred&quot;:true}]" data-evaluation="true" data-render="&quot;&lt;div id=\&quot;watch\&quot;&gt;\n&lt;a href=\&quot;/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/watch\&quot;&gt;&lt;span class=\&quot;ss-icon ss-star\&quot;&gt;&lt;/span&gt;\n&lt;span class=\&quot;text\&quot;&gt;\nRemind me\n&lt;/span&gt;\n&lt;/a&gt;&lt;/div&gt;\n\n&quot;"><div id="watch">
<a href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/watch"><span class="ss-icon ss-star"></span>
<span class="text">
Remind me
</span>
</a></div>

</div></div>
</li>
</ul>
</div>

<div class="short_blurb py2 pl1 pr1">
<p class="h3">BlocksCAD is an easy-to-use 3D CAD tool with professional-level capabilities designed for kids. Help us open-source this project!</p>
</div>
<div class="full-description">
<h1>What is BlocksCAD?
</h1><p>Imagine a drag-and-drop 3D Computer Aided Design and modeling tool
designed for use by elementary-age children.   Then give it the
features, flexibility, and power of a professional-level program.
Then release it as an open source project so it can be improved and
built upon by the community.  </p><div class="template asset" contenteditable="false" data-id="2541528">
<figure>
<div class="video-player" data-dimensions='{"width":639,"height":479}' data-image="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_h264_high.jpg?2014" data-video-url="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_h264_high.mp4">
<video class="has_webm landscape" preload="none">
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_h264_high.mp4" type='video/mp4; codecs="avc1.64001E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_h264_base.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_webm.webm" type="video/webm"></source>
You'll need an HTML5 capable browser to see this content.
</video>
<img alt="Video image." class="has_played_hide poster landscape" src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/541/528/3f5ae8acf73919b99d7e40d07087bf2c_h264_high.jpg?2014">
<div class="play_button_big play_button_dark absolute-center rounded has_played_hide">
<span class="ss-icon ss-play"></span>
Play
</div>
<div class="player_controls clearfix absolute-bottom mb2 rounded white bg-green-dark forces-video-controls_hide">
<div class="left">
<a class="button button_icon button_dark playpause play mr1">
<span class="play ss-icon ss-play"></span>
<span class="pause ss-icon ss-pause"></span>
</a>
<span class="time current_time h12 left">00:00</span>
</div>
<div class="right">
<span class="time total_time h12 left mr1">00:00</span>
<a class="left button button_icon button_icon_white volume">
<span class="ss-icon ss-volume icon_volume_nudge"></span>
<span class="ss-icon ss-highvolume"></span>
</a>
<div class="volume_container left">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
<a class="left button button_icon button_icon_white fullscreen">
<span class="ss-icon ss-expand"></span>
<span class="ss-icon ss-contract"></span>
</a>
</div>
<div class="clip">
<div class="progress_container pr1 pl1">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="buffer progress_bar_buffer"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
</div>
</div>
</div>
</figure>

</div>





<p>With this tool, we've had enormous success teaching 3D design to
children.   The interface is specifically designed to be easy for
developing minds to grasp, with interlocking blocks and sliders, simple shapes, and quick visual 3D feedback.   Even
with the current alpha-level software, we’ve had students as young as age 8 successfully design and print objects like these:</p><div class="template asset" contenteditable="false" data-edit_url="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/assets/2473003/edit" data-id="2473003">
<figure>
<img alt="" class="fit" src="https://s3.amazonaws.com/ksr/assets/002/473/003/c70778efdebe0bf3dfc5c1d73156e048_large.png?1408712151">
</figure>

</div>











































<p>At the same time, we've impressed professional engineers with the
capabilities of the software.</p><div class="template asset" contenteditable="false" data-edit_url="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/assets/2513706/edit" data-id="2513706">
<figure>
<img alt="" class="fit" src="https://s3.amazonaws.com/ksr/assets/002/513/706/427a1b585ab3a35654d5cb7814a8626d_large.png?1409489952">
</figure>

</div>



















<h1>Where did BlocksCAD come from?</h1><p>Necessity is the mother of invention.</p><p>After successfully teaching 3D CAD to older kids and adults, we knew we had to offer something for our enthusiastic younger following. We explored several options, but found that the current CAD solutions were either license-restricted, age-restricted, platform-dependent or just too glitchy for prime time.</p><p>When we saw a need for software that’s easy for younger students to use, we did exactly what we encourage our students to do: we built it ourselves. By adding a drag-and-drop interface to our favorite open source CAD software, OpenSCAD, we eliminated the need to memorize code and troubleshoot syntax errors.</p><h1>What Do We Need?</h1><p>We need you. We need your friends, and your school, and anyone who wants children to have access to this software to spread the word. We need to raise at least $42,000 to cover development, testing, and release so that we can open-source this software.</p><div class="template asset" contenteditable="false" data-edit_url="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/assets/2539681/edit" data-id="2539681">
<figure>
<img alt="" class="fit" src="https://s3.amazonaws.com/ksr/assets/002/539/681/30fed975e53db14b8822168f6e1770ec_large.png?1409918541">
</figure>

</div>

















<h1>Why Open Source?</h1><p>At Einstein's Workshop, we teach freely-available, open source software in our classes whenever possible. We feel that it's important for students to have access to their tools so they can grow and learn independently as well as in the classroom. We want to open-source BlocksCAD so that our students and users around the world can come up with creations beyond our wildest dreams.</p><div class="template asset" contenteditable="false" data-edit_url="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/assets/2539678/edit" data-id="2539678">
<figure>
<img alt="" class="fit" src="https://s3.amazonaws.com/ksr/assets/002/539/678/b4528c1e228bd1e8f1d521f8af54fee3_large.png?1409918516">
</figure>

</div>


























<h1>Who is Einstein's Workshop?</h1><p>Einstein's Workshop is a hands-on learning center that opened its doors in 2012 with the goal of bringing STEM/STEAM to people of all ages and backgrounds. With classes ranging from high-tech art to advanced robotics, we get kids and families asking the question: what do I want to make?</p><div class="template asset" contenteditable="false" data-edit_url="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/assets/2468653/edit" data-id="2468653">
<figure>
<img alt="" class="fit" src="https://s3.amazonaws.com/ksr/assets/002/468/653/d8c80ffffd887808d04ab1333e7d34f7_large.png?1408639685">
</figure>

</div>







<div class="template asset" contenteditable="false" data-id="2539640">
<figure>
<div class="video-player" data-dimensions='{"width":639,"height":359}' data-image="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_h264_high.jpg?2014" data-video-url="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_h264_high.mp4">
<video class="has_webm landscape" preload="none">
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_h264_high.mp4" type='video/mp4; codecs="avc1.64001E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_h264_base.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></source>
<source src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_webm.webm" type="video/webm"></source>
You'll need an HTML5 capable browser to see this content.
</video>
<img alt="Video image." class="has_played_hide poster landscape" src="https://d2pq0u4uni88oo.cloudfront.net/assets/002/539/640/2d5f4b487a7c40119b1287040b47fc07_h264_high.jpg?2014">
<div class="play_button_big play_button_dark absolute-center rounded has_played_hide">
<span class="ss-icon ss-play"></span>
Play
</div>
<div class="player_controls clearfix absolute-bottom mb2 rounded white bg-green-dark forces-video-controls_hide">
<div class="left">
<a class="button button_icon button_dark playpause play mr1">
<span class="play ss-icon ss-play"></span>
<span class="pause ss-icon ss-pause"></span>
</a>
<span class="time current_time h12 left">00:00</span>
</div>
<div class="right">
<span class="time total_time h12 left mr1">00:00</span>
<a class="left button button_icon button_icon_white volume">
<span class="ss-icon ss-volume icon_volume_nudge"></span>
<span class="ss-icon ss-highvolume"></span>
</a>
<div class="volume_container left">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
<a class="left button button_icon button_icon_white fullscreen">
<span class="ss-icon ss-expand"></span>
<span class="ss-icon ss-contract"></span>
</a>
</div>
<div class="clip">
<div class="progress_container pr1 pl1">
<div class="progress_bar progress_bar_dark progress_bg">
<div class="progress_bar_bg"></div>
<div class="buffer progress_bar_buffer"></div>
<div class="progress progress_bar_progress"></div>
<div class="progress_handle progress_bar_handle"></div>
</div>
</div>
</div>
</div>
</div>
</figure>

</div>

</div>
<div id="risks">
<h2 class="title grey-dark mt6 mb4">
<span>Risks and challenges</span>
<a class="right normal h5" href="/help/faq/kickstarter%20basics#Acco" target="_blank">Learn about accountability on Kickstarter</a>
<div class="divider clear"></div>
</h2>
<p><p>Due to the unpredictable nature of software development, it is possible that our timetable may take longer than anticipated. However, because we already have a usable, working prototype, we feel confident that we can deliver on our promises!</p>

<p>Our team has decades of experience in related fields such as massively scalable web infrastructure, software development, and instructional design. The management at Einstein’s Workshop has a proven history of large-scale successes with endeavors in this field. With funding, we believe this tool has the potential to revolutionize educational approaches and bring broader access to powerful design and manufacturing tools.</p></p>
</div>
</div>
<div class="NS-projects-faqs" id="project-faqs">
<h2 class="title grey-dark mt6 mb4">
FAQ
<div class="divider clear"></div>
</h2>
<ul class="faqs">
<li class="faq" id="project_faq_104963">
<div class="faq-question">
<a href="#project_faq_104963" name="project_faq_104963">
<span class="ss-icon ss-navigateright"></span>
<span class="question">Do you really need $42,000 just to open-source some software? Why not just open-source/beta-test it now?</span>
</a>
</div>
<div class="faq-answer">
<p>Our current prototype was developed in a rush for immediate use in our classrooms. In our experience with large software projects, especially open source, it is important to lay a strong architectural foundation for the community to build from. Funding will enable us to write documentation (there is none at the moment!) and work to to improve performance and the overall architecture. It will also help us reduce bugs and repetitive code. In addition, we want to provide easy beta-testing access to users who may lack the technical experience to download, compile, and install from an open source repository.</p>

<p>So why the Kickstarter? We are a self-funded makerspace for kids. Rather than choosing between our original mission and making BlocksCAD, we&#39;re turning to crowdfunding with the hope that we can accomplish both!</p>
<div class="timestamp">
Last updated:
<time class="js-adjust" data-format="llll z" datetime="2014-09-07T10:32:02-04:00">Sun, Sep 7 2014 10:32 am EDT</time>
</div>
</div>
</li>
<li class="faq" id="project_faq_104972">
<div class="faq-question">
<a href="#project_faq_104972" name="project_faq_104972">
<span class="ss-icon ss-navigateright"></span>
<span class="question">Is BlocksCAD for Windows only?</span>
</a>
</div>
<div class="faq-answer">
<p>Linux and Mac users rejoice! Because BlocksCAD is browser-based, it will work on any operating system that supports Firefox or Chrome.</p>
<div class="timestamp">
Last updated:
<time class="js-adjust" data-format="llll z" datetime="2014-09-07T11:31:57-04:00">Sun, Sep 7 2014 11:31 am EDT</time>
</div>
</div>
</li>
<li class="faq" id="project_faq_105010">
<div class="faq-question">
<a href="#project_faq_105010" name="project_faq_105010">
<span class="ss-icon ss-navigateright"></span>
<span class="question">Who made those cool 3D printed designs I saw in the video?</span>
</a>
</div>
<div class="faq-answer">
<p>The Gear Bearing at the end was design by Emmett Lalish and can be downloaded here: <a href="http://thingiverse.com/thing:53451" rel="nofollow">http://thingiverse.com/thing:53451</a></p>

<p>The truck with movable wheels was made by Connor. We can&#39;t tell you his last name because he&#39;s a kid!</p>
<div class="timestamp">
Last updated:
<time class="js-adjust" data-format="llll z" datetime="2014-09-07T18:08:12-04:00">Sun, Sep 7 2014 6:08 pm EDT</time>
</div>
</div>
</li>

</ul>
<div class="faq-ask-box">
<a class="button button_blue remote_modal_dialog message_creator_modal_link" data-modal-class="modal_send_message" data-modal-title="Ask a question about BlocksCAD: Easy 3D CAD for Kids &amp;amp; Adults, Open-..." href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/messages/new?message%5Bto%5D=einsteinsworkshop&amp;mode=FAQ">Ask a question</a>

</div>
</div>

<div class="mt4 ml1 mr1 mb2" id="report-issue-wrap">
<a class="button button_grey" href="/login?then=%2Fprojects%2Feinsteinsworkshop%2Fblockscad-easy-3d-cad-for-kids-and-adults-open-sou">Report this project to Kickstarter</a>
</div>
</div>
<div class="grid_5">
<div class="NS-projects-rightcol" id="rightcol">
<div class="NS_projects__ecom">
<div class="digits_4 pb2 pl2 pt2" id="stats">
<h5>
<div class="num h48 no-margin" data-backers-count="37" id="backers_count"><data class="Project89340412" data-format="number" data-value="37" itemprop="Project[backers_count]">37</data></div>
<span><data class="Project89340412" data-attr="backers_count" data-format="pluralize" data-value="37" data-word="Backer">Backers</data></span>
</h5>
<h5>
<div class="num h48 no-margin" data-goal="42000.0" data-percent-raised="0.039761904761904762" data-pledged="1670.0" data-ref-tag="recommended" id="pledged">
<data class="Project89340412" data-currency="USD" data-format="shorter_money" data-precision="0" data-value="1670" data-without_code="true" itemprop="Project[pledged]">$1,670</data>
<span class="money usd project_currency_code"></span>
</div>
pledged of
<span class="money usd no-code">$42,000</span>
goal
</h5>
<span data-duration="28.269224537037037" data-end_time="2014-10-04T20:00:00-04:00" data-hours-remaining="638.4351852352089" id="project_duration_data"></span>
<div class="Project89340412" data-conditions="[{&quot;!state&quot;:[&quot;canceled&quot;,&quot;suspended&quot;]}]" data-evaluation="true" data-render="&quot;&lt;h5 class=\&quot;poll ksr_page_timer\&quot; data-dynamic=\&quot;5\&quot; data-end_time=\&quot;2014-10-04T20:00:00-04:00\&quot; data-poll_url=\&quot;https://d2oher2uhvl0ur.cloudfront.net/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/stats.json?v=1\&quot;&gt;\n&lt;div class=\&quot;num h48 no-margin\&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;span class=\&quot;text\&quot;&gt;&amp;nbsp;&lt;/span&gt;\n&lt;/h5&gt;\n&quot;"><h5 class="poll ksr_page_timer" data-dynamic="5" data-end_time="2014-10-04T20:00:00-04:00" data-poll_url="https://d2oher2uhvl0ur.cloudfront.net/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/stats.json?v=1">
<div class="num h48 no-margin">&nbsp;</div>
<span class="text">&nbsp;</span>
</h5>
</div></div>
<div class="Project89340412" data-conditions="[{&quot;state&quot;:&quot;live&quot;},{&quot;!ended?&quot;:true}]" data-evaluation="true" data-render="&quot;&lt;div class=\&quot;pr2 pl2\&quot; id=\&quot;pledge-wrap\&quot;&gt;\n&lt;a class=\&quot;button button_green button_box button_block\&quot; href=\&quot;/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?clicked_reward=false&amp;amp;ref=recommended\&quot; id=\&quot;button-back-this-proj\&quot; title=\&quot;Back this project\&quot;&gt;Back This Project &lt;small class=&#39;h6 normal block green-dark&#39;&gt;&lt;span class=\&quot;money usd \&quot;&gt;$1&lt;/span&gt; minimum pledge&lt;/small&gt;&lt;/a&gt;\n&lt;/div&gt;\n&quot;"><div class="pr2 pl2" id="pledge-wrap">
<a class="button button_green button_box button_block" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?clicked_reward=false&amp;ref=recommended" id="button-back-this-proj" title="Back this project">Back This Project <small class='h6 normal block green-dark'><span class="money usd ">$1</span> minimum pledge</small></a>
</div>
</div><div class="Project89340412" data-conditions="[{&quot;state&quot;:&quot;live&quot;}]" data-evaluation="true" data-render="&quot;&lt;div class=\&quot;p2\&quot; id=\&quot;banner\&quot;&gt;\n&lt;p class=\&quot;tiny_type no-margin\&quot;&gt;\nThis project will only be funded if at least\n&lt;span class=\&quot;money usd \&quot;&gt;$42,000&lt;/span&gt;\nis pledged by\n&lt;time class=\&quot;js-adjust\&quot; data-format=\&quot;llll z\&quot; datetime=\&quot;2014-10-04T20:00:00-04:00\&quot;&gt;Sat, Oct 4 2014 8:00 pm EDT&lt;/time&gt;.\n&lt;/p&gt;\n&lt;/div&gt;\n&quot;"><div class="p2" id="banner">
<p class="tiny_type no-margin">
This project will only be funded if at least
<span class="money usd ">$42,000</span>
is pledged by
<time class="js-adjust" data-format="llll z" datetime="2014-10-04T20:00:00-04:00">Sat, Oct 4 2014 8:00 pm EDT</time>.
</p>
</div>
</div></div>

<div class="NS_projects__rightcol_projectby bg-blue-light rounded">
<div class="p2 clearfix">
<div class="avatar inline-block align-middle">
<a class="remote_modal_dialog" data-modal-class="modal_project_by" data-modal-title="Biography" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/creator_bio"><img alt="" class="avatar-small" height="80" src="https://s3.amazonaws.com/ksr/avatars/11322890/logo_ew_square_800x800.small.jpg?1404911209" width="80" />
</a></div>
<div class="creator-name inline-block align-middle ml1">
<h6 class="mb1">Project by</h6>
<h5 class="mb1">
<a class="green-dark remote_modal_dialog" data-modal-class="modal_project_by" data-modal-title="Biography" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/creator_bio">Einstein&#39;s Workshop</a>
</h5>
<p class="location h6 bold mb1">
<a href="/discover/places/burlington-ma">Burlington, MA</a>
</p>
</div>
</div>
<div class="creator-details pl2 pr2 pb1">
<ul class="list-simple h5 mb1">
<li class="projects">
<span class="ss-icon ss-kickstarter grey-dark margin-right"></span>
<span class="text">
First created
<span class="divider">&middot;</span>
0 backed
</span>
</li>
<li class="facebook-connected">
<span class="ss-icon ss-facebook facebook color-facebook margin-right"></span>
<span class="text">
<a class="popup" href="https://www.facebook.com/708937" target="_blank">Henry Houh</a>
<span class="number h6">
1323
friends
</span>
</span>

</li>
<li class="links">
<span class="ss-icon ss-globe margin-right grey-dark"></span>
<span class="text">
<a class="popup" href="http://www.einsteinsworkshop.com" rel="nofollow" target="_blank">einsteinsworkshop.com</a>
</span>
</li>
</ul>
</div>
<div class="footer center h5 bold clearfix rounded-bottom clip">
<a class="remote_modal_dialog full_bio" data-modal-class="modal_project_by" data-modal-title="Biography" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/creator_bio">See full bio</a>
<a class="remote_modal_dialog message_creator_modal_link" data-modal-class="modal_send_message" data-modal-title="Send a message to Einstein&#39;s Workshop" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/messages/new?message%5Bto%5D=einsteinsworkshop">Contact me</a>

</div>
</div>

<ul class="NS-projects-rightcol-rewards clip list mt2 pledgeable rounded" data-reward-count="13" id="what-you-get">
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827297&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$5</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
2 backers
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Every dollar counts! Contributors at this level will receive exclusive backer-only updates and will be listed in the credits page.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Every dollar counts! Contributors at this level will receive exclusive backer-only updates and will be listed in the credits page.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=3026516&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$15</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
2 backers
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Give us a boost! Back us at $15 and download an STL 3D model of our mascot, The Blockhead. Remix our design or print your own! Also includes your name in the credits and backer-only updates.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Give us a boost! Back us at $15 and download an STL 3D model of our mascot, The Blockhead. Remix our design or print your own! Also includes your name in the credits and backer-only updates.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827299&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$30</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
12 backers
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Welcome to the Beta Tester level! You&#39;ll gain early access to the BlocksCAD software, with an opportunity to help us make it the best CAD software it can be. And of course, you&#39;ll get your name in the credits and a digital 3D model of the Blockhead.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Welcome to the Beta Tester level! You&#39;ll gain early access to the BlocksCAD software, with an opportunity to help us make it the best CAD software it can be. And of course, you&#39;ll get your name in the credits and a digital 3D model of the Blockhead.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=3026517&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$42</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
12 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(30 left of 42)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
You are The Answer to our needs!  This is a limited-edition early-bird price for the $50 T-shirt level, detailed below.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>You are The Answer to our needs!  This is a limited-edition early-bird price for the $50 T-shirt level, detailed below.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827298&amp;clicked_reward=true&amp;ref=ksr_staff"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$50</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
4 backers
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
BlocksCAD: The T-shirt. Wear your heart on your sleeve... or your chest... with our &quot;I &lt;block&gt; CAD T-shirt&quot; and proudly announce your support!

This reward level also includes high-fives when we see you wearing the shirt, early access to the BlocksCAD software, the digital 3D Blockhead download, your name in the credits, and backer-only updates.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>BlocksCAD: The T-shirt. Wear your heart on your sleeve... or your chest... with our &quot;I &lt;block&gt; CAD T-shirt&quot; and proudly announce your support!

This reward level also includes high-fives when we see you wearing the shirt, early access to the BlocksCAD software, the digital 3D Blockhead download, your name in the credits, and backer-only updates.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827300&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$100</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
5 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(45 left of 50)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Early adopters are VIPs! You&#39;ll receive the VIP version of our mascot, &quot;The Blockhead&quot; (normally only available at the $1000 level). This reward level is limited to 50 backers, so if you want the top hat, act quickly!

This reward level also includes everything in the previous reward levels.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Early adopters are VIPs! You&#39;ll receive the VIP version of our mascot, &quot;The Blockhead&quot; (normally only available at the $1000 level). This reward level is limited to 50 backers, so if you want the top hat, act quickly!

This reward level also includes everything in the previous reward levels.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827301&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$100</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Get a 3D Printed Mascot! Back at this level and we&#39;ll mail you a full-color 3D print of our mascot, &quot;The Blockhead&quot;.

This reward level also includes the digital model and everything in the $50 reward level.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Get a 3D Printed Mascot! Back at this level and we&#39;ll mail you a full-color 3D print of our mascot, &quot;The Blockhead&quot;.

This reward level also includes the digital model and everything in the $50 reward level.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-01-01">Jan 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="domestic">
Ships within the US only
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827365&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$250</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(60 left of 60)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Join us at Einstein&#39;s Workshop for a 3-hour BlocksCAD Boot Camp in Burlington, MA!

This reward level also includes everything in the $100 backer level. (Lodging and transportation not included; subject to scheduling availability)
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Join us at Einstein&#39;s Workshop for a 3-hour BlocksCAD Boot Camp in Burlington, MA!

This reward level also includes everything in the $100 backer level. (Lodging and transportation not included; subject to scheduling availability)</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-06-01">Jun 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827547&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$500</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(24 left of 24)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Join us for the Boot Camp AND our BlocksCAD launch party! Chill with the founders of Einstein&#39;s Workshop and the developers of BlocksCAD as we declare victory at last. This reward level includes access to a BlocksCAD Boot Camp session at Einstein&#39;s Workshop in Burlington, MA, an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included; subject to scheduling availability)
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Join us for the Boot Camp AND our BlocksCAD launch party! Chill with the founders of Einstein&#39;s Workshop and the developers of BlocksCAD as we declare victory at last. This reward level includes access to a BlocksCAD Boot Camp session at Einstein&#39;s Workshop in Burlington, MA, an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included; subject to scheduling availability)</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-09-01">Sep 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827490&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$500</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(50 left of 50)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Don&#39;t need Boot Camp, but want to join us for the Launch Party?  Back our project at this level and get an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included.)
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Don&#39;t need Boot Camp, but want to join us for the Launch Party?  Back our project at this level and get an invite for two to the Launch Party (estimated September 2015) and all the rewards listed in the $100 backer level (estimated delivery January 2015.)  (Lodging and transportation not included.)</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2015-09-01">Sep 2015</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827600&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$1,000</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(10 left of 10)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Exclusive BlocksCAD VIP dinner! Help us celebrate our success. Back at this level to get a sneak-peek demo of BlocksCAD, and meet the founders and developers over dinner.

This level includes dinner for two at an exclusive VIP gathering in Burlington, MA, a limited-edition &quot;VIP Top Hat Blockhead&quot; 3D printed model, an invitation for two to the BlocksCAD launch party, two BlocksCAD t-shirts, early access to the BlocksCAD software, the digital 3D Blockhead model download, your name in the credits, and backer-only updates. (Lodging and transportation not included)
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Exclusive BlocksCAD VIP dinner! Help us celebrate our success. Back at this level to get a sneak-peek demo of BlocksCAD, and meet the founders and developers over dinner.

This level includes dinner for two at an exclusive VIP gathering in Burlington, MA, a limited-edition &quot;VIP Top Hat Blockhead&quot; 3D printed model, an invitation for two to the BlocksCAD launch party, two BlocksCAD t-shirts, early access to the BlocksCAD software, the digital 3D Blockhead model download, your name in the credits, and backer-only updates. (Lodging and transportation not included)</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2014-11-01">Nov 2014</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $12 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827855&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$5,000</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(5 left of 5)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
At this level, we&#39;ll bring a 2-day BlocksCAD class to you anywhere in the Continental US!

Please contact us prior to selecting this reward. Outside continental US may be available, contact us for details.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>At this level, we&#39;ll bring a 2-day BlocksCAD class to you anywhere in the Continental US!

Please contact us prior to selecting this reward. Outside continental US may be available, contact us for details.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2016-01-01">Jan 2016</time>
</div>
<div class="h6">
<div class="NS_backer_rewards__shipping">
<span class="international">
Add $1,000 USD to ship outside the US
</span>
</div>

</div>
</div>
</div>

</a>

</li>
<li class="NS-projects-reward bg-grey-light border-bottom relative">
<a class="pledge block remote_modal_dialog hover-group" data-modal-class="checkout_modal" href="/projects/einsteinsworkshop/blockscad-easy-3d-cad-for-kids-and-adults-open-sou/pledge/new?backing%5Bbacker_reward_id%5D=2827856&amp;clicked_reward=true"><div class="hover-zoomout bg-green-90 z1 hide">
<div class="table full-width full-height">
<div class="table-cell align-middle center">
<div class="h3 white">Select this reward</div>
</div>
</div>
</div>
<div class="NS_backer_rewards__reward p2">
<span class="indicator you-selected h6 bold bg-green white pl1 pr1 relative t0 hide">
You selected
</span>
<h5 class="mb1">
Pledge
<span class="money usd ">$10,000</span>
or more
</h5>
<p class="backers-limits">
<span class="ss-icon ss-backer green h4 icon-nudge-down"></span>
<span class="backers-wrap h6 bold">
<span class="num-backers mr1">
0 backers
</span>
<span class="bg-yellow limited no-wrap pl1 pr1">
Limited
<span class="limited-number">(3 left of 3)</span>
</span>
</span>
</p>
<div class="native-show">
<div class="description expandable_excerpt mb2">
<p class="excerpt wrap-words" style="-webkit-line-clamp: 4">
Sponsor a School: Be a hero for your local school. We&#39;ll send one of our experts to train up to 12 teachers on the BlocksCAD software, donate a 3D printer, and train up to 3 staff members on its operation. Everything your school needs to get started in 3D printing! Hawaii, Alaska, and international backers, please contact us if you&#39;re interested in backing at this level.
</p>
<span class="view_more fastclick">
Read more<span class='ss-icon ss-navigatedown'></span>
</span>
</div>

</div>
<div class="desc h5 mb2 break-word native-hide">
<p>Sponsor a School: Be a hero for your local school. We&#39;ll send one of our experts to train up to 12 teachers on the BlocksCAD software, donate a 3D printer, and train up to 3 staff members on its operation. Everything your school needs to get started in 3D printing! Hawaii, Alaska, and international backers, please contact us if you&#39;re interested in backing at this level.</p>
</div>
<div class="shipping-wrap">
<div class="delivery-date h6">
<b>Estimated delivery:</b>
<time class="js-adjust" data-format="MMM YYYY" datetime="2016-01-01">Jan 2016</time>
</div>
<div class="h6">

</div>
</div>
</div>

</a>

</li>
</ul>

<div class="p2" id="meta">
<h5>Funding period</h5>
<p class="tiny_type">
<time class="js-adjust" data-format="ll" datetime="2014-09-06T13:32:19-04:00">Sep 6, 2014</time> - 
<time class="js-adjust" data-format="ll" datetime="2014-10-04T20:00:00-04:00">Oct 4, 2014</time>
(28 days)
</p>
</div>
</div>

</div>
</div>

<a href="#" id="video_mode_tab" style="display: none;">
View in Video Mode
</a>

</div>
</div>


</div>

<div class="h5 bg-green-dark" id="mega-footer-wrap">
<div class="bg-green-dark white full-height" id="footer-newsletter-signup">
<div class="container-flex py4">
<div class="col-pre-2 col-post-2 center mt4">
<h2>
Eureka! You've found
<br>
our little secret.
</h2>
<p>Sign up for our Happening email for all the inside info about arts and culture in the Kickstarter universe and beyond.</p>
<div class="newsletter_signup">
<form accept-charset="UTF-8" action="/newsletters/happening/signup" class="overlabels" method="post"><div style="margin:0;padding:0;display:inline"><input class="hidden" name="utf8" type="hidden" value="&#x2713;" /><input class="hidden" name="authenticity_token" type="hidden" value="j5Uaa5xgZv1s8ez7L7LuYWjIELw1XHdD3Ti3r+6fiGg=" /></div><input class="hidden" id="location" name="location" type="hidden" value="footer" />
<textarea class="hide textarea" id="comment" name="comment">
</textarea>
<div class="field newsletter">
<label class="overlabel z1 overlabel-newsletter ellipsis-line">Email address</label>
<input class="text" id="email" name="email" type="text" />
</div>
<input class="button button_green submit" name="commit" type="submit" value="Submit" />
</form>

</div>

</div>
</div>
</div>
<div class="container-flex px2 relative" id="mega-footer">
<span class="scissors icon-scissors-1"></span>
<div class="row pt4 pb2" id="mega-footer-links">
<div class="mobile-col mobile-col-6 link-group">
<div class="row">
<div class="col col-6">
<h5 class="white">About us</h5>
<ul class="list">
<li><a href="/hello?ref=footer">What is Kickstarter?</a></li>
<li><a href="/year/2013/?ref=footer">2013 highlights</a></li>
<li><a href="/year/2012?ref=footer">2012 highlights</a></li>
<li><a href="/team?ref=footer">Who we are</a></li>
<li><a href="/jobs?ref=footer">Jobs</a></li>
<li><a href="/press?ref=footer">Press</a></li>
<li><a href="/help/stats?ref=footer">Stats</a></li>
<li><a href="/newsletters/weekly">Projects we love</a></li>
</ul>
</div>
<div class="col col-6 link-group">
<h5><a class="white" href="/help?ref=footer">Help</a></h5>
<ul class="list">
<li><a href="/help/faq/kickstarter+basics?ref=footer">FAQ</a></li>
<li><a href="/rules?ref=footer">Our Rules</a></li>
<li><a href="/help/handbook?ref=footer">Creator Handbook</a></li>
<li><a href="/trust?ref=footer">Trust &amp; Safety</a></li>
<li><a href="/contact?ref=footer">Support</a></li>
<li><a href="/terms-of-use?ref=footer">Terms of Use</a></li>
<li><a href="/privacy?ref=footer">Privacy Policy</a></li>
</ul>
</div>
</div>
</div>
<div class="mobile-col mobile-col-6">
<div class="row">
<div class="col col-8 mb1 link-group">
<h5><a class="white" href="/discover/advanced?ref=footer">Discover</a></h5>
<div class="row">
<ul class="col col-6 column column-0 list mb0">
<li><a href="/discover/categories/art?ref=footer">Art</a></li>
<li><a href="/discover/categories/comics?ref=footer">Comics</a></li>
<li><a href="/discover/categories/crafts?ref=footer">Crafts</a></li>
<li><a href="/discover/categories/dance?ref=footer">Dance</a></li>
<li><a href="/discover/categories/design?ref=footer">Design</a></li>
<li><a href="/discover/categories/fashion?ref=footer">Fashion</a></li>
<li><a href="/discover/categories/film%20&amp;%20video?ref=footer">Film &amp; Video</a></li>
<li><a href="/discover/categories/food?ref=footer">Food</a></li>
</ul>
<ul class="col col-6 column column-1 list mb0">
<li><a href="/discover/categories/games?ref=footer">Games</a></li>
<li><a href="/discover/categories/journalism?ref=footer">Journalism</a></li>
<li><a href="/discover/categories/music?ref=footer">Music</a></li>
<li><a href="/discover/categories/photography?ref=footer">Photography</a></li>
<li><a href="/discover/categories/publishing?ref=footer">Publishing</a></li>
<li><a href="/discover/categories/technology?ref=footer">Technology</a></li>
<li><a href="/discover/categories/theater?ref=footer">Theater</a></li>
</ul>
</div>
</div>
<div class="col col-4 link-group">
<h5 class="white">Hello</h5>
<ul class="list">
<li>
<a href="https://twitter.com/kickstarter"><span class="ss-icon ss-social-regular ss-twitter"></span>
Twitter
</a></li>
<li>
<a href="https://www.facebook.com/Kickstarter"><span class="ss-icon ss-social-regular ss-facebook"></span>
Facebook
</a></li>
<li>
<a href="http://kickstarter.tumblr.com"><span class="ss-icon ss-social-regular ss-tumblr"></span>
Tumblr
</a></li>
<li>
<a href="http://instagram.com/kickstarter"><span class="ss-icon ss-social-regular ss-instagram"></span>
Instagram
</a></li>
<li>
<a href="https://vine.co/Kickstarter"><span class="ss-icon ss-social-regular ss-vine"></span>
Vine
</a></li>
<li>
<a href="/blog?ref=footer">Blog</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="row py4 border-top" id="mega-footer-bottom">
<div class="logo col mb1">
<a class="grey-dark" href="/"><span class="ss-icon h3">KICKSTARTER</span>
</a></div>
<p class="col-right px0 h5 grey-dark">
&copy;
2014
Kickstarter, Inc.
</p>
</div>
</div>
</div>

<script>
  //<![CDATA[
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
    var analytics_vars = { google_analytics_id : "UA-7621056-1", logged_in : "false", social_user: "false" }
  //]]>
</script>


<script>
  //<![CDATA[
    window.mixpanel_id = '75b1d24a516ecfc955eadfadc4910661';
    window.mixpanel_debug = false;
  //]]>
</script>


<noscript>
<img alt="Quantcast" border="0" height="1" src="//secure.quantserve.com/pixel/p-34IbSpw2K94Sg.gif" style="display:none" width="1" />
</noscript>


<script>
  //<![CDATA[
    window.benchmark = (typeof window.performance == 'object' && typeof window.performance.mark == 'function');
  //]]>
</script>
<script>
  //<![CDATA[
    (function (root) {
      function instrument_function (original) {
        return function () {
          try {
            return original.apply(this, arguments);
          } catch (e) {
            if (e.stack && root.Honeybadger) {
    
              // sample 10% of errors so we don't overwhelm honeybadger
              if (parseInt(Math.random() * 10, 10) === 0) {
                Honeybadger.notify(e, {
                  current_project : root.current_project,
                  current_user : root.current_user
                });
              }
    
            }
            throw(e);
          }
        };
      }
      root.instrument_function = instrument_function;
    }(this));
  //]]>
</script>

<script>
  //<![CDATA[
    (function(){function c(a){this.local_start_time=new Date;this.settings={cookie_name:"request_time"};for(var b in a)this.settings[b]=a[b];this.get_remote_offset()}c.prototype.get_remote_offset=function(){this.cookie_value=this.read_cookie();var a=new Date(this.cookie_value);if(!this.cookie_value||"Invalid Date"===a.toString()){if(this.remote_offset=this.read_cookie("local_offset"))this.remote_offset=parseInt(this.remote_offset,10)}else this.remote_offset=a-this.local_start_time;"undefined"!==typeof this.remote_offset&& !isNaN(this.remote_offset)?(document.cookie="local_offset="+this.remote_offset+"; path=/",this.is_set=!0):this.is_set=!1};c.prototype.time_units=[["milliseconds",1],["seconds",1E3],["minutes",6E4],["hours",36E5],["days",864E5]];c.prototype.get_units_in_interval=function(a,b){var d=a.replace(/^\w/,function(d){return"get"+d.toUpperCase()});return b[d]()};c.prototype.milliseconds_in_day=function(a){"undefined"===typeof a&&(a=new Date);for(var b=0,d=this.time_units.length-2;0<=d;d--)b+=this.get_units_in_interval(this.time_units[d][0], a)*this.time_units[d][1];return b};c.prototype.milliseconds_in_interval=function(a,b){return this.milliseconds_in_day(b)%a};c.prototype.milliseconds_to_next_interval=function(a,b){return a-this.milliseconds_in_interval(a,b)};c.prototype.pluralize=function(a,b){1===b&&(a=a.replace(/s$/,""));return a};c.prototype.read_cookie=function(a){for(var b=window.document.cookie.split(";"),a=(a||this.settings.cookie_name)+"=",d=0;d<b.length;d++){for(var e=b[d];" "==e.charAt(0);)e=e.substring(1,e.length);if(0== e.indexOf(a))return b=e.substring(a.length,e.length),decodeURIComponent(b).replace(/\+/g," ")}return null};c.prototype.destroy_cookie=function(a){var b=new Date;a||(a=this.settings.cookie_name);b.setTime(b.getTime()-864E5);window.document.cookie=a+"=; expires="+b.toGMTString()+"; path=/"};c.prototype.get_remote_time=function(){var a=new Date,b=a.getTime()+this.remote_offset;return a=a.setTime(b)};window.ksr_page_clock=new c})(); (function(){function c(d,a,b){if(d){this.options={unit_base:{seconds:119,minutes:119,hours:72,days:0},end_phrase:d.getAttribute("data-word")||"to go",count_down:d.getAttribute("data-dynamic")||!1};for(k in b)this.options[k]=b[k];this.clock=a;this.time_units=this.clock.time_units.slice(1);this.element=d;this.clock.is_set&&this.attach()}}function a(){this.elements=[];this.attach()}var b=function(d,a){var b=a||window.document.body,c=d.split("."),g=c[c.length-1],c=1<c.length&&c[0]?c[0]:"*";if(window.document.getElementsByClassName)return b.getElementsByClassName(g); if(b.querySelectorAll)return b.querySelectorAll(d);for(var c=b.getElementsByTagName(c),h=[],i=0,f;f=c[i];i++)b=RegExp("(^|\\s)"+g+"(\\s|$)"),(""+f.className).match(b)&&h.push(f);return h};c.prototype.get_remaining_time=function(){var d=this.remote_end_time-this.clock.get_remote_time();0>d&&(d=0);return d};c.prototype.get_current_unit=function(){for(var d,a=0;a<this.time_units.length&&!(d=this.time_units[a],this.get_remaining_time()<=this.options.unit_base[d[0]]*d[1]);a++);return d};c.prototype.update_element= function(){var a=this.get_current_unit(),b=Math.floor(this.get_remaining_time()/a[1]);isNaN(b)||(this.number_element.innerHTML=b,this.text_element.innerHTML=this.clock.pluralize(a[0],b)+" "+this.options.end_phrase)};c.prototype.valid=function(){return!(!this.number_element||!this.text_element)};c.prototype.attach=function(){function a(){c.update_element();if(c.options.count_down&&0<c.get_remaining_time()){var b=c.get_current_unit();this.timeout=window.setTimeout(a,c.clock.milliseconds_to_next_interval(b[1]))}} var c=this;if(this.remote_end_time_string=this.element.getAttribute("data-end_time"))this.remote_end_time_string.match(/^\d+$/)?(this.remote_end_time=new Date,this.remote_end_time.setTime(this.remote_end_time_string)):this.remote_end_time=new Date(this.remote_end_time_string),this.number_element=b(".num",this.element)[0],this.text_element=b(".text",this.element)[0],this.element.ksr_page_timer=!0,this.valid()&&a()};c.prototype.cancel=function(){this.timeout&&clearTimeout(this.timeout)};a.prototype.loading= !0;a.prototype.stop_finding=function(){this.attach_timers();this.loading=!1;document.addEventListener?document.removeEventListener("DOMContentLoaded",this.stop_finding,!1):document.attachEvent&&"complete"===document.readyState&&document.detachEvent("onreadystatechange",this.stop_finding)};a.prototype.bind_ready=function(){var a=this,b=function(){a.stop_finding.call(a)};document.addEventListener?(document.addEventListener("DOMContentLoaded",b,!1),window.addEventListener("load",b,!1)):document.attachEvent&& (document.attachEvent("onreadystatechange",b),window.attachEvent("onload",b))};a.prototype.attach_timers=function(){for(var a=b("div.ksr_page_timer"),e=0;e<a.length;e++)a[e].ksr_page_timer||(new c(a[e],window.ksr_page_clock),this.elements.push(a[e]))};a.prototype.attach=function(){var a=this;this.bind_ready();(function(){a.attach_timers();a.loading&&window.setTimeout(function(){a.attach_timers()},200)})()};window.ProjectTimer=c;new a})();
  //]]>
</script>

<script class="template" id="template-widgets__video_embed_code" type="text/x-tmpl-mustache"><iframe width="{{width}}" height="{{height}}" src="{{{path}}}" frameborder="0" scrolling="no"> </iframe>
</script><script class="template" id="template-projects__baseball_card_tall" type="text/x-tmpl-mustache"><div class="project-card-wrap project-card-wrap-{{baseball_card_size}} border bg-white rounded clip">
  <div class="project-card relative project-live {{#successful?}}successful{{/successful?}}">
    <div class="project-thumbnail rounded-top clip">
      <a href="{{url_with_ref}}" target="">
        <img alt="Project image" class="projectphoto-ed fit" src="{{photo.ed}}" width="100%">
      </a>
    </div>
    <div class="project-card-interior p1 h6 grey-dark">
      <h6 class="project-title mobile-center">
        <a href="{{url_with_ref}}" target="" class="green-dark">{{name}}</a>
      </h6>
      <p class="mb1 ellipsis mobile-hide">
        by
        {{creator.name}}
      </p>
      <p class="blurb mobile-hide">
        {{blurb}}
      </p>
    </div>
    <div class="footer absolute-bottom bg-white rounded-bottom">

      {{#location}}
        <ul class="p1 list project-meta no-margin h6 mobile-hide">
          <li class="ellipsis">
            <a href="{{location.urls.web.discover}}" data-location="{{location_json}}" class="grey-dark">
              <span class="ss-icon ss-location"></span>
              <span class="location-name">{{location.displayable_name}}</span>
            </a>
          </li>
        </ul>
      {{/location}}

      <div class="project-stats-wrap pb1 pl1 pr1">

        {{#failed?}}
          <div class='project-status project-failed h6'>
            <strong> Funding Unsuccessful</strong><br />
            <span class="grey-dark">Project ended on {{formatted_deadline}}</span>
          </div>
        {{/failed?}}

        {{#canceled?}}
          <div class='project-status project-canceled h6'>
            <strong> Funding Canceled</strong><br />
            <span class="grey-dark">Project canceled on {{formatted_state_changed_at}}</span>
          </div>
        {{/canceled?}}

        {{#successful?}}
          <div class='project-pledged-successful bg-green white h6 pl1 pr1 mb1'>
            <strong>Successfully funded!</strong>
          </div>
        {{/successful?}}

        {{#live_or_successful?}}
          {{#live?}}
            <div class="project-pledged-wrap bg-grey clip mb1">
              <div class="project-pledged bg-green full-height" style="width: {{percent_raised_to_100}}%"></div>
            </div>
          {{/live?}}
          <ul class="project-stats list no-margin h6 no-wrap">
            <li class="first funded inline-block mr1">
              <strong class="block h6">{{percent_raised_rounded}}%</strong>
              <span class="grey-dark">funded</span>
            </li>
            <li class="pledged inline-block mr1">
              <strong class="block h6">{{currency_symbol}}{{formatted_money}}</strong>
              <span class="grey-dark">pledged</span>
            </li>
            {{#successful?}}
              <li class="last successful inline-block">
                <strong class="block h6">Funded</strong>
                <div class="deadline grey-dark">{{formatted_deadline}}</div>
              </li>
            {{/successful?}}
            {{#live?}}
              <li class="last ksr_page_timer inline-block" data-end_time="{{javascript_deadline}}">
                <strong class="block h6">
                  <div class="num">30</div>
                </strong>
                <div class="span text grey-dark" data-word="left">days to go</div>
              </li>
            {{/live?}}
          </ul>
        {{/live_or_successful?}}
      </div>
    </div>
  </div>
</div>

{{#friends_backing?}}
  <div class="friend_project_context">
    <div class="friend_facepile">
      {{#truncated_friends}}
        <img src="{{avatar.thumb}}" class="{{#has_metadata?}}small{{/has_metadata?}} circle">
      {{/truncated_friends}}
    </div>
    <p class="friend_namepile">
      {{{escaped_sentence}}}
    </p>
  </div>
{{/friends_backing?}}
</script><script class="template" id="template-projects__video_mode" type="text/x-tmpl-mustache"><a href='#' id='video_mode_close' class='close_button z2'><span class='ss-icon ss-delete'></span></a>

<div class='title_card z1 {{context_classes}}' style="display:none;">
  <div class='interior'>
    <h2 class='project_title normal_weight'>{{name}}</h2>
    <p class='blurb'>{{blurb}}</p>
    <nav class='bar'>
      <a id='play_button' class='left play' href='#'>
        <span class='play_active'>
          <span class='ss-icon ss-play'></span>
          Play
        </span>
        <span class='pause_active'>
          <span class='ss-icon ss-pause'></span>
          Pause
        </span>
      </a>
      {{#logged_in}}
        <div class='remind right'>
          {{#if_not_starred}}
            <a class='follow' href='{{urls.web.project}}/watch'><span class='ss-icon ss-star'></span></a>
          {{/if_not_starred}}
          {{#if_starred}}
            <a class='unfollow' href='{{urls.web.project}}/unwatch'><span class='ss-icon ss-star active'></span></a>
          {{/if_starred}}
        </div>
      {{/logged_in}}
      <a class='right explore button button_green small' href='#'>Explore this project</a>
    </nav>
  </div>
</div>

<div class='channel_controls z1'>
  <a href='#' class='{{#playlist_is_location}}selected {{/playlist_is_location}}location'>Something else near {{location.first_name}} <span class='ss-icon ss-navigateright'></span></a>
  <a href='#' class='{{#playlist_is_featured}}selected {{/playlist_is_featured}}featured'>Something different<span class='ss-icon ss-navigateright'></span></a>
  <a href='#' class='{{#playlist_is_category}}selected {{/playlist_is_category}}category'>Something else in {{category.name}} <span class='ss-icon ss-navigateright'></span></a>
</div>

<div class='project_video' style='background-image: url('{{photo.full}}')'>
  <div class='cover'>
    <video>
      <source src='{{video.high}}' type='video/mp4'/>
      <source src='{{video.webm}}' type='video/webm'/>
    </video>
  </div>
</div>
</script><script class="template" id="template-site__video_mode_fourohfour" type="text/x-tmpl-mustache"><section class='four_oh_four'>
  <p class='big_type'>
    Looks like you've reached the end of the line! <br />Check out <a class="another" href='#'>another channel</a> or <a href='/discover'>browse projects in discover</a>.
  </p>
</section>
</script>

<script id="schwamm_formatting_options">
//<![CDATA[
(function(){window.formatters = window.formatters || {}; var formatting_options = {"distance_date_intervals":[[5,"just now"],[29,"less than a minute ago"],[89,"1 minute ago"],[2640,"%m minutes ago"],[5340,"about 1 hour ago"],[82800,"about %h hours ago"],[147600,"1 day ago"],[604800,"%d days ago"],[15552000,"on %t"],[0,"on %y"]],"currency_symbol_mappings":{"AFN":"؋","ALL":"Lek","ARS":"$","AUD":"$","AWG":"ƒ","AZN":"ман","BAM":"KM","BBD":"$","BGN":"лв","BMD":"$","BND":"$","BOB":"$b","BRL":"R$","BSD":"$","BWP":"P","BYR":"p.","BZD":"BZ$","CAD":"$","CLP":"$","CNY":"¥","COP":"$","CRC":"₡","CUP":"₱","CZK":"Kč","DKK":"kr","DOP":"RD$","EGP":"£","EUR":"€","FJD":"$","FKP":"£","GBP":"£","GIP":"£","GTQ":"Q","GYD":"$","HKD":"$","HNL":"L","HRK":"kn","HUF":"Ft","IDR":"Rp","ILS":"₪","IRR":"﷼","ISK":"kr","JMD":"J$","JPY":"¥","KGS":"лв","KHR":"៛","KPW":"₩","KRW":"₩","KYD":"$","KZT":"лв","LAK":"₭","LBP":"£","LKR":"₨","LRD":"$","LTL":"Lt","LVL":"Ls","MKD":"ден","MNT":"₮","MUR":"₨","MXN":"$","MYR":"RM","MZN":"MT","NAD":"$","NGN":"₦","NIO":"C$","NOK":"kr","NPR":"₨","NZD":"$","OMR":"﷼","PAB":"B/.","PEN":"S/.","PHP":"₱","PKR":"₨","PLN":"zł","PYG":"Gs","QAR":"﷼","RON":"lei","RSD":"Дин.","RUB":"руб","SAR":"﷼","SBD":"$","SCR":"₨","SEK":"kr","SGD":"$","SHP":"£","SOS":"S","SRD":"$","SVC":"$","SYP":"£","THB":"฿","TRY":"TL","TTD":"TT$","TWD":"NT$","UAH":"₴","USD":"$","UYU":"$U","UZS":"лв","VEF":"Bs","VND":"₫","YER":"﷼","ZAR":"R"},"currency_trailing_code_mappings":{"AUD":true,"CAD":true,"NZD":true,"USD":true},"currency_formats":["money","shorter_money"]}; for (key in formatting_options) {window.formatters[key] = formatting_options[key]};}());
//]]>
</script>
<script>
  //<![CDATA[
    if (window.benchmark) {window.performance.mark("begin_base.js_tag");}
  //]]>
</script>
<script src="https://d297h9he240fqh.cloudfront.net/assets/packages/base-2e46a20b1844e30a5725cb30a28b84a1.js"></script>
<script>
  //<![CDATA[
    if (window.benchmark) {window.performance.mark("end_base.js_tag");}
  //]]>
</script>
<script>
  //<![CDATA[
    document.domain='kickstarter.com';
  //]]>
</script>

<iframe height="0" id="api_xdreceiver" src="https://api.kickstarter.com/xdreceiver/baf2.html" style="display: none;" width="0"></iframe>



<div id="fb-root"></div>
<script>
  //<![CDATA[
    var channelUrl = window.location.protocol + "//" + window.location.host + "/channel.html",
      skip_autologin = $('body').is('.skip_autologin');
    
    window.fbAsyncInit = function() {
      FB.init({
        appId: window.fb_app_id,
        channelUrl: channelUrl,
        status: true,    // check login status
        cookie: true,    // enable cookies to allow the server to access the session
        xfbml: true,     // parse XFBML
        logging: false   // turn off logging
      });
    
      FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
          if (read_cookie("logout_from_fb")) {
            FB.logout();
            destroy_cookie("logout_from_fb");
          } else if (!skip_autologin) {
            $.get("/fb/autologin", {'fbsr': response.authResponse.signedRequest});
          } else if (false && 0 == response.authResponse.userID) {
            $.get("/fb/refresh", {'fbsr': response.authResponse.signedRequest});
          }
        } else {
          if (read_cookie("logout_from_fb")) {
            destroy_cookie("logout_from_fb");
          }
        }
      })
    
      $(document).trigger('fb:loaded');
    };
    
    
    // Load the SDK Asynchronously
    (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
  //]]>
</script>


</body>
</html>

<!-- ¯\_(ツ)_/¯: vxldnhnrfaeeyachjlyowgluuotgxlgtxrzngemnfixjrxmaqwwppopbinvv -->