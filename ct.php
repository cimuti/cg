<?php
error_reporting(0);
function curl($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_COOKIE,TRUE);
        curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }


function get($url,$host){
  return curl($url,'',head($host))[1];
}

function post($url,$data,$host){
  return curl($url,$data,head($host))[1];
}

function head($host){
  $h[]="Host: $host";
  $h[]="content-type: application/x-www-form-urlencoded";
  $h[]="user-agent: Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Mobile Safari/537.36";
  return $h;
}

if(!file_exists("data.json")){
while("true"){
system("clear");
ban();
$api["Email"]=readline("\033[1;97mInput Your Email : \033[1;92m");
//$api["Pass"]=readline("\033[1;97mInput Your Password : \033[1;92m");
if($api["Email"]!=""){
break;
}
}
save("data.json",$api);
//$a=next($ran);
}

$email=json_decode(file_get_contents("data.json"),true)["Email"];
//$pass=json_decode(file_get_contents("data.json"),true)["Pass"];

function save($data,$data_post){
    if(!file_get_contents($data)){
      file_put_contents($data,"[]");}
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT));
}

/*
\033[1;90m Abu Gelap
\033[1;91m Merah
\033[1;92m Hijau
\033[1;93m Kuning
\033[1;94m Biru Gelap
\033[1;95m Ungu
\033[1;96m Biru Telor Asin
\033[1;97m Putih
*/
function ban(){
$v=1;
echo $ban="
\033[1;91m
  _____             _        _____             
 \033[1;93m|  __ \           | |      |  __ \            
 \033[1;92m| |  | | ___  _ __| |_ ___ | |  | | ___  _ __ 
 \033[1;95m| |  | |/ _ \| '__| __/ _ \| |  | |/ _ \| '__|
 \033[1;94m| |__| | (_) | |  | || (_) | |__| | (_) | |   
 \033[1;96m|_____/ \___/|_|   \__\___/|_____/ \___/|_|   
                                            \033[1;97m              versi: Ct1
           Kopi & Rokok adalah jalan ninjaku
\033[1;92m
User: @User
Password: xxxxxxx\n";
echo str_repeat("\033[1;93m◼",50)."\n\n";
}
$l = str_repeat("_", 50)."\n\n";
c:
system("clear");
ban();
print "\033[1;92m1. auto faucet\n";
print "\033[1;92m2. withdraw\n";
print "\033[1;93m$l";
$pil["pilih"]=readline("\033[1;97mInput Your Number : \033[1;92m");
if($pil["pilih"]=="1"){
goto a;
}
if($pil["pilih"]=="2"){
goto b;
}
a:
$host="cryptofy.club";
$url="https://cryptofy.club/";
$res=get($url, $host);
$data="email=$email&r=&btn-start=";
$host="cryptofy.club";
$url="https://cryptofy.club/check.php";
post($url, $data, $host);
system("clear");
ban();
while(true):
$host="cryptofy.club";
$url="https://cryptofy.club/home.php?LTC=1&DOGE=1&DGB=1&TRX=1&USDT=1&BCH=1&DASH=1&FEY=1&ZEC=1&SOL=1&redirect=1";
$res=get($url, $host);
$t = explode(';',explode('var count = ',$res)[1])[0];
print "\033[1;91mtimer = \033[1;93m$t\n";
print "\033[1;93m$l";
$cd = explode(';',explode('var seconds = count % ',$res)[1])[0];
for ($i = $cd; $i >0; $i--) {
print "\033[1;91mplease wait \033[1;93m$i\033[1;91m to claim";
sleep (1);
print "\r                                   \r";
}
$sukses = explode('"',explode('toastr["success"]("',$res)[1])[0];
print "\033[1;92m sukses ".$sukses."\n\n";
if($t=="0"){
  print "shortlink dulu bosss!!!";
  sleep(2);
  exit;
}
$host="cryptofy.club";
$url="https://cryptofy.club/account.php";
$res=get($url, $host);
$ltc=explode('</td>',explode('<td>LTC</td>
<td>',$res)[1])[0];
$doge=explode('</td>',explode('<td>DOGE</td>
 <td>',$res)[1])[0];
$dgb=explode('</td>',explode('<td>DGB</td>
<td>',$res)[1])[0];
$trx=explode('</td>',explode('<td>TRX</td>
<td>',$res)[1])[0];
$usdt=explode('</td>',explode('<td>USDT</td>
<td>',$res)[1])[0];
$bch=explode('</td>',explode('<td>BCH</td>
<td>',$res)[1])[0];
$dash=explode('</td>',explode('<td>DASH</td>
<td>',$res)[1])[0];
$fey=explode('</td>',explode('<td>FEY</td>
<td>',$res)[1])[0];
$zec=explode('</td>',explode('<td>ZEC</td>
<td>',$res)[1])[0];
$sol=explode('</td>',explode('<td>SOL</td>
<td>',$res)[1])[0];
print "\033[1;92m LTC  = \033[1;93m$ltc\n\n";
print "\033[1;92m DOGE = \033[1;93m$doge\n\n";
print "\033[1;92m DGB  = \033[1;93m$dgb\n\n";
print "\033[1;92m TRX  = \033[1;93m$trx\n\n";
print "\033[1;92m USDT = \033[1;93m$usdt\n\n";
print "\033[1;92m BCH  = \033[1;93m$bch\n\n";
print "\033[1;92m DASH = \033[1;93m$dash\n\n";
print "\033[1;92m FEY  = \033[1;93m$fey\n\n";
print "\033[1;92m ZEC  = \033[1;93m$zec\n\n";
print "\033[1;92m SOL  = \033[1;93m$sol\n\n";
print"\033[1;93m$l";
sleep(1);
endwhile;
b:
  $host="cryptofy.club";
$url="https://cryptofy.club/";
$res=get($url, $host);
$data="email=$email&r=&btn-start=";
$host="cryptofy.club";
$url="https://cryptofy.club/check.php";
post($url, $data, $host);
$host="cryptofy.club";
$url="https://cryptofy.club/account.php";
$res=get($url, $host);
$ltc=explode('</td>',explode('<td>LTC</td>
<td>',$res)[1])[0];
$doge=explode('</td>',explode('<td>DOGE</td>
 <td>',$res)[1])[0];
$dgb=explode('</td>',explode('<td>DGB</td>
<td>',$res)[1])[0];
$trx=explode('</td>',explode('<td>TRX</td>
<td>',$res)[1])[0];
$usdt=explode('</td>',explode('<td>USDT</td>
<td>',$res)[1])[0];
$bch=explode('</td>',explode('<td>BCH</td>
<td>',$res)[1])[0];
$dash=explode('</td>',explode('<td>DASH</td>
<td>',$res)[1])[0];
$fey=explode('</td>',explode('<td>FEY</td>
<td>',$res)[1])[0];
$zec=explode('</td>',explode('<td>ZEC</td>
<td>',$res)[1])[0];
$sol=explode('</td>',explode('<td>SOL</td>
<td>',$res)[1])[0];
print "\033[1;92m LTC  = \033[1;93m$ltc\n\n";
print "\033[1;92m DOGE = \033[1;93m$doge\n\n";
print "\033[1;92m DGB  = \033[1;93m$dgb\n\n";
print "\033[1;92m TRX  = \033[1;93m$trx\n\n";
print "\033[1;92m USDT = \033[1;93m$usdt\n\n";
print "\033[1;92m BCH  = \033[1;93m$bch\n\n";
print "\033[1;92m DASH = \033[1;93m$dash\n\n";
print "\033[1;92m FEY  = \033[1;93m$fey\n\n";
print "\033[1;92m ZEC  = \033[1;93m$zec\n\n";
print "\033[1;92m SOL  = \033[1;93m$sol\n\n";
print"\033[1;93m$l";
  $with1=explode("'",explode("<td><input value='",$res)[1])[0];
  $with2=explode("'",explode("<td><input value='",$res)[2])[0];
  $with3=explode("'",explode("<td><input value='",$res)[3])[0];
  $with4=explode("'",explode("<td><input value='",$res)[4])[0];
  $with5=explode("'",explode("<td><input value='",$res)[5])[0];
  $with6=explode("'",explode("<td><input value='",$res)[6])[0];
  $with7=explode("'",explode("<td><input value='",$res)[7])[0];
  $with8=explode("'",explode("<td><input value='",$res)[8])[0];
  $with9=explode("'",explode("<td><input value='",$res)[9])[0];
  $with10=explode("'",explode("<td><input value='",$res)[10])[0];
$data="ltc=$with1&doge=$with2&dgb=$with3&trx=$with4&usdt=$with5&bch=$with6&dash=$with7&fey=$with8&zec=$with9&sol=$with10";
$host="cryptofy.club";
$url="https://cryptofy.club/account.php";
post($url,$data, $host);
$su=explode('")',explode('toastr["success"]("',$res)[1])[0];
print "sukses ".$su;
sleep(2);
goto c;