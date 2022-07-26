<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>Online Mart在线市场</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.staticfile.org/twitter-bootstrap/5.1.1/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
  body {
text-align: center;
overflow-y: scroll;
width: 70%;
margin: 0 auto;background-color: #efefef;}
a:link, a:visited {text-decoration:none;color: black;}
#content {height: 50%;width:70%;background-color: rgb(2,226,226);}
#footer {
position: absolute; bottom: 0px; display: block; width: 70%;text-align: center}
li {
display: inline;
padding: 0.5em;}
#headbar {float:right;display: inline;}
#nav, #footer {
text-align: center;
}
#header {float:center;text-align: center;}
#search {height:5%;text-align: center;float:right;}
#logo {text-align: left;}
  </style>
    </head>
    <body>
    <div id=headbar>
 <ul>
 <li><a href="">注册</a></li>
 <li><a href="">登录</a></li>
 </ul>
</div>

<div id="header">
<div>
</div>
<div id="logo">
 <h1>澳洲商品在线</h1>
</div>
<div> 
</div>
</div>


 
 <div id="nav">
 <ul>
 <li><a href="">主页</a></li>
 <li><a href="">产品</a></li>
 <li><a href="">服务</a></li>
 <li><a href="">关于我们</a></li>
 <li><a href="">联系我们</a></li>
 <li></li>
 </ul>
 </div>
 
<hr style="height:1px;border:none;border-top:1px dashed #0066CC;" /> 
 
<div id="search">
<form id="form" action="{% url 'search_results' %}" method="GET">
     <input type="text" name="q" placeholder="搜索商品..." />
     <input type="submit" value=" 搜索 "/>
     </form>
</div>

<div id="content">
 
</div>

<div id="footer">
 <p>&copy; Copyright 2022</p>
</div>
    </body>
</html>
