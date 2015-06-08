<!DOCTYPE html>
<html5>
<?php
	$game="2014年人工智能课程项目-黑白棋";
	require("dbconnect.php");
	$CID =1;
?>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style id="system" type="text/css">
	#ranklist{
		width:270px;
		table-layout:fixed;
	}
	#pic{
		margin-left:20px;
	}
	#managediv,#rankdiv{
		margin-left:20px;
	}
	.first{width:10%;}
	.second{width:75%;}
	.third{width:15%;}
	.size80{
		width:80%;
	}
	.text-center{
		text-align:center;
	}
	.inform{
		margin-bottom:20px;
	}
	.managebtn{
		text-align:center;
	}
	p {	margin:1em 0;	line-height:1.5em;}
	table {	font-size:inherit;	font:100%;	margin:1em;}
	table th{border-bottom:1px solid #bbb;padding:.2em 0 .2em 0;}
	table td{border-bottom:1px solid #ddd;padding:.2em 0 .2em 0;}
	input[type=text],input[type=password],input[type=image],textarea{font:99% helvetica,arial,freesans,sans-serif;}
	select,option{padding:0 .25em;}optgroup{margin-top:.5em;}
	pre,code{font:12px Monaco,"Courier New","DejaVu Sans Mono","Bitstream Vera Sans Mono",monospace;}
	pre {	margin:1em 0;	font-size:12px;	background-color:#eee;	border:1px solid #ddd;	padding:5px;	
	line-height:1.5em;	color:#444;	overflow:auto;	-webkit-box-shadow:rgba(0,0,0,0.07) 0 1px 2px inset;	
	-webkit-border-radius:3px;	-moz-border-radius:3px;border-radius:3px;}
	pre code {	padding:0;	font-size:12px;	background-color:#eee;	border:none;}
	code {	font-size:12px;	background-color:#f8f8ff;	color:#444;	padding:0 .2em;	
	border:1px solid #dedede;}
	img{border:0;max-width:100%;}abbr{border-bottom:none;}
	a{color:#4183c4;text-decoration:none;}a:hover{text-decoration:underline;}
	a code,a:link code,a:visited code{color:#4183c4;}h2,h3{margin:1em 0;}
	h1,h2,h3,h4,h5,h6{border:0;}h1{font-size:170%;border-top:4px solid #aaa;padding-top:.5em;margin-top:1.5em;}
	h1:first-child{margin-top:0;padding-top:.25em;border-top:none;}
	h2{font-size:150%;margin-top:1.5em;border-top:4px solid #e0e0e0;padding-top:.5em;}h3{margin-top:1em;}
	hr{border:1px solid #ddd;}ol{margin:1em 0 1em 2em;}.span7 ul li ,.span7 ol li{margin-top:.5em;margin-bottom:.5em;}
	blockquote{margin:1em 0;border-left:5px solid #ddd;padding-left:.6em;color:#555;}
	dt{font-weight:bold;margin-left:1em;}
	
	</style><style id="custom" type="text/css"></style>
	<title><?php echo $game; ?></title>
	<!--<link rel="stylesheet" href="http://yandex.st/highlightjs/8.0/styles/default.min.css">
<script src="http://yandex.st/highlightjs/8.0/highlight.min.js"></script>
<link rel="stylesheet" href="styles/default.css">
<script src="highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>!-->
<link href="code.css" rel="stylesheet" />
<script src="code.js"></script>

	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">

    <style>
        table{
			text-align:center;
			width:100%;
		}
		
    </style>
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
   	
	<div id="fbody">
		<div class="container">
			<br><br><br>
			
			<div class="span8">
				<h1><?php echo $game; ?></h1><br>
			<div class="thumbnail span8 alert alert-success">
					<ul>
						<li><p>Inform:</p></li>
						<ul>
						<li>平台处于测试阶段，如果发现平台的bug，请通知我们，我们会尽快完善。kwc.oliver#gmail.com , dc.swind#gmail.com。2014.4.6</li>
						</ul>
					</ul>
			</div>
			<h2>游戏介绍</h2>
<ul>
<li><p>规则</p>
<ul>
<li>棋盘:8*8</li>
<li><p>初始局面</p>
<p><img src="static/image/init.png" alt="init"></p>
</li>
<li>双方执黑白子轮流落子,黑子先行</li>
<li>关于落子点<ul>
<li>空格</li>
<li>在八个方向(↖↑↗→↘↓↙←) 中至少有一个方向上,有一枚同色棋子,且这两枚棋子间有且仅有异色旗子(也不能有空格).</li>
<li>落子后,上述所夹的异色棋子翻转为同色.</li>
<li>如果无处可下则跳过此轮.</li>
</ul>
</li>
<li>胜负判定<ul>
<li>双方都不能行动时游戏终止.(棋盘不一定会放满)</li>
<li>在棋盘上子数多者获胜.</li>
</ul>
</li>
</ul>
</li>
<li>由于othello在后期可能变化很大,注重棋子的位置布局或许比当前分数更重要.</li>
<li>更多介绍<a href="http://baike.baidu.com/link?url=64Lg_-Ll3969rvFqSguTpGnMooNBXIvAtMOeqNKZ6BUKaRdqeo093lQpo1-fgzbD">baike</a>        <h2>平台接口</h2>
</li>
<li>你需要使用C++编写一个othello_ai类,并且包括一些函数.具体定义如下<pre><code class="lang-c">class othello_ai{
  public:
      void init(int color, string s);
      //初始化阶段,告知你所执子的颜色,和当前棋盘落子情况s

      void move(int color, int x, int y);
      //告知所有下子情况(包括你自己的落子情况)

      pair&lt;int, int&gt; get();
      //返回一个你的落子决定
};</code></pre>
</li>
<li>下面对一些细节作一点解释<ul>
<li>(x,y)的范围是从(0,0)到(15,15).表示第x行第y列.</li>
<li>s是一个长256位取值为0,1或2的string,s[i]表示第i/16行i%16列的落子情况.0表示是空格,1和2表示有相应颜色的棋子.</li>
<li>由于你的AI程序可能会崩溃,此时系统会重新启动你的程序,并再次调用init函数,希望你能继续完成比赛.所以参数s是必要的且不一定是初始局面.</li>
<li>get函数返回pair<int,int>,第一个元素(first)为行数x,第二个元素(second)为列数y.</int,int></li>
</ul>
</li>
<li><code>注意:</code>如果你对pair,string,vector等C++ STL不了解,可以<a href="https://www.google.com.hk/search?q=c%2B%2B+stl&amp;oq=c%2B%2B+stl&amp;aqs=chrome..69i57j69i61.358j0j4&amp;sourceid=chrome&amp;espv=210&amp;es_sm=122&amp;ie=UTF-8">google</a>一下,了解下基本的使用方法即可.</li>
</ul>
<h2>Othello SDK</h2>
<ul>
<li>使用以上代码规范已可以完成一个AI,但为了大家可以更加方便地开发,我们提供了Othello SDK来辅助大家开发AI.</li>
<li>SDK可以帮你保存,处理当前局面,你可以使用它获取你当前所有可下子的位置等,<code>你完全可以不使用SDK</code>.</li>
<li>SDK可以在<a href="./static/othello/othello16.h">这里</a>下载,你可以使用#include "othello16.h"来导入它.</li>
<li>SDK定义了一个 othello16类,这个类提供了以下函数<pre><code class="lang-c">  void init(int color, string s);
  //初始化局面
  bool canmove(int color, int x, int y);
  //返回color是否能落子在(x,y)
  bool is(int color, int x, int y);
  //判断(x,y)是否有颜色为color的子.color=0则为询问该格是否为空
  bool canmove(int color);
  //判断当前执color色的玩家是否有落子点
  int count(int color);
  //检查当前棋盘有多少color颜色的点.color=0则为询问有多少空格
  vector&lt;pair&lt;int, int&gt; &gt; allmove(int color);
  //返回能color颜色的落子点的列表.
  bool play(int color, int &amp;x, int &amp;y);
  //修改局面,在(x,y)放下color颜色的棋子.color不能为0
  string tostring();
  //返回当前局面的string表示</code></pre>
</li>
<li>有了SDK就能轻易地写出Hello World了.以下为一个可以提交的<code>完整AI代码</code>.在此基础上相信你能专注于AI算法的实现.<pre><code class="lang-c">#include "othello16.h"
class othello_ai{
  othello16 o;//实例化othello类
  public:
  void init(int color, string s);
  void move(int color, int x, int y);
  pair&lt;int, int&gt; get();
};
void othello_ai::init(int color, string s){
  o.init(color, s);//让sdk初始化局面
}
void othello_ai::move(int color, int x, int y){
  o.play(color, x, y);//告诉sdk落子情况,改变局面
}
pair&lt;int, int&gt; othello_ai::get(){
  vector&lt;pair&lt;int, int&gt; &gt; ans = o.allmove(o.mycolor);//获得所有可落子的位置,按先行后列的顺序
  return ans[0];//返回落子位置为第一个可下的点
}</code></pre>
</li>
<li><code>注意:</code> 由于你只需要提交othello_ai类,平台会使用默认的SDK进行编译,所以请勿修改othello16.h/cpp的内容.</li>
</ul>
<h2>对战计分</h2>
<ul>
<li>赢一局得2分,平局各1分,负一局没有得分</li>
</ul>
<h2>FQA</h2>
<ul>
<li>平台相关问题请邮件联系metisai#126.com,人工智能课程内容相关问题请邮件询问黎铭老师或者助教 <a href="http://cs.nju.edu.cn/lim/courses/AI/AI.htm">课程网站</a></li>
</ul>
			</div>
			<!--
			<div class="span4">
				<img src='./static/image/othello.jpg' height='300'/>
			</div>
			-->
            <ul class="thumbnails span4">	
                <li class="text-center">
					<div id="pic"><img class="size80" src='./static/image/othello.jpg' /></div>
                    <div id='rankdiv'class="thumbnail span4">
                        <p>Rank:</p>
                        <table id="ranklist">
                            <thead>
                            <tr><th class='first'>NO.</th><th class='second'>AI@Player(ver)</th><th class='third'>Score</th></tr>
                            </thead>
                            <tbody id="top10">
								<?php
									$username = $session_ans;
									$userid="";						
									if ($username != "NO"){
										$result = mysql_query("select * from taccount where username = '$username'");
										$row = mysql_fetch_array($result);
										$userid = $row[0];
									}
									
									$result = mysql_query("select * from tprog where CID = '$CID' and valid='1' order by score desc");
									$i =0 ; $write=""; 
									while($row = mysql_fetch_array($result)){
										$i++; 
										$rs = mysql_query("select * from taccount where UID = '$row[3]'");
										$r = mysql_fetch_array($rs);
										if ($i <= 10){
											if ($userid == $row[3]) $write.="<tr><td style='color:red'"; else $write.="<tr><td";
											//$write.=">".$i."</td><td><a href='user.php?UID=".$row[3]."'>".$r[1]."</a></td><td><a href='ai.php?PID=".$row[0]."'>".$row[7]."<sup>".$row[2]."</sup></a></td><td>".$row[6]."</td></tr>";  
											$write.=">".$i."</td><td><a href='ai.php?PID=".$row[0]."'>".htmlspecialchars($row[7])."@".htmlspecialchars($r[1])."(".$row[2].")</a></td><td>".$row[6]."</td></tr>";  
										}else if ($userid == $row[3]){
											$write.="<tr><td style='color:yellow'>".$i."</td><td><a href='ai.php?PID=".$row[0]."'>".htmlspecialchars($row[7])."@".htmlspecialchars($r[1])."(".$row[2].")</a></td><td>".$row[6]."</td></tr>";  
										}
									}
									
									echo $write;
													
								?>
                            </tbody>
                        </table>
                        <p><a href="rank.php?CID=<?php echo $CID; ?>">Get more >></a></p>
                    </div>
                </li>
				<li>
	
				<?php
					if ($userid !=""){
						//echo "<a href='user.php?CID=".$CID."&UID=".$userid."'><button class='btn'>管理我的AI</button></a>";	
						echo "<div id='managediv' class='managebtn span4 thumbnail pullr'><a href='user.php?CID=".$CID."&UID=".$userid."' class='btn'>管理我的AI</a></div>";
					}
				?>
				</li>
            </ul>

		</div>
	</div>
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
	
</body>

</html5>
