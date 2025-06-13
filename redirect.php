<?php
session_start();
error_reporting(0);
require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("853315883053-h5j92co53aejsrmbk6rv76cs0o0q29iv.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://paddleshare.freevar.com/Google/home_g.php");

$_SESSION['code'] = $_GET['code'];
$code = $_SESSION['code'];
echo "<script>alert('$code');</script>";

if (!isset($_GET["code"]))
{
    echo "<script>window.location.href ='../car/index.html';</script>";
}
else
{
    header('Location: /car/Google/home_g.php');
}

$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

$client->setAccessToken($token["access_token"]);

$oauth = new Google\Service\Oauth2($client);

$userinfo = $oauth->userinfo->get();

$uemail = $userinfo->email;
$ulast_name = $userinfo->familyName;
$ufirstname = $userinfo->givenName;
$uname = $userinfo->name;
$profile_pic = $userinfo->picture;

$_SESSION['uemail'] = $uemail;
$_SESSION['ulast_name'] = $ulast_name;
$_SESSION['ufirstname'] = $ufirstname;
$_SESSION['uname'] = $uname;
$_SESSION['profile_pic'] = $profile_pic;

$uname = $_SESSION['$uname'];

echo "<script>alert('$uname');</script>";

?>