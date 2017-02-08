<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>萌昕的小图书馆</title>
    <style>
        div{
            height: 300px;
            width: 500px;
            border: 1px solid pink;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -150px auto auto -250px;
            font-size: 25px;
        }
        form{
            text-align: center;
            margin: 100px auto;
        }
    </style>
</head>
<body>
<div>
    <form action="isLogin" method="post">
        你的亲爱的男朋友的名字是：<br/>
        <input type="text" name="boyfriend">
        <input type="submit" value="么么哒">
    </form>
</div>
</body>
</html>