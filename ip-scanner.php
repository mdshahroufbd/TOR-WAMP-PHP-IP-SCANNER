<?php header("Refresh:30"); ?>

<?php
//
// Created to test the theory of IP scanning out on the DDW & the RISK'S we're unaware of.
//
// WARNING: I AM NOT RESPONISBLE IF YOU USE THIS SOFTWARE FOR ANY ILLEGAL REASON.
//
// NEED TO USE:
//
// WAMP SERVER - http://www.wampserver.com/en/
// PHP 7.2.4
// MYSQL 5.7.21
//
// TOR Browser - https://www.torproject.org/projects/torbrowser.html.en#downloads
// *** YOU MUST SET UP A TOR RELAY ***
//
// & THIS GIT
// 
?>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet"> 

<style>

/*basic reset */

*{ margin: 0; padding: 0; }

/* Page settings */

html { width: 100%; height: 100%; background: radial-gradient(circle, #fff 0%, #aaa 100%) no-repeat; overflow-x: hidden; overflow-y: hidden; }

body { text-align: center; display: table; background: black; width: 100%; height: 100%; overflow-x: hidden; overflow-y: hidden; }

canvas { display:block; }

#author { position: absolute; bottom: -20px; left: -10px; color : #0F0; z-index : 1; box-sizing: border-box; vertical-align: middle; }

span { font-family: monospace; font-size: 1.5em; }

span:after { content:"|=ux0.- _|00"; opacity: 0; animation: cursor 1s infinite; }

@keyframes cursor { 0% { opacity: 0; } 40% { opacity: 0; } 50% { opacity: 1; } 90% { opacity: 1; } 100% { opacity: 0;}}

</style>

</head>


<body style='background:black; font-family: "Preahvihear", cursive;'>

<?php
// STOP ERRORS FROM BEING DISPLAYED
error_reporting(E_ERROR | E_PARSE);

// GEN RANDOM 

// Example: $host0 = 192;  
$host0 = rand(0, 169); 

// GEN RANDOM 
$host1 = rand(0, 254);

// GEN RANDOM
$host2 = rand(0, 255);

// GEN RANDOM
$host3 = rand(1, 254);

$testme = "$host0.$host1.$host2.$host3";

// Hide your IP from list!
if($testme == "0.0.0.0"){
    echo 'Uh..Why am I here?';
}
// Display Output
else{
    $output=shell_exec('ping -n 1 '.$testme);
}

// Gen Random Color H1
function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

// Turn Function into Variable
$taco = rand_color();

// Title + Output
echo "<h1 style='color:$taco'>#Owned</h1><br/><pre style='color:$taco !important; font-family: 'Source Code Pro', monospace !important;'>$output</pre>"; 

// Host is DEAD
if (strpos($output, 'out') !== false) {
    echo "<kbd style='background:red;'>Dead</kbd><br/>";
    header("Refresh:0");
}
    elseif(strpos($output, 'expired') !== false)
{
    echo "Network Error";
    header("Refresh:0");
}

// Host is NULL
elseif(strpos($output, 'data') == null) { echo "NULL"; header("Refresh:0"); }

elseif(strpos($output, 'data') !== false) {

// Host is ALIVE
echo "<kbd>Alive</kbd> <br/>";

// Save content discovered to TXT file
$file = 'people.txt';

// Open the file to get existing content
$current = file_get_contents($file);

// IP INFO 
$json  = file_get_contents("http://ip-api.com/json/$testme");
$json  =  json_decode($json ,true);

// Display Country
$country = $json['country'];
if($country == null){ $country00 = 'NULL'; }
else{ $country00 = $country; }

// Display City
$city = $json['city'];
if($city == null){ $city00 = 'NULL'; }
else{ $city00 = $city; }

// Display LAN + LON
$lat = $json['lat'];
$lon = $json['lon'];

// INI Max Execution
ini_set('max_execution_time', 0);
ini_set('memory_limit', -1);

// Host IP to TEST
$host = $testme;

// Check Array of Open Ports

// FTP 21, SMTP 25, HTTP 80, TORPARK 81, POP3 110, IMAP 143, HTTPS 443, SMTP 587, NULL 2525, MYSQL 3306, RDP 3389, PCANY 5631, MCS 25565
$ports = array(21, 25, 80, 81, 110, 143, 443, 587, 2525, 3306, 3389, 5631, 25565);    

// Check port 1 by 1

// PORT 80
if(fsockopen($testme, 80)) { $port80 = "Port 80 is Open"; } elseif(fsockopen($testme, 80) == null){ $port80 = "Port 80 is NULL"; } else { $port80 = "Port 80 is Closed"; }

// PORT 5631
if(fsockopen($testme, 5631)) { $port5631 = "Port 5631 is Open"; } elseif(fsockopen($testme, 5631) == null){ $port5631 = "Port 5631 is NULL"; }  else { $port5631 = "Port 25 is Closed"; }

// PORT 21
if(fsockopen($testme, 21)) { $port21 = "Port 21 is Open"; } elseif(fsockopen($testme, 21) == null){ $port21 = "Port 21 is NULL"; }  else { $port21 = "Port 21 is Closed"; }

// PORT 443
if(fsockopen($testme, 443)) { $port443 = "Port 443 is Open"; } elseif(fsockopen($testme, 443) == null){ $port443 = "Port 443 is NULL"; }  else { $port443 = "Port 443 is Closed"; }

// PORT 587
if(fsockopen($testme, 587)) { $port587 = "Port 587 is Open"; } elseif(fsockopen($testme, 587) == null){ $port587 = "Port 587 is NULL"; }  else { $port587 = "Port 587 is Closed"; }

// PORT 25565
if(fsockopen($testme, 25565)) { $port25565 = "Port 25565 is Open"; } elseif(fsockopen($testme, 25565) == null){ $port25565 = "Port 25565 is Closed"; }  else { $port25565 = "Port 25565 is Closed"; }

// Append a new person to the file
$current .= "

<li class='list-group-item d-flex justify-content-between align-items-center'>

<div class='card text-center'>

<div class='card-header'>$testme</div>

<div class='card-body'>

<p class='card-text'>$output</p>

<a href='ftp://$testme' class='btn btn-primary' target='_blank'>FTP</a>

<a href='sftp://$testme' class='btn btn-primary' target='_blank'>SFTP</a>

<a href='http://$testme' class='btn btn-primary' target='_blank'>HTTP</a>

<a href='https://$testme' class='btn btn-primary' target='_blank'>HTTPS</a>

<a href='https://whatismyipaddress.com/ip/$testme' class='btn btn-primary' target='_blank'>INFO</a>

<a href='https://www.latlong.net/c/?lat=$lat&long=$lon' class='btn btn-primary' target='_blank'>LOCATION</a>

</div>

<div class='card-footer text-muted'>

<kbd>$city00</kbd>

<kbd class='location'>$country00</kbd>

<br/>

<kbd>HTTP $port80</kbd><br/>

<kbd>HTTPS $port443</kbd><br/>

<kbd>PCANY $port5631</kbd><br/>

<kbd>FTP $port21</kbd><br/>

<kbd>SMTP $port587</kbd><br/>

<kbd>MCS $port25565</kbd><br/>

</div>

</div>

</li>

";

// Write the contents back to the file
file_put_contents($file, $current);
header("Refresh:0");
}
else { echo "Unknown Error"; header("Refresh:0"); }

?>

<br/>

</body>
