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
    <title>Product</title>
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
  @media screen and (max-width:900px){
      #moveMobile{margin-top:122px !important;}
  }
  </style>

</head>



<body>
<?php
print($navBody);
?>
<!--this row needs a background-->
<div class='row flexCenter centerTitle' style='background:url("https://media-public.canva.com/MADGyLhx2qc/4/screen_2x.jpg");background-size: cover;background-position: center;position:relative'>
  <div style='height:100%;width:100%;background:rgba(0,0,0,0.7)' class='IE_Correction'>
      <div class='container' style='width:70%;margin-top:170px'><h1>A new way to assess digital talent</h1></div>
  </div>
  <style>

  </style>
  <div class='allBrowsersCover flexCenter' style='position:absolute;top:0;left:0;height:100%;width:100%;background:rgba(0,0,0,0.7)'>
      <div style='border:0px solid red;width:80%;margin:auto;color:white;font-size:21px;margin-top:150px;' id='moveMobile' class='centerTitleAdjust'><h1>A new way to assess digital talent</h1></div>
  </div>
  <!--center title is only for IE-->

</div>

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <img src='/images/db1.png'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Evaluative Skills Assessments</h2>
      <h3>We’ve developed job specific non technical skills assessments that
        organizations can deploy in their talent acquisition process to give candidates
        the opportunity to showcase their skills and give organizations a better understanding
        of a candidates true capabilities.
      </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
        <img src='/images/assess_question.png'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Realistic Job Situations</h2>
      <h3>Our assessments are designed to mimic scenarios candidates
        will face on the job they’re applying for and provide a realistic
        preview of what the job will actually be like while simultaneously helping
        organizations increase fairness in the hiring process, understand the most difficult
        to evaluate of skills and ultimately make better hiring decisions.
      </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <img src='/images/assess_question.png'/ >
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:80%;max-height:98%;border:2px solid lightgray;border-radius:3px;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <img src='/images/radial.png' >

    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Instant, On Demand Deployment</h2>
      <h3>Hexient is designed to minimize friction and maximize results and convenience for HR and IT practitioners. Simple sign up, no installation, no training, and an intuitive implementation process that will have you making better hiring decisions immediately

          </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
        <img src='/images/assess_status.png' >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Personalized Job ID's</h2>
      <h3>Different positions within different organizations require different types of talent, there is no one size fits all when it comes to candidate-organization match. We enable hiring managers and recruiters to easily identify the specific non technical skills needed for the position they're hiring for based on a variety of performance metrics specific to your organization that can be used to improve the quality of hire

          </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <img src='/images/assess_status.png' >
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
        <img src='/images/topSkills.png' >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Data Driven Talent Decisions</h2>
      <h3>Once candidates complete the assessment, hiring managers and recruiters will receive a simple, intuitive, and comprehensive competency report highlighting the candidates competency levels for non technical skills. We deliver real time actionable data to inform critical talent decisions.

          </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter' style='min-height:200px;'>
  <div class='IE_Correction' style='margin-top:70px;'></div>
  <div class='container getStart_learnMore' style='width:50%'>
    <a href='/Sign_Up/index.php'><div class='button getStart flexCenter' style='float:left'>Get Started</div></a>
    <a href='mailto:support@hexientsolutions.com?subject='><div class='button learnMore flexCenter' style='float:right'>Learn More</div></a>
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
