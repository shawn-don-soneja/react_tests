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
    <title>About</title>
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
      #moveMobile{margin-top:105px !important;}
  }
  </style>

</head>



<body>
<?php
print($navBody);
?>
<!--this row needs a background-->
<div class='row flexCenter centerTitle' style='background:url("https://cdn.pixabay.com/photo/2016/02/19/11/19/office-1209640_960_720.jpg");background-size: cover;background-position: center;position:relative'>
  <div style='height:100%;width:100%;background:rgba(0,0,0,0.6)' class='IE_Correction'>
      <div class='container' style='width:70%;margin-top:170px'><h1>Cultivating high performing talent in the digital world</h1></div>
  </div>
  <style>

  </style>
  <div class='allBrowsersCover flexCenter' style='position:absolute;top:0;left:0;height:100%;width:100%;background:rgba(0,0,0,0.7)'>
      <div style='border:0px solid red;width:80%;margin:auto;color:white;font-size:21px;margin-top:150px;' id='moveMobile' class='centerTitleAdjust'><h1>Cultivating high performing talent in the digital world</h1></div>
  </div>
  <!--center title is only for IE-->

</div>



<!-- NEW CHANGES -->
<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter' style='border:0px solid gray'>
      <img src='/github/images/home_page_visual_people.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Hiring is hard!</h2>
      <h3>We have to use the limited amount of information we can gather about a person in a short amount of time to make a judgement about their ability to do a job well. To make matters worse, the sources of information we traditionally use are often imperfect, incomplete and don’t tell the whole story about a candidate. For teams and organizations looking for a better way to hire, there’s Hexient.</h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
        <img src='/github/images/home_page_visual_gears.png'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>We can do better</h2>
      <h3>Organizations make people related decisions everyday, and every one of those decisions can be improved with better information and research backed approaches to talent. Liberating access to previously unsurfaced information about talent can help companies realize untapped value and position talent operations as a source of competitive advantage. </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <img src='/github/images/home_page_visual_gears.png'/ >
    </div>
  </div>
</div>


<!-- end NEW CHANGES -->

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <i class="material-icons" style='font-size:125px;color:rgb(255,0,0)'>important_devices</i>
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Work & Technology is constantly changing</h2>
      <h3>As technology continues to become central to how we work, the nature of work and how companies operate is constantly changing. The rapidity of this change requires companies and people to be incredibly adaptable to new technology and new working environments</h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<style>.lessOpaqueBlack{color:rgba(0,0,0,0.7);}</style>
<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
      <i class="material-icons lessOpaqueBlack" style='font-size:125px;'>broken_image</i>
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>The Fragility of Talent</h2>
      <h3>Many companies lack the talent mechanisms to keep up with the rate and significance of this change, and so as the pace of change continues to accelerate, people are becoming increasingly more susceptible to an inability to evolve with evolving technology. </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <i class="material-icons lessOpaqueBlack" style='font-size:125px;'>broken_image</i>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <i class="material-icons" style='font-size:125px;color:rgb(255,0,0)'>lock</i>
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Less fragile, more adaptable talent</h2>
      <h3>The digital world is going to value specific types of talent with a unique combination of skills: People with strong technical skills will be valued for their ability to align themselves with new and emerging technologies. Additionally, non technical skills will be a key point of individual value creation in a world where technology is continuously creating value in areas where only people have previously created value
          </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
      <i class="material-icons lessOpaqueBlack" style='font-size:125px;'>transfer_within_a_station</i>
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>High Performing Digital Talent</h2>
      <h3>High performing digital talent is adaptable talent with the skills that complement, enable and augment technology. Conversely, great technology will be that which complements, enables and augments human capability. Great work and great companies in the digital world will be built at the intersection of high performing digital talent and technology.
          </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <i class="material-icons lessOpaqueBlack" style='font-size:125px;'>transfer_within_a_station</i>
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
