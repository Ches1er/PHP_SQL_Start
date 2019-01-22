<?php
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"]);
define("ROOTPATH",DOCROOT."/app/root/");
define("CONTROLLERPATH",DOCROOT."/app/controllers/");
define("VIEWPATH",DOCROOT."/app/views/");
define("TEMPLATESPATH",DOCROOT."/app/templates/");
define("FNPATH",DOCROOT."/app/functions/");
include ROOTPATH."routing.php";
echo navigate();


