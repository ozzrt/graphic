<?php
header('Cache-Control: no-store');
$im=imagecreatetruecolor(950,950);
$w=imagecolorallocate($im,255,255,255);
$g=imagecolorallocate($im,0,255,0);
$b=imagecolorallocate($im,30,0,30);
imagefilledrectangle($im,0,0,950,950,$b);
$r=475;
$pi=3.1415927;
$i=-1;
$s=date('s')/2+0.5;
if ($s>0 && $s<=64){$d=$s;}else{$d=12;}
while (++$i < $d*2) {
  $x1 = $r*sin($pi/$d*$i)+$r;
  $y1 = ($r*cos($pi/$d*$i)+$r)*1;
  $j = $i;
  while (++$j < $d*2) {
   $x2 = $r*sin($pi/$d*$j)+$r;
   $y2 = ($r*cos($pi/$d*$j)+$r)*1;
   imageline($im,$x1,2*$r-$y1,$x2,2*$r-$y2,$g);
  }
}
$it=imagecreatetruecolor(255,15);
imagestring($it, 8, 8, 0, $d , $w);
imagecopymerge($im, $it, -1, 8, -4, 2, 255, 15, 88);
header( 'Content-Type: image/jpeg' );
imagejpeg($im);
imagedestroy($im);
?>
