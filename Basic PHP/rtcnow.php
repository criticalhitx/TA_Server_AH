 <?php
define('TIMEZONE', 'Asia/Jakarta');
date_default_timezone_set(TIMEZONE);

// Call TimeNow Function----------------
$TimeNow = RTCnow();
echo "$TimeNow";
//-----------------------------------
function RTCnow()
{
	$tahun = date("Y");
	$bulan = date("m");
	$hari = date("d");
  
  $YTDcount = DayYTD($hari,$bulan,$tahun);
  $TahunBerlalu= DayLewat($tahun);
  $YTDtotal = $YTDcount+$TahunBerlalu;
  return $YTDtotal;
}

function DayYTD(int $hr,int $bln,int $th)
{
  $kab = isKabisat($th);
  if($kab)
    $febDay=29;
  else
    $febDay=28;
  //-----------------------------//
  if($bln==1)
    return $hr;
  else if($bln==2)
    return 31+$hr;
  else if($bln==3)
    return 31+$febDay+$hr;
  else if($bln==4)
    return 31+$febDay+31+$hr;
  else if($bln==5)
    return 31+$febDay+31+30+$hr;
  else if($bln==6)
    return 31+$febDay+31+30+31+$hr;
  else if($bln==7)
    return 31+$febDay+31+30+31+30+$hr;
  else if($bln==8)
    return 31+$febDay+31+30+31+30+31+$hr;
  else if($bln==9)
    return 31+$febDay+31+30+31+30+31+31+$hr;
  else if($bln==10)
    return 31+$febDay+31+30+31+30+31+31+30+$hr;
  else if($bln==11)
    return 31+$febDay+31+30+31+30+31+31+30+31+$hr;
  else if($bln==12)
    return 31+$febDay+31+30+31+30+31+31+30+31+30+$hr;
}

function DayLewat(int $th)
{
  $count = 100000;
  
  for ($i=2019;$i<$th;$i++)
  {
    if(isKabisat(i))
      $count+=366;
    else
      $count+=365;
  }
  return $count;
}

function isKabisat(int $th)
{
  if($th%4==0)
  {
    return true;
  }
  else
  {
    return false;
  }
}
?> 