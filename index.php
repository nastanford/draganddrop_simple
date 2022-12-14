<!DOCTYPE HTML>
<html>
<head>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
</script>
</head>
<style type="text/css">
#div1, #div2, #div3, #div4
{ width:200px; height:200px; margin:10px;padding:10px;border:1px solid #aaaaaa;}

#drag2 {
  background-color: #aaaaaa;
  width:100px; height:100px; margin:10px;padding:10px;border:1px solid;
}

</style>
<body>
<?php include 'navbar.php'; ?>

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
  <img id="drag1" src="logo.jpg" draggable="true" ondragstart="drag(event)">
</div>

<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
  <div id="drag2" draggable="true" ondragstart="drag(event)">
    Testing
  </div>

</div>

<div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)">

</div>

<div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)">

</div>






</body>
</html