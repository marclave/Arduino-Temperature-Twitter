#!/usr/bin/php

<?php

include "php_serial.class.php"; 

// Let's start the class 
$serial = new phpSerial(); 

// First we must specify the device. This works on both linux and windows (if 
// your linux serial device is /dev/ttyS0 for COM1, etc) 
$serial->deviceSet("/dev/tty.usbserial-A9U597JN"); 

// Set for 9600-8-N-1 (no flow control)
$serial->confBaudRate(9600); //Baud rate: 9600
$serial->confParity("none");  //Parity (this is the "N" in "8-N-1")
//$seriel->confCharacterLength(8); //Character length     (this is the "8" in "8-N-1")
$serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1")
$serial->confFlowControl("none");

// Then we need to open it 
$serial->deviceOpen(); 


// Read data
$read = $serial->readPort(); 
 
// Print out the data
echo $read;

// If you want to change the configuration, the device must be closed 
$serial->deviceClose(); 



// FOR TWEETING (SIMPLE)

// require codebird
require_once('/Users/marcman/Documents/Arduino/codebird-php-2.4.1/src/codebird.php');
 
\Codebird\Codebird::setConsumerKey("oKdUscJKClRGAzQYCIuoYw", "cH3hYvlLcfV3G2BvVz0eFiY9KcCMgUDmWCX1a0Szsk");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("2288864402-NyaZVhzq0AB3xClr8X9WLe1S7V1zka3CekbO36m", "G9psltpEVuMkUdIWwNI2Z40HvONzwVq3TyzMeQ2peCbwf");
 
$params = array(
 'status' => "Marc's room temperature is now $read degrees celsius #marcsarduino" 
);
$reply = $cb->statuses_update($params);

?>
