<?php
session_start();
error_reporting(0);
require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("131232252264-6c0oivon4om492scv05k8eqjfmhf1020.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://127.0.0.1/car/Google/home_g.php");

$_SESSION['code'] = $_GET['code'];

if (!isset($_GET["code"]))
{
    echo "<script>window.location.href ='../index.html';</script>";
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportation & Carpooling System</title>
    <link rel="stylesheet" href="styles1.css" />
    <link rel="stylesheet" href="cb.css" />
    <script src="location.js"></script>
    <link rel="icon" type="image/x-icon" href="/Google/logo.ico">
</head>
<body>
<!-- <header>
        <div class="logo">
            <img src="logo.png">
        </div>
        <h1 class="header-title">Paddle Share</h1>
        <nav>
            <ul>
            <b><p id="status" style="font-size:20px; color:white; padding-right:15px;"></p></b>
                <li><a href="account.php">My Account</a></li>
                <li><a href="logout.php">LogOut</a></li>
            </ul>
        </nav>
    </header> -->

    <header>
      <div class="logo">
        <img src="logo.png" alt="Logo" />
      </div>
      <button class="hamburger" id="hamburgerIcon">
        <div></div>
        <div></div>
        <div></div>
      </button>
      
      <nav>
        <ul>
          <b><p id="status" style="font-size:20px; color:white; padding-right:15px;"></p></b>
          <li><a href="account.php">Account</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>

    <div class="chat-icon1" id="chat-icon" onclick="toggleChat()">
      <span>💬</span>
    </div>
    <div class="chat-container1" id="chat-container">
      <div class="chat-box1" id="chat-box"></div>
      <center>
        <input
          type="text"
          id="user-input"
          placeholder="Chat Here..."
          onkeydown="if(event.key === 'Enter'){sendMessage()}"
          style="width: 80%"
        />

        <button onclick="sendMessage()" style="width: 40%" class="button1">
          Send
        </button>
      </center>
    </div>

    <main>
        <div class="auth-container">
            <h1><?php echo "Welcome ".$uname."!!!"; ?></h1>
            <img src="" alt="">
            <div class="circle-container">
                <a href="rider_g.php" class="circle" id="rider-circle">
                    <h2 style="color:white;">Rider</h2>
                </a>
                <a href="seeker_g.php" class="circle" id="seeker-circle">
                    <h2 style="color:white;">Seeker</h2>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Transportation & Carpooling System</p>
    </footer>
</body>
</html>

<script src="cbb.js"></script>

<script>
  // Get the hamburger icon and menu
  const hamburgerIcon = document.getElementById("hamburgerIcon");
  const navMenu = document.querySelector("nav ul");

  // Add click event to toggle menu visibility
  hamburgerIcon.addEventListener("click", () => {
    navMenu.classList.toggle("active");
    hamburgerIcon.classList.toggle("active");
  });
</script>