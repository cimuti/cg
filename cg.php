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
                                            \033[1;97m   versi: xnx 
           Kopi & Rokok adalah jalan ninjaku
\033[1;92m
User : @User
Password : xxxxxxx\n";
echo str_repeat("\033[1;93m◼",50)."\n\n";
}
$l = str_repeat("_", 50)."\n\n";
system("clear");
ban();
$host="gardencash.ga";
$url="https://gardencash.ga/";
$res=get($url, $host);
$log= explode('">',explode('<input type="hidden" name="destination" value="',$res)[1])[0];
$data="destination=$log";
$host="gardencash.ga";
$url="https://gardencash.ga/";
$res=post($url, $data, $host);
$csrf= explode('">',explode('<input type="hidden" name="csrf_token_name" id="token" value="',$res)[1])[0];
$data="csrf_token_name=$csrf&wallet=$email&captcha=recaptchav2&g-recaptcha-response=";
$host="gardencash.ga";
$url="https://gardencash.ga/auth/login";
$res=post($url, $data, $host);
system("clear");
ban();
$host="gardencash.ga";
$url="https://gardencash.ga/";
$res=get($url, $host);
$mail= explode('</span>',explode('<span class="user-dropdown-email">',$res)[1])[0];
$user= explode('</span>',explode('<h6 class="user-dropdown-name">User',$res)[1])[0];
$bal= explode('<small>',explode('class="h5 mb-0 font-weight-bold text-gray-800">',$res)[1])[0];
$bal2= explode('</small>',explode('<small>',$res)[1])[0];
$mine= explode('</b>',explode('<div class="h5 mb-0 font-weight-bold text-gray-800"><b id="balance">',$res)[1])[0];
$mine2= explode('</small>',explode('</b><small id="balance2">',$res)[1])[0];
print "\033[1;97mEmail = \033[1;97m$mail\n\n";
print "\033[1;97mUser id = \033[1;97m$user\n\n";
print "\033[1;97mAccount Balance = \033[1;93m $bal$bal2\n\n";
print "\033[1;97mMiner Active = \033[1;93m$mine$mine2\n\n";
print"\033[1;92m$l";
while(true):
  $host="gardencash.ga";
$url="https://gardencash.ga/";
$res=get($url, $host);
$cd = explode(';',explode('var tims = ',$res)[1])[0];
for ($i = $cd; $i >0; $i--) {
print "\033[1;91mplease wait \033[1;93m$i\033[1;91m to claim";
sleep (1);
print "\r                                   \r";
}
$token= explode('">',explode('<input id="token" type="hidden" name="token" value="',$res)[1])[0];
$data="token=$token";
$host="gardencash.ga";
$url="https://gardencash.ga/mining/getbalance";
$res=post($url, $data, $host);
a:
$host="gardencash.ga";
$url="https://gardencash.ga/";
$res=get($url, $host);
$bot1=explode('\"',explode('rel=\"',$res)[1])[0];
$bot2=explode('\"',explode('rel=\"',$res)[2])[0];
$bot3=explode('\"',explode('rel=\"',$res)[3])[0];
$csrf2=explode('">',explode('<input type="hidden" name="csrf_token_name" id="token" value="',$res)[1])[0];
$token2=explode('">',explode('<input type="hidden" name="token" value="',$res)[1])[0];
$data="antibotlinks=+$bot1+$bot2+$bot3&csrf_token_name=$csrf2&token=$token2&captcha=recaptchav2&g-recaptcha-response=";
$host="gardencash.ga";
$url="https://gardencash.ga/mining/take";
$res=post($url, $data, $host);
$inv=explode("`,
  backdrop: `
    rgba(0,0,123,0.4)",explode("html: `",$res)[1])[0];
if($inv=="Invalid Anti-Bot Links"){
  sleep(1);
  goto a;
}
print "\033[1;92m$inv\n\n";
$host="gardencash.ga";
$url="https://gardencash.ga/";
$res=get($url, $host);
$bal= explode('<small>',explode('class="h5 mb-0 font-weight-bold text-gray-800">',$res)[1])[0];
$bal2= explode('</small>',explode('<small>',$res)[1])[0];
print "\033[1;92mUpdate Balance = \033[1;93m $bal$bal2\n\n";
print"\033[1;92m$l";
sleep(1);
endwhile;
