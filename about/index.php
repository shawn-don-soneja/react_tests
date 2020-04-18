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
  <style>
  @keyframes fadeIn{
      0%{opacity:0;}
      100%{opacity:1;}
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
      <div class='container' id='animateMe' style='
      width:70%;margin-top:170px;
      animation:fadeIn 0.7s 0s ease-in forwards;opacity:0;color:rgb(255,0,0);
      '>
      <h1>Cultivating high performing talent in the digital world</h1></div>
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
    <div class='itemSmall background flexCenter'>
      <img src='/github/images/about_page_visual_climb.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>How we assess and evaluate talent is broken
</h2>
      <h3>How we assess and evaluate talent determines how we select, allocate and operationalize talent. Today, it’s overwhelmingly the case that talent is underselected, misallocated and inefficiently operationalized. Our traditional conception of what constitutes “talent” is often narrowly defined and flawed, or we just aren’t looking at the right measures altogether.
</h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
        <img src='/github/images/about_page_visual_building.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Talent is multi-faceted</h2>
      <h3>Our belief is that talent is idiosyncratic, and people are generally uniquely excellent in ways that others aren’t. Each person possesses a unique combination of skills, traits, and abilities that collide and interact in a highly complex way to determine who they are and what they do.
</h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <img src='/github/images/about_page_visual_building.png' style='border:0px solid gray'/ >
    </div>
  </div>
</div>

<!-- between rows 2 & 3 -->

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <img src='/github/images/about_page_visual_desk.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Move beyond the resume </h2>
      <h3>
        If employers utilize better mechanisms are to cheaply certify quality talent, filter people by skill and assess top talent,
        they can discover large groups of talent that have been overlooked by traditional measures.
        The future of hiring goes beyond relying only on credentials and will also include hiring for skills.
      </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<div class='row flexCenter'>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter twoSpaceAlternate' style=''>
        <img src='/github/images/about_page_visual_bulb.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Personnel decisions shouldn’t be personal </h2>
      <h3>Talent is infinitely complex, but our mental models of talent are reductively simple.
        There’s a better way to make talent decisions, one that isn’t based solely on biased and subjective human judgement.
        Evaluation systems should be standardized, consistent, and determined using a combination of human judgement and algorithmic
        decision making.
      </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
    <div class='itemSmall background flexCenter twoSpaceMain'>
      <img src='/github/images/about_page_visual_bulb.png' style='border:0px solid gray'/ >
    </div>
  </div>
</div>

<!--between rows 4 and 5 -->

<div class='row flexCenter'>
  <style>.twoSpaceContainer .itemSmall img{max-width:90%;max-height:98%;border:1px solid gray;}</style>
  <div class='twoSpaceContainer border autoMargin80'>
    <div class='itemSmall background flexCenter'>
      <img src='/github/images/about_page_visual_screen.png' style='border:0px solid gray'/ >
    </div>
    <div class='itemLarge background flexCenter'>
      <div class='container'>
      <h2>Talent Evaluation should improve over time </h2>
      <h3>
        The hiring process is something you can learn from every time. Both good and bad hiring decisions should be investigated,
        and the differences should be identified so companies can do more of what works and less of what doesn’t.
      </h3>
      </div>
      <div class='IE_Correction'><br><br><br></div>
    </div>
  </div>
</div>

<!-- end NEW CHANGES -->
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
