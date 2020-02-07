<?php
include('session_admin.php');
?>
  <html>
    <head>
        <title>Visualizzazione moduli</title>
        <style type="text/css">
            /* LIST #8 */
            #list8 {  }
            #list8 ul { list-style:none; }
            #list8 ul li { font-family:Georgia,serif,Times; font-size:18px; }
            #list8 ul li a { display:block; width:300px; height:28px; background-color:#333; border-left:5px solid #222; border-right:5px solid #222; padding-left:10px;
            text-decoration:none; color:#bfe1f1; }
            #list8 ul li a:hover {  -moz-transform:rotate(-5deg); -moz-box-shadow:10px 10px 20px #000000;
            -webkit-transform:rotate(-5deg); -webkit-box-shadow:10px 10px 20px #000000;
            transform:rotate(-5deg); box-shadow:10px 10px 20px #000000; }
        </style>
    </head>
    <body>
    <h1>Moduli creati dai coordinatori</h1>
<?php
function dir_list($directory = FALSE) {
  $dirs= array();
  $files = array();
  if ($handle = opendir("./" . $directory))
  {
    while ($file = readdir($handle))
    {
      if (is_dir("./{$directory}/{$file}"))
      {
        if ($file != "." & $file != "..") $dirs[] = $file;
      }
      else
      {
        if ($file != "." & $file != "..") $files[] = $file;
      }
    }
  }
  closedir($handle);

  reset($dirs);
  sort($dirs);
  reset($dirs);

  reset($files);
  sort($files);
  reset($files);
  echo("<div id=\"list8\">\n");
  if(count($dirs)!=0) {
    echo "<strong>Cartelle:</strong>\n<ul>";
    while(list($key, $value) = each($dirs)) {
        $d++;
        echo "<li><a href=\"{$value}\">{$value}/</a>\n";
    }
    echo "</ul>\n";
  }
  echo "<strong>Files:</strong>\n<ul>";
  while(list($key, $value) = each($files))
  {
    $f++;
    echo "<li ><a href=\"{$directory}{$value}\">{$value}</a>\n";
  }
  echo "</ul>\n</div>";
  if (!$d) $d = "0";
  if (!$f) $f = "0";
  echo "Sono presenti <strong>{$d}</strong> cartelle e <strong>{$f}</strong> file(s).</strong>\n";
}
dir_list("../docx/ModuliStampati/");
?>
</body>
</html>