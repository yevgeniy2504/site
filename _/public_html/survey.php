<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" style="height: 100%; width: 100%;">
<head>
<title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #fff;
        }
        #tl-anketa-form {
            width: 100%; 
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="tl-anketa-form"></div>
    <script type="text/javascript">
        (function(w){
          var q=[
            ['setContext', 'TL-INT-uyut-almati', 'ru'],
            ['embed', 'survey-form', {container: 'tl-anketa-form'}]
          ];
            var h=["kz-ibe.tlintegration-as.com","ibe.tlintegration-as.com","ibe.tlintegrationfb-as.com"];
            var t = w.travelline = (w.travelline || {}),
                ti = t.integration = (t.integration || {});
            ti.__cq = ti.__cq? ti.__cq.concat(q) : q;
            if (!ti.__loader) {
                ti.__loader = true;
                var d=w.document,c=d.getElementsByTagName("head")[0]||d.getElementsByTagName("body")[0];
                function e(s,f) {return function() {w.TL||(c.removeChild(s),f())}}
                (function l(h) {
                    if (0===h.length) return; var s=d.createElement("script");
                    s.type="text/javascript";s.async=!0;s.src="https://"+h[0]+"/integration/loader.js";
                    s.onerror=s.onload=e(s,function(){l(h.slice(1,h.length))});c.appendChild(s)
                })(h);
            }
        })(window);
    </script>
</body>
</html>
