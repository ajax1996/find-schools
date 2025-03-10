<!DOCTYPE html>
<html>
<head>
  <title>Administration</title>
  <style>
  .div1{
  position :fixed;
  margin-left: -0.5%;
  width:15%;
  padding-left: 7px;
  background: rgb(249,249,249);
  height:100%;
  overflow: scroll;
  margin-top: 3.6%;
  border: 1px solid black;
}
::-webkit-scrollbar { 
    display: none; 
}


.div2{
  margin-top: -0.5%;
  margin-left:-0.5%;
  position: fixed;
  width:100%;
  background: #2d2d2d;
  height:8%;
  border: 1px solid black;
}
.div3{
    position: fixed;
    margin-top:3.6%;
    height:92%;
    width:85%;
    margin-left: 15%;
    overflow-y: auto;
    border: 1px solid black;
}
.div4{
    position: fixed;
    margin-top:3.6%;
    height:92%;
    width:40%;
    margin-left: 59%;
    overflow-y: auto;
    border: 1px solid black;
}
</style>
</head>
<body>
<div class="div1">
  <br><br><br>
  <a href="./../school_form.php" target="frame3">INSERT</a><br><br>
  <a href="update.html" target="frame3">UPDATE</a><br><br>
  <a href="delete.html" target="frame3">DELETE</a><br><br>
  <a href="view.html" target="frame4">VIEW DATA</a><br><br>
  <a href="record.html" target="frame4">RECORDS</a><br><br>
  
</div>

<div class="div2"><p style="margin-left: 1%; color:white; font-style:Arial, Helvetica,sans-serif; font-stretch:expanded; font-size:120%;">ADMINISTRATOR</p></div>

<div class="div3">
  <iframe  name="frame3" height="100%" width="51.5%"></iframe>
  </div>

<div class="div4">
  <iframe  name="frame4" height="100%" width="99.5%"></iframe>
</div>
</body>
</html>