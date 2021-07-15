<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=samuaeve_sistema;charset=utf8', 'samuaeve_rootsis', '@BH4gj*n3t,V');
}
catch(Exception $e)
{
        die('Error  : '.$e->getMessage());
}
