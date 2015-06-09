<!DOCTYPE html>
<?php
////////////////////////////// head
	$view_title= "Amalthea赈灾管理系统";
?>

<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title ?></title>
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">
    <link rel="stylesheet" href="./static/bootstrap/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="./static/bootstrap/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="./static/bootstrap/style.css" type="text/css" media="all">
    <script type="text/javascript" src="./static/js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="./static/js/jquery.anythingslider.js"></script>
    <script type="text/javascript" src="./static/js/jquery.easing.1.2.js"></script>
    <script type="text/javascript">
        
        function formatText(index, panel) {
            return index + "";
            }
        
                $(function () {
                
                    $('.anythingSlider').anythingSlider({
                        easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
                        autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                        delay: 3000,                    // How long between slide transitions in AutoPlay mode
                        startStopped: false,            // If autoPlay is on, this can force it to start stopped
                        animationTime: 600,             // How long the slide transition takes
                        hashTags: true,                 // Should links change the hashtag in the URL?
                        buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
                        pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
                       // startText: "Play",             // Start text
                   	 //   stopText: "Stop"               // Stop text
                    });
                });
				
				function JoinDemo() 
　　　　{ 
　　　　　var a, b; 
　　　　　a = new Array(0,1,2,3,4); 
　　　　　b = a.join("-");//分隔符 
　　　　　return(b);//返回的b=="0-1-2-3-4" 
　　　　}  

	function LengthDemo() 
　　　　{ 
　　　　　var a, l; 
　　　　　a = new Array(0,1,2,3,4); 
　　　　　l = a.length; 
　　　　　return(l);//l==5 
　　　　} 

function ReverseDemo() 
　　　{ 
　　　　var a, l; 
　　　　a = new Array(0,1,2,3,4); 
　　　　l = a.reverse(); 
　　　　return(l); 
　　　} 

function SortDemo() 
　　　　{ 
　　　　　var a, l; 
　　　　　a = new Array("X" ,"y" ,"d", "Z", "v","m","r"); 
　　　　　l = a.sort(); 
　　　　　return(l); 
　　　　} 

function DateDemo() 
　　　{ 
　　　　var d, s = "Today's date is: "; 
　　　　d = new Date(); 
　　　　s += (d.getMonth() + 1) + "/"; 
　　　　s += d.getDate() + "/"; 
　　　　s += d.getYear(); 
　　　　return(s); 
　　　} 

function DateDemo() 
　　　{ 
　　　　var d, day, x, s = "Today is: "; 
　　　　var x = new Array("Sunday", "Monday", "Tuesday"); 
　　　　var x = x.concat("Wednesday","Thursday", "Friday"); 
　　　　var x = x.concat("Saturday"); 
　　　　d = new Date(); 
　　　　day = d.getDay(); 
　　　　return(s += x[day]); 
　　　} 

function TimeDemo() 
　　　{ 
　　　　var d, s = "The current local time is: "; 
　　　　var c = ":"; 
　　　　d = new Date(); 
　　　　s += d.getHours() + c; 
　　　　s += d.getMinutes() + c; 
　　　　s += d.getSeconds() + c; 
　　　　s += d.getMilliseconds(); 
　　　　return(s); 
　　　} 

function GetTimeTest() 
　　　{ 
　　　　var d, s, t; 
　　　　var MinMilli = 1000 * 60; 
　　　　var HrMilli = MinMilli * 60; 
　　　　var DyMilli = HrMilli * 24; 
　　　　d = new Date(); 
　　　　t = d.getTime(); 
　　　　s = "It's been " 
　　　　
　　　　return(s); 
　　　} 

function TZDemo() 
　　　{ 
　　　　var d, tz, s = "The current local time is "; 
　　　　d = new Date(); 
　　　　tz = d.getTimezoneOffset(); 
　　　　if (tz < 0) 
　　　　s += tz / 60 + " hours before GMT"; 
　　　　else if (tz == 0) 
　　　　s += "GMT"; 
　　　　else 
　　　　s += tz / 60 + " hours after GMT"; 
　　　　return(s); 
　　　} 

function GetTimeTest(testdate) 
　　　{ 
　　　　var d, s, t; 
　　　　var MinMilli = 1000 * 60; 
　　　　var HrMilli = MinMilli * 60; 
　　　　var DyMilli = HrMilli * 24; 
　　　　d = new Date(); 
　　　　t = Date.parse(testdate); 
　　　　s = "There are " 
　　　　s += Math.round(Math.abs(t / DyMilli)) + " days " 
　　　　s += "between " + testdate + " and 1/1/70"; 
　　　　return(s); 
　　　} 

 function cutstr(str, len) {

        var temp,

            icount = 0,

            patrn = /[^\x00-\xff]/，

            strre = "";

        for (var i = 0; i < str.length; i++) {

            if (icount < len - 1) {

                temp = str.substr(i, 1);

                    if (patrn.exec(temp) == null) {

                       icount = icount + 1

                } else {

                    icount = icount + 2

                }

                strre += temp

                } else {

                break;

            }

        }

        return strre + "..."

    }

function ltrim(s)
{ 
return s.replace( /^(\s*|　*)/, ""); 
}

    function rtrim(s)
	{ 
	return s.replace( /(\s*|　*)$/, ""); 
	}
	
	
    function HtmlEncode(text) {

        return text.replace(/&/g, '&').replace(/\"/g, '"').replace(/</g, '<').replace(/>/g, '>')

    }
	
	 function isDigit(value) {

        var patrn = /^[0-9]*$/;

        if (patrn.exec(value) == null || value == "") {

            return false

        } else {

            return true

        }

    }
	
	function appendscript(src, text, reload, charset) {

        var id = hash(src + text);

        if(!reload && in_array(id, evalscripts)) return;

        if(reload && $(id)) {

            $(id).parentNode.removeChild($(id));

        }

     

        evalscripts.push(id);

        var scriptNode = document.createElement("script");

        scriptNode.type = "text/javascript";

        scriptNode.id = id;

        scriptNode.charset = charset ? charset : (BROWSER.firefox ? document.characterSet : document.charset);

        try {

            if(src) {

                scriptNode.src = src;

                scriptNode.onloadDone = false;

                scriptNode.onload = function () {

                    scriptNode.onloadDone = true;

                    JSLOADED[src] = 1;

                 };

                 scriptNode.onreadystatechange = function () {

                     if((scriptNode.readyState == 'loaded' || scriptNode.readyState == 'complete') && !scriptNode.onloadDone) {

                        scriptNode.onloadDone = true;

                        JSLOADED[src] = 1;

                    }

                 };

            } else if(text){

                scriptNode.text = text;

            }

            document.getElementsByTagName('head')[0].appendChild(scriptNode);

        } catch(e) {}

    }

function setCookie(name, value, Hours) {

        var d = new Date();

        var offset = 8;

        var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

        var nd = utc + (3600000 * offset);

        var exp = new Date(nd);

        exp.setTime(exp.getTime() + Hours * 60 * 60 * 1000);

        document.cookie = name + "=" + escape(value) + ";path=/;expires=" + exp.toGMTString() + ";domain=360doc.com;"

    }
	
	 function getCookie(name) {

        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));

        if (arr != null) return unescape(arr[2]);

        return null

    }
	
	 function AddFavorite(sURL, sTitle) {

        try {

            window.external.addFavorite(sURL, sTitle)

        } catch(e) {

            try {

                window.sidebar.addPanel(sTitle, sURL, "")

            } catch(e) {

                alert("加入收藏失败，请使用Ctrl+D进行添加")

            }

        }

    }
	
	function setHomepage() {

        if (document.all) {

            document.body.style.behavior = 'url(#default#homepage)';

            document.body.setHomePage('http://w3cboy.com')

        } else if (window.sidebar) {

            if (window.netscape) {

                try {

                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")

                } catch(e) {

                    alert("该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true")

                    }

            }

            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);

            prefs.setCharPref('browser.startup.homepage', 'http://w3cboy.com')

        }

    }
	
	 function LoadStyle(url) {

        try {

            document.createStyleSheet(url)

        } catch(e) {

            var cssLink = document.createElement('link');

            cssLink.rel = 'stylesheet';

            cssLink.type = 'text/css';

            cssLink.href = url;

            var head = document.getElementsByTagName('head')[0];

            head.appendChild(cssLink)

        }
		
		function $(id) {

        return !id ? null : document.getElementById(id);

    }

	function addEventSamp(obj,evt,fn){

        if(!oTarget){return;}

        if (obj.addEventListener) {

            obj.addEventListener(evt, fn, false);

        }else if(obj.attachEvent){

            obj.attachEvent('on'+evt,fn);

        }else{

            oTarget["on" + sEvtType] = fn;

        }

    }

function delEvt(obj,evt,fn){

        if(!obj){return;}

        if(obj.addEventListener){

            obj.addEventListener(evt,fn,false);

        }else if(oTarget.attachEvent){

            obj.attachEvent("on" + evt,fn);

        }else{

            obj["on" + evt] = fn;

        }

    }

function getUrlState(URL){

    var xmlhttp = new ActiveXObject("microsoft.xmlhttp");

    xmlhttp.Open("GET",URL, false); 

    try{ 

            xmlhttp.Send();

    }catch(e){

    }finally{

        var result = xmlhttp.responseText;

        if(result){

            if(xmlhttp.Status==200){

                return(true);

             }else{

                   return(false);

             }

         }else{

             return(false);

         }

    }

}

function compressCss (s) {//压缩代码

    s = s.replace(/\/\*(.|\n)*?\*\//g, ""); //删除注释

    s = s.replace(/\s*([\{\}\:\;\,])\s*/g, "$1");

    s = s.replace(/\,[\s\.\#\d]*\{/g, "{"); //容错处理

    s = s.replace(/;\s*;/g, ";"); //清除连续分号

    s = s.match(/^\s*(\S+(\s+\S+)*)\s*$/); //去掉首尾空白

    return (s == null) ? "" : s[1];

}

function isMobile(){

    if (typeof this._isMobile === 'boolean'){

        return this._isMobile;

    }

    var screenWidth = this.getScreenWidth();

    var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport ||rendererModel.runningExperiments.fixviewport;

    var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");

    if(!fixViewPortsExperiment){

        if(!this.isAppleMobileDevice()){

            screenWidth = screenWidth/window.devicePixelRatio;

        }

    }

    var isMobileScreenSize = screenWidth < 600;

    var isMobileUserAgent = false;

    this._isMobile = isMobileScreenSize && this.isTouchScreen();

    return this._isMobile;

}

function isAppleMobileDevice(){

    return (/iphone|ipod|ipad|Macintosh/i.test(navigator.userAgent.toLowerCase()));

}

function getInitZoom(){

    if(!this._initZoom){

        var screenWidth = Math.min(screen.height, screen.width);

        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){

            screenWidth = screenWidth/window.devicePixelRatio;

        }

            this._initZoom = screenWidth /document.body.offsetWidth;

        }

    return this._initZoom;

}
function getZoom(){

    var screenWidth = (Math.abs(window.orientation) === 90) ? Math.max(screen.height, screen.width) : Math.min(screen.height, screen.width);

    if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){

        screenWidth = screenWidth/window.devicePixelRatio;

    }

    var FixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;

    var FixViewPortsExperimentRunning = FixViewPortsExperiment && (FixViewPortsExperiment === "New" || FixViewPortsExperiment === "new");

    if(FixViewPortsExperimentRunning){

        return screenWidth / window.innerWidth;

    }else{

        return screenWidth / document.body.offsetWidth;

    }

}
function getScreenWidth(){

    var smallerSide = Math.min(screen.width, screen.height);

    var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;

    var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");

    if(fixViewPortsExperiment){

        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){

            smallerSide = smallerSide/window.devicePixelRatio;

        }

    }

    return smallerSide;

}


    </script>
	<style>
		.p_title{
			font-size:32px;
			font-weight:bold;
		}
		#header{
			height:40px;
		}
		#header-title{
			padding:80px 30px 0px 0px;
			font-size:40px;
		}
		p{
			font-family:"Microsoft YaHei";
		}
		.thumbnail{border-radius:0px;}
	</style>
    
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	
   	<div id="indexbody">
		<div id="header">
		</div>
		 <section id="main-banner">
            <div class="intro">
              <div class="inner"> <strong>加入我们</strong>　　　　 一起渡过难关</span> </div>
            </div>
            <div class="anythingSlider">
              <div class="wrapper">
                <ul>
                  <li><img src="./static/images/slide1.jpg" alt=""></li>
                  <li><img src="./static/images/slide2.jpg" alt=""></li>
                  <li><img src="./static/images/slide3.jpg" alt=""></li>
                  <li><img src="./static/images/slide4.jpg" alt=""></li>
                  <li><img src="./static/images/slide5.jpg" alt=""></li>
                </ul>
              </div>
            </div>
          </section>
		 
    	<div class="wrapper">
    <!-- content -->
    <section id="content">
    	<div class="container_12">
        <div class="wrapper">
        	<aside class="grid_4">
        		<div class="box">
            	<h2>需要的物资情况:</h2>
              <ul class="list1">
              	<li>衣物			 急缺</a></li>
                <li>食物			 急缺</a></li>
                <li>帐篷			 暂够</a></li>
                <li>水 			 急缺</a></li>
                <li>通讯器材		 急缺</a></li>
                <li>被子 		 暂够</a></li>
                <li>取暖材料      暂够</a></li>
                <li>A型血		 急缺</a></li>
                <li>药物			 急缺</a></li>
                <li>医疗器械		 急缺</a></li>
              </ul>
              <div class="extra-links">
              	<a href="#">具体情况</a> &nbsp;| &nbsp;<a href="#">我要捐赠</a>
                <!-的链接直接连到donate的页面吧！->
              </div>
            </div>
            <div class="box">
            	<h2>反馈建议</h2>
              <p>如果您有任何建议或意见<br />
              欢迎提出</p>
              <form action="" id="newsletter-form">
                <fieldset><input type="text"><br><input type="submit" value="ok"></fieldset>
              </form>
            </div>
          </aside>	
           <div class="grid_8">
            <div class="indent">
              <article>
                <div class="inside">
                	<h2>感动你我</h2>
                  <div class="wrapper">
                    <img src="./static/images/voluteer.jpg" alt="" class="img-indent">
                    <h4>她是廖智绵，竹汉旺人<br><br> </h4>
                    <p>她是一位舞蹈老师，512大地震让她失去了双腿。芦山地震发生后，她怀着一颗感恩的心，赶赴灾区当起了志愿者。她的举动备受关注。但今天她在微博中提到，希望媒体不要再给她打电话了，让她能安心做事。廖智，好样的！加油！</p>
         
                  </div>
                </div>
              </article>
              <article class="last">
              	<div class="wrapper">
                	<div class="grid_4 colborder alpha">
                  	<div class="inside">
                  	  <h2>最新新闻</h2>
                      <ul class="news">
                      	<li>
                        	<p class="date"><strong>6</strong>Jun</p>
                         “东方之星”沉船事件已确认396人遇难，46人下落不明。今日举行哀悼活动<br><br><br><br>
                        </li>
                        <li>
                        	<p class="date"><strong>2</strong>Jun</p>
                         赵雯副市长率工作组抵达事发现场，并与现场指挥部对接工作<br><br><br><br>
                        </li>
                        <li>
                        	<p class="date"><strong>5</strong>Jun</p>
                          东方之星出水<br><br><br><br>
                        </li>
                      </ul>
                      <a href="#" class="button">Read More</a>
                      <!--这里的read more到底留不留呢？-->
                  	</div>
                  </div>
                	<div class="grid_4 omega">
                  	<div class="inside">
                  	  <h2>关于我们</h2>
                      <p><img src="./static/images/we1.jpg" alt=""></p>
                      <p class="p3">只要人人都献出一点爱，世界将变成美好的人间
                      <br>请关注我们，和我们一起做出努力<br><br><br><br><br><br></p>
                      <a href="#" class="button">Read More</a>
                      <!--这里直接链接到about Amalthea？-->
                  	</div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>	
	</div>
    <div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>

</body>
</html5>
