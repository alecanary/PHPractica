<?php
$myXMLData =
    "<?xml version='1.0' encoding='UTF-8'?>
<notes>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>
<note>
<to>Pepe</to>
<from>Pepa</from>
<heading>Pesao</heading>
<body>Compra pan!</body>
</note>
</notes>";

$xml = simplexml_load_string( $myXMLData ) or die( "Error: Cannot create object" );
echo $xml->note[1]->body;
?>