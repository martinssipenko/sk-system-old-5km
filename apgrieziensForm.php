<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>
<title></title>
</head>

<? //include_once("data.inc.php"); ?>
<body> 
<p>
<form action="apgrieziensInsertData.php" method="post" enctype="application/x-www-form-urlencoded" name="komentetajs">
<table width="695" border="0">
 <tr>
  <td width="80" height="35">Numurs:</td>
  <td width="600">
   <input name="numurs" type="number" class="input" size="3" maxlength="3" tabindex="1" style="<? if(isset($error['style'])) { echo $error['style']; } ?>" value="<? if(isset($error['numurs'])) { echo $error['numurs']; } ?>" /> <? if(isset($error['msg'])) { echo $error['msg']; } ?>
   <input style="margin:0px" type="image" align="middle" src="images/submit_invisible.gif" /> 
   </td>
 </tr>
</table>
</form>
</body>
</html>