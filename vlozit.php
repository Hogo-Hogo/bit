<!DOCTYPE html>
<html>
<head>
    <title>Zkrátit URL – Bit wz</title>
    <link rel="stylesheet" type="text/css" href="//hogovadomena.unas.cz/jazyk.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="/ikonka.ico" type="image/x-icon">
    <style>
        .x {width: 50%;}
        @media only screen and (max-width: 1000px){
            .x {width: 100%;}
        }
        input[type*="url"]:valid {color: green;}
        input[type*="url"]:invalid {color: grey;}
    </style>
</head>
    <center class="center" style="font-family: arial; vertical-align: middle;">
    <style>
    .menu {
    background-color: #555;
    border-radius: 2em;
    color: white;
}

.menu a {
  color: white;
  text-align: center;
  text-decoration: none;
  font-size: 25px;
}

.menu a:hover {
  background-color: white;
  color: black;
  border-radius: 0.8em;
} </style>
<div class="menu">by <a href="//hogo.xf.cz">Hogo</a></div>
  <h2>Zkracovač URL adres</h2>
  <p>Z vámi vybraného aliasu bude odebrána diakritika a speciální znaky budou nahrazeny mezerami. Je nutné zadat celou adresu (s http(s)://), jinak to nepřesměruje. Celá adresa se zbarví do zelena. ;-)</p>
  <form method="post" action="#"> 
    URL ke zkrácení: <input type="url" placeholder="https://www.example.com" name="cil" class="textarea x" required oninput="coKdyby(this)" onpaste="zjistit(this)"><br> 
 <script>
 function coKdyby(pole) {
    var url = pole.value;
    if (url.match(/\.(cz|com|net|info|org|biz|sk|eu)\/?$/)) {
        zjistit(pole);
    }
}

function http(url) {
    if (url.match(/https?:\/\//)) {
        return url;
    }
    else {
        return "http://" + url;
    }
}

function domain(url) {
    var adresa = url;
    var odkaz = document.createElement("a");
    odkaz.href = adresa;    
    return odkaz.protocol + "//" + odkaz.hostname;
}

function zjistit(pole) {
    var host = domain(http(pole.value));
    pole.previousSibling.style.backgroundImage = "url(" + host + "/favicon.ico)";  
}
</script>  http://bit.wz.cz/<input type="text" name="alias" required value="<?php 
include_once 'config.php';
$sql = "SELECT * FROM abc ORDER BY RAND() LIMIT 4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {  echo $row['l']; }}?>" class="textarea x"><br> 

<button type="submit" class="prehled">Zkrátit!</button> </form>
<?php  
if(!empty($_POST['alias'])) {
require_once ("config.php");     
$alias = $_POST['alias']; 
$cil = $_POST['cil']; 
$co = array('š', 'ť', 'á', 'č', 'ř', 'í', 'é', 'ě', 'ž', 'ů', 'ú');
$cim = array('s', 't', 'a', 'c', 'r', 'i', 'e', 'e', 'z', 'u', 'u');
$alias = str_replace(' ', '-', $alias);
$alias = str_replace('.', '-', $alias);
$alias = str_replace('://', '-', $alias);
$alias = str_replace($co, $cim, $alias);
$alias = htmlspecialchars($alias); 
$cil = htmlspecialchars($cil); 
$sql = "INSERT INTO url (alias, cil) VALUES ('$alias', '$cil')";
if(mysqli_query($conn, $sql)) {
   ?>Odkaz je dostupný na adrese http://bit.wz.cz/<?php echo $alias; ?>
<br><br><input type="text" class="textarea zkopirovat x" style="font-size: 14px; background: #222; color: white; border-radius: 2em; text-align: center" value="http://bit.wz.cz/<?php echo $alias;?>" readonly onclick="this.select(1);">
<script>
function zkopirovat(el) {  
  var range = document.createRange();  
  range.selectNode(el);  
  window.getSelection().addRange(range);  
    
  try {  
    var zkopirovano = document.execCommand('copy'); 
        if (zkopirovano) document.getElementById('copylink').innerHTML = 'Zkopírováno :)';
    else alert('Nepodařilo se zkopírovat, omlouváme se.');
  } catch(err) {  
    alert('Váš prohlížeč nedokáže kopírovat.');
  }  
    
  window.getSelection().removeAllRanges();  
}
</script>
<button class="prehled" onclick="zkopirovat(document.querySelector('.zkopirovat'))" id="copylink">Zkopírovat do schránky</button><?php }
}
else {
    
}
?>
</a>
</center>
</html>
