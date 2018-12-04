<?php 
include('../../../API/API_DepHerit.php');
include('../../../API/API_Herit.php');

if(isset($_GET['id']) && isset($_POST['Mnt']) && isset($_POST['Type'])&& isset($_POST['obs'])){
$Mnt = $_POST['Mnt'];
$date = date('Y-m-d H:i:s');
$Type = $_POST['Type'];
$obs = $_POST['obs'];
$Libellee = $_POST['Libelle'];
$idM = $_GET['id'];
$Herit = ji_get_Herit_id($idM);
ji_add_DepHerit($date,$Libellee,$Mnt,$Type,$obs,$idM);

header('location:../DetailHer.php?id='.$idM);
}
?>