<?php 
require_once 'phpqrcode/qrlib.php';

$path = 'images/';
$qrcode = $path.time().".png";

$name         = 'Luis Molina';
$sortName     = 'Luis Molina';
$phone        = '(049)012-345-678';
$phonePrivate = '(049)012-345-987';
$phoneCell    = '(049)888-123-123';
$orgName      = 'GERS SAS.';

$email        = 'luis.molina@gers.com.co';
$website        = 'www.gers.com.co';
// if not used - leave blank!
$addressLabel     = 'Calle 3a A #65-118';
$addressPobox     = '';
$addressExt       = 'Suite 123';
$addressStreet    = 'El refugio';
$addressTown      = 'Cali';
$addressPostCode  = '91921-1235';
$addressCountry   = 'Colombia';

// we building raw data
$codeContents  = 'BEGIN:VCARD'."\n";
$codeContents .= 'VERSION:2.1'."\n";
$codeContents .= 'N:'.$sortName."\n";
$codeContents .= 'FN:'.$name."\n";
$codeContents .= 'ORG:'.$orgName."\n";

$codeContents .= 'TEL;WORK;VOICE:'.$phone."\n";
$codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n";
$codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n";

$codeContents .= 'ADR;TYPE=work;'.
    'LABEL="'.$addressLabel.'":'
    .$addressPobox.';'
    .$addressExt.';'
    .$addressStreet.';'
    .$addressTown.';'
    .$addressPostCode.';'
    .$addressCountry
."\n";

$codeContents .= 'EMAIL:'.$email."\n";
$codeContents .= 'URL:'.$website."\n";
$codeContents .= 'END:VCARD';



QRcode::png($codeContents, $qrcode, QR_ECLEVEL_L, 3);

echo "<img src='".$qrcode."' >";




?>