<!DOCTYPE html>
<?php
/*
    This block of code, from the beginning to end of this php tag does the following: 
    1. Updates link to HTTPS
    2. Connects to MySQL Database -- defines the functions, then runs them w/ credentials
    3. Prepares these general page elements: Navigation Bar, Blogs, Footer 
    
    Author: 
    Shawn Soneja
    
    11/5/2019
*/


//remove http link
//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
//---beg connection fxns
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "u782434760_hex";
 $dbpass = "Zendera1!";
 $db = "u782434760_hex";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
//---end connection fxns

//Start Connection
$conn = OpenCon();

//Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo "<b>Connection Status:</b> we good<br>";
}



//QUERIES ------------------------------------ 


//======== Query 1

//Query statement 
$sql = "SELECT * FROM `Blog`";

//Query output
$result = $conn->query($sql);

$resourceContainer = array();

//container
$finalResources = array();

$featuredResources = array();

//Iterate over your output if there's data
if ($result->num_rows > 0) {
    
    //data of each row
    while($row = $result->fetch_assoc()) {
        //captures 4 'fields' on object
        $resourceContainer["resourceImg"] = $row["Images"];
        $resourceContainer["resourceDesc"] = $row["Description"];
        $resourceContainer["resourceTitle"] = $row["Title"]; 
        $resourceContainer["resourceLink"] = $row["Link"];
        $resourceContainer["resourceFeat"] = $row["Featured"];
        array_push($finalResources,$resourceContainer);
        
        //grabbing featured resources
        if($row["Featured"] == "Y"){
            array_push($featuredResources,$resourceContainer);
        }
    }
    
} else {
    echo "0 results";
}



//========== Query 2 



//Query statement 
$sql2 = "SELECT * FROM `WebsiteElements`";

//Query output
$result2 = $conn->query($sql2);

$elementsContainer = array();

//container
$transitContainer = array();


//element callouts
$homeLink = "";
$navBody = "";
$css = "";
$footer="";


//Iterate over your output if there's data
if ($result2->num_rows > 0) {
    
    //data of each row
    while($row = $result2->fetch_assoc()) {
        //captures 4 'fields' on object
        /*
        $transitContainer["elId"] = $row["Identifier"];
        $transitContainer["elCategory"] = $row["Category"];
        $transitContainer["elContent"] = $row["Content"]; 
        $transitContainer["elDesc"] = $row["Description"];
        array_push($elementsContainer,$transitContainer);
        */
        if($row["Identifier"] == "1"){$homeLink = $row["Content"];}
        
        switch ($row["Identifier"]) {
            case "1":
                //$homeLink = $row["Content"];
                break;
            case "2":
                $navBody = $row["Content"];
                break;
            case "3":
                $css = $row["Content"];
                break;
            case "4":
                $footer = $row["Content"];
                break;
        }
    }
    
} else {
    echo "0 results";
}

//Close that connection 
CloseCon($conn);
?>




<html>

<head>
    <title>Resources</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="/main/style-update.css">
  <!--
  <link rel="stylesheet" href='/main/style_updated.css'/>
  -->
  <script src="/main/script_update.js"></script>
  

  
  <!-- STYLE --> 
  
  <style>
     
  </style>
  
</head>



<body>
<?php
print($navBody);
/*
    print("<nav id='nav'>");
        print("<div id='mobileHamburger' class='flexCenter' onclick='toggleMobileMenu()'>");
        print("<i class='material-icons' style='border:0px solid green;font-size:45px;'>list</i>");
        print("</div>");
        print("<div class='navLink flexCenter desktopCorrection' style='width:30px;'></div>");
        print("<a href='/index.php'><div class='navLink flexCenter' style='width:150px;' id='logo'><img src='images/logo.png' style='width:100%;'></div></a>");
        print("<a href=".$homeLink."><div class='navLink flexCenter'>Home</div></a>");
        print("<a href='/about'><div class='navLink flexCenter'>About</div></a>");
        print("<a href='/product'><div class='navLink flexCenter'>Product</div></a>");
        print("<a href='/resources'><div class='navLink flexCenter'>Resources</div></a>");
        print("<style>#navStart:hover{opacity:1 !important;}</style>");
        print("<div class='navLinkRight flexCenter desktopCorrection' style='width:30px;'></div>");
        print("<a href='/Sign_Up/index.php'><div class='navLinkRight flexCenter' style='' id='navStart'>");
        print("<div class='getStarted'>Get Started</div>");
        print("</div></a>");
        print("<a href='/Sign_In/index.php'><div class='navLinkRight flexCenter' style='color:rgb(70,132,153);'>Sign In</div></a>");
    print("</nav>");
    
    print("<div id='mobileMenu'>");
        print("<div class='mobLink'></div>");
        print("<div class='mobLink flexCenter'><a href=''>Home</a></div>");
        print("<div class='mobLink flexCenter'>About</div>");
        print("<div class='mobLink flexCenter'>Product</div>");
        print("<div class='mobLink flexCenter'>Resources</div>");
        print("<div class='mobLink flexCenter'>Sign In</div>");
    print("</div>");
    
*/
    
?>
<!--this row needs a background-->
<div class='row flexCenter centerTitle' style='background:url("https://media-public.canva.com/MADGvh21GdQ/7/screen_2x.jpg");background-size: cover;background-position: center;position:relative'>
  <div style='height:100%;width:100%;background:rgba(0,0,0,0.7)' class='IE_Correction'>
      <div class='container' style='width:70%;margin-top:170px'><h1>Resources</h1></div>
  </div>
  <style>
      
  </style>
  <div class='allBrowsersCover flexCenter' style='position:absolute;top:0;left:0;height:100%;width:100%;background:rgba(0,0,0,0.7)'>
      <div style='border:0px solid red;width:80%;margin:auto;color:white;font-size:21px;margin-top:150px;' class='centerTitleAdjust'><h1>Resources</h1></div>
  </div>
  <!--center title is only for IE-->
  
</div>
<!--resources (featured)-->
<style>
    .card{
        width:100%;
        transition:0.2s;
        min-height:250px;
        background:none;
        margin-top:25px;
        border:1px solid lightgray;
        transition:0.1s ease-out, opacity 0.1s;
        cursor:pointer;
        margin:auto;
        max-width:260px;
        margin-top:25px;
        
    }
    .card h3, .card p{text-align:center;}
    .cardContainer{
        height:340px;
        width:30%;
        float:left;
        border:0px solid red;
        
    }
    .rescContainer{
        /*resources container*/
        margin:auto;width:80%;height:100%
    }
    .card .cardImg{height:110px;width:100%;background-size:100% 100%;border-bottom:1px solid lightgray;}
    .card:hover{
        box-shadow:0px 0px 7px 0px lightgray;}
    .card:active{opacity:0.8;}
    .shift{margin-left:4.05%;}
    .card p{
        padding-right:15px;
        padding-left:15px;
    }
    .card h3{padding:10px;padding-top:0px;}
</style>
<div class='row' style='position:relative;height:340px'>
    <div class='rescContainer' style=''>
        <?php
        //prepares a variable to add a margin if it's not the first card
        $shift = "";
        for($q=0;$q<3;$q++){
                if ($q>0){$shift = " shift";}
                print("<a href='");
                print($featuredResources[$q]["resourceLink"]);
                print("'>");
                    print("<div class='cardContainer".$shift."'>");
                        print("<div class='card'>");
                            print("<div class='cardImg' style='background-size: cover;background-position: center;background-image:url(");
            
                            print($featuredResources[$q]["resourceImg"]);
                            
                            print(")'>");
                            print("</div>");//close 'cardImg'
                            
                            print("<h3>".$featuredResources[$q]["resourceTitle"]."</h3>");
                            print("<p>".$featuredResources[$q]["resourceDesc"]."</p>");
                            
                        print("</div>");//close 'card'
                    print("</div>");//close 'cardContainer'
                print("</a>");//close 'blogItem'    
            }
        ?>
    </div>
</div>
<style>
    footer a{text-decoration:none;color:gray;}
    footer a:hover{
        opacity:0.6;
        transition:0.4s;
    }
</style>
<?php
print($footer);

?>


</body>
</html>