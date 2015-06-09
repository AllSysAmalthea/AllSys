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
