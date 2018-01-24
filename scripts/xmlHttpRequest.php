<?php
// Change the 4 variables below
$yourName = 'Enviado desde goldenharvest.com.mx';
$yourEmail = 'trujillo@goldenharvest.com.mx';
$yourSubject = '';
$referringPage = 'http://www.goldenharvest.com.mx';
// no need to change the rest unless you want to. You could add more error checking...

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

echo '<resultset>';

function cleanPosUrl ($str) {
$nStr = $str;
$nStr = str_replace("**am**","&",$nStr);
$nStr = str_replace("**pl**","+",$nStr);
$nStr = str_replace("**eq**","=",$nStr);
return stripslashes($nStr);
}
	if ( $_GET['contact'] == true && $_GET['xml'] == true && isset($_POST['posText']) ) {
	$to = $yourName;
	$subject = $yourSubject . cleanPosUrl($_POST['posRegard']);
	$message = cleanPosUrl($_POST['posText']);
	$headers = "From: ".cleanPosUrl($_POST['posName'])." <".cleanPosUrl($_POST['posEmail']).">\r\n";
	$headers .= 'To: '.$yourName.' <'.$yourEmail.'>'."\r\n";
	$mailit = mail($to,$subject,$message,$headers);
		
		if ( @$mailit )
		{ $posStatus = 'OK'; $posConfirmation = 'Enviado! Su correo ha sido enviado con &#65533;xito.'; }
		else
		{ $posStatus = 'NOTOK'; $posConfirmation = 'Su correo no pudo ser enviado. Por favor regrese e intente otra vez.'; }
		
		if ( $_POST['selfCC'] == 'send' )
		{
		$ccEmail = cleanPosUrl($_POST['posEmail']);
		//@mail($ccEmail,$subject,$message,"From: Yourself <".$ccEmail.">\r\nTo: Yourself");
		}
	
	echo '
		<status>'.$posStatus.'</status>
		<confirmation>'.$posConfirmation.'</confirmation>
		<regarding>'.cleanPosUrl($_POST['posRegard']).'</regarding>
		';
	}
echo'	</resultset>';

?>