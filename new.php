<!DOCTYPE html>
<html>
<head>
  <!--<meta name="viewport" content="width=device-width" />-->
  <script type="text/javascript"> // check for local copies of jquery, otherwise use the CDN hosted version. Make the form draggable and resizeable.
  /* Minimized version of https://raw.githubusercontent.com/kvz/phpjs/master/experimental/filesystem/file_exists.js */function file_exists(a){var b=this.window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();if(!b){throw new Error("XMLHttpRequest not supported")}b.open("HEAD",a,false);b.send(null);if(b.status==200){return true}return false};
  var local_sources = Array("/jquery.min.js","/jquery-ui-1.10.3/themes/base/jquery-ui.css","/jquery-ui-1.10.3/ui/minified/jquery-ui.min.js","jqtp.js"),
  cdn_sources = Array("http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css","http://code.jquery.com/jquery.min.js","http://code.jquery.com/ui/1.10.3/jquery-ui.min.js","https://raw.github.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"),
  use=cdn_sources;
  if(use_local()) use=local_sources;
  load(use);
  function use_local()
  {
    var a=1;
    local_sources.forEach(function (source) {if(a){ // don't do more requests if one url is missing.
      if(!file_exists(source)){ a=0; };
      }});
      return a;
  }
  function ext(filename)
  {
    var a=filename.split("."),b=a.length,c=b-1,d=a[c]; // gets the last thing after the last .
    return d;
  }
  function load(sources)
  {
    sources.forEach(function (source) {
      if(ext(source) == "css")
        {
          var link=document.createElement("link");
          link.href=source;
          link.rel="stylesheet";
          head=document.getElementsByTagName("head")[0];
          head.appendChild(link);
        }
        else if(ext(source) == "js") // I could even download and eval() it but then it wouldn't work with CDN
        {
          var script=document.createElement("script");
          script.src=source;
          script.type="text/javascript";
          head=document.getElementsByTagName("head")[0];
          head.appendChild(script);
        }
        else
        {
          throw new Error("Unknow extension: "+ext(source)); // lels never tried this line
        }
    });
  }
  window.onload=function () // fuck jQuery but it's so simple...
  {
    $("form").resizable({ handles: 'e' });
    $("form").draggable();
  };
  </script>
  <style>
  .input
  {
    border: 1px solid silver;
    margin-top:4px;
    margin-bottom:4px;
    width:100%;
    min-height: 20px;
    position:relative;
    -webkit-appearance: caret;
    -moz-appearance: caret;
    border-radius: 5px;
  }
  form
  {
    border:1px solid silver;
    min-width:300px;
    max-width:100%;
    width:35%;
    padding:2%;
  }
  .button
  {
    background:#ECECEC;
  }
  .horcent
  {
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
  }
  </style>
</head>
<body>
  <form action="" method="post">
    <input type="email" required class="input horcent" placeholder="email" /><br />
    <input type="text" required class="input horcent" placeholder="nick" /><br />
    <textarea required class="input horcent" placeholder="The news"></textarea><br />
    <input class="input horcent button" type="submit" value="Submit" />
  </form>
</body>
</html>
