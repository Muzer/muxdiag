<?php
if(empty($_GET["diag"]))
{
  echo '<html><head><title>Image chooser</title></head>';
  echo '<body><h1>Please choose an image:</h1>';
  echo '<p>Last Updated 2015-01-07</p>';
  echo '<h2>Full Freeview Service</h2>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-full-eng.png">England</a> <a href="viewcurrent.php?diag=muxdiag-full-eng.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-full-wal.png">Wales</a> <a href="viewcurrent.php?diag=muxdiag-full-wal.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-full-sco.png">Scotland</a> <a href="viewcurrent.php?diag=muxdiag-full-sco.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-full-ni.png">Northern Ireland</a> <a href="viewcurrent.php?diag=muxdiag-full-ni.png&scale=2">(bigger)</a></p>';
  echo '<h2>Freeview Lite Service (No commercial multiplexes)</h2>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-lite-eng.png">England</a> <a href="viewcurrent.php?diag=muxdiag-lite-eng.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-lite-wal.png">Wales</a> <a href="viewcurrent.php?diag=muxdiag-lite-wal.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-lite-sco.png">Scotland</a> <a href="viewcurrent.php?diag=muxdiag-lite-scot.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-lite-ni.png">Northern Ireland</a> <a href="viewcurrent.php?diag=muxdiag-lite-ni.png&scale=2">(bigger)</a></p>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-lite-ci.png">Channel Islands</a> <a href="viewcurrent.php?diag=muxdiag-lite-ci.png&scale=2">(bigger)</a></p>';
  echo '<h2>Special-case UK transmitters</h2>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-ferryside.png">Ferryside relay transmitter</a> <a href="viewcurrent.php?diag=muxdiag-ferryside.png&scale=2">(bigger)</a></p>';
  echo '<h2>Non-UK</h2>';
  echo '<p><a href="viewcurrent.php?diag=muxdiag-roi.png">The Republic of Ireland</a> <a href="viewcurrent.php?diag=muxdiag-roi.png&scale=2">(bigger)</a> (excluding test transmissions due to a lack of data)</p>';
  echo '<h2>Miscellaneous</h2>';
  echo '<p><a href="changelog.txt">Muxdiag changelog</a></p>';
  echo '<p><a href="key.png">Key</a></p>';
  echo '<p><a href="mheg-captions-20110927">MHEG captions, broadcast on 2011-09-28 using rb-browser (so some may be glitched).</a></p>';
  echo '<h2>Historic versions</h2>';
  echo '<p><a href="20150205">2015-02-05 version</a></p>';
  echo '<p><a href="20150112">2015-01-12 version</a></p>';
  echo '<p><a href="20150107">2015-01-07 version</a></p>';
  echo '<p><a href="20150106">2015-01-06 version</a></p>';
  echo '<p><a href="20150105">2015-01-05 version</a></p>';
  echo '<p><a href="../muxdiag.png.old/viewcurrent.php">Historic versions from late 2011</a></p>';
  echo '</body></html>';
} else {
header("Content-type: image/png");
$im = @imagecreatefrompng($_GET["diag"]);
imageline($im, intval(strftime("%H"),10) * 60 + intval(strftime("%M"),10) + 1, 0, intval(strftime("%H"),10) * 60 + intval(strftime("%M"),10) + 1, imagesy($im) - 1, imagecolorallocate($im,100,100,100));
if(!empty($_GET["scale"])){
  $dst = imagecreatetruecolor(imagesx($im)*$_GET["scale"], imagesy($im)*$_GET["scale"]);
  imagecopyresized($dst, $im, 0, 0, 0, 0, imagesx($im)*$_GET["scale"], imagesy($im)*$_GET["scale"], imagesx($im), imagesy($im));
  $im = $dst;
}
imagepng($im);
imagedestroy($im);
}
?>
