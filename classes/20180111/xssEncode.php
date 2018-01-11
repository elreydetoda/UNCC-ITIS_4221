<?php
function bodyEncode($input) {
  $return = '';
  for ($i = 0; $i < strlen($input); $i++) {
    $ch = substr($input,$i,1);
    switch($ch) {
    case '<':
      $return .= '&lt;';
      break;
    case '>':
      $return .= '&gt;';
      break;
	case '"':
      $return .= '&quot;';
      break;
	case '&':
      $return .= '&amp;';
      break;
	  
    default:
      $return .= $ch;
    }
  }
  return $return;
}
function attrEncode($input) {
  $return = '';
  for ($i = 0; $i < strlen($input); $i++) {
    $ch = substr($input,$i,1);
    switch($ch) {
    case '"':
      $return .= '&quot;';
      break;
    case '\'':
      $return .= '&#039;';
      break;
	case '&':
	  $return = '&amp;';	  
	case '<':
      $return .= '&lt;';
      break;
	  
    default:
      $return .= $ch;
    }
  }
  return $return;
}
function JSEncode($input) {
  $return = '';
  for ($i = 0; $i < strlen($input); $i++) {
    $ch = substr($input,$i,1);
    switch($ch) {
    case '"':
      $return .= '\"';
      break;
    case '\'':
      $return .= '\\\'';
      break;
	case '\\':
      $return .= '\\\\';
      break;
    default:
      $return .= $ch;
    }
  }
  return $return;
}
?>
<html>
<head>
<title>XSS Demos</title>
</head>
<body>
<h2>By body</h2>
<form method="GET">
Enter your name: <input type="text" name="name" size="20"><input type="submit">
<?php
$input='1';
if ($_REQUEST['name']) {
	$input= $_REQUEST['name'];
  ?><br />Hello <?php echo $_REQUEST['name'] ?><br /><?php

}
?>
</form>
<?php  
  echo 'Body Encode='.htmlspecialchars(bodyEncode($input)).'<br>';
  echo 'Attr Encode='.htmlspecialchars(attrEncode($input)).'<br>';
  echo 'JS Encode='.htmlspecialchars(JSEncode($input),ENT_QUOTES,false).'<br>';
?>  
<hr />
<h2>Into Tag Attribute</h2>
<form method="POST">
Enter your name: <input type="text" name="name1" size="20" value="<?php echo $_REQUEST['name1'] ?>">
<input type="submit"><br />
</form>
<hr />

<h2>Into Tag Attribute with single quote</h2>
<form method="POST">
<?php $input2=$_REQUEST['name2']; ?>
Enter your name: <input type="text" name="name2" size="20" value='<?php echo ($input2) ?>' >
<input type="submit"><br />

</form>
<hr />

<h2>Into Textarea</h2>
<form method="POST">
Enter some text: <textarea name="ta1" cols="60" rows="4"><?php echo($_REQUEST['ta1']) ?></textarea><br />
<input type="submit">
</form>
<hr />
<h2>In Javascript</h2>
<form method="POST">
Enter your name: <input type="text" name="name3"><input type="submit" /><br />
</form>
<?php
if ($_REQUEST['name3']) {
?><script language="javascript">

var name3="<?php echo ($_REQUEST['name3']) ?>";
document.write('<h3>' + name3 + '</h3>');

</script>
<?php } ?>
<hr />

<h2>In Javascript 1</h2>
<form method="POST">
Enter your name: <input type="text" name="name4"><input type="submit" /><br />
</form>
<?php
$input4=$_REQUEST['name4'];
if ($_REQUEST['name4']) {
?><script language="javascript">

var name4='<?php echo ($input4) ?>';
document.write('<h3>' + name4 + '</h3>');

</script>
<?php } ?>
<hr />