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
  <title>Hexient Solutions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" type = "text/css" href="main/style-update.css">
  <!--
  <link rel="stylesheet" href='/main/style_updated.css'/>
  -->
  <script src="/main/script_update.js"></script>



  <!-- STYLE -->

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

<div class='fullScreenDiv flexCenter '>
  <div class='container computer'>
    <div class='itemMid background flexCenter'>
      <div class='container' style='width:89%;border:0px solid red;'>
      <h1 style='animation:fadeIn 0.7s 0s ease-in forwards;opacity:0;color:rgb(255,0,0)'>Enabling a modernized digital workforce </h1>
      <h2 style='animation:fadeIn 0.9s 0.0s ease-in forwards;opacity:0;'>We build interactive non technical skills assessments that enable organizations to identify high performing talent for the digital world</h2>
      <a style='text-decoration:none;' href='/Sign_Up/index.php'><div class='getStarted pushTop' style='cursor:pointer'>Get Started</div></a>
      <div class='IE_Correction'><div style='margin-bottom:25%;'></div></div>
      </div>

    </div>
    <div class='itemMid background flexCenter'>
      <img src='images/laptop.png' height=''>
    </div>
  </div>
</div>


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


<div class='row' style='background:rgb(243,243,243)'>
  <h2 class='pushTop  title'>What are <span style='color:rgb(254,36,0)'>non technical skills</span></h2>
  <h3 class='subTitle'>Non technical skills are the learned skills that augment an individual's performance within a specific job. We’ve synthesized these into six skill categories</h3>
  <div class='flexCenter border autoMargin80 pushBottom'>
    <img src='images/firstVisual' width='100%' id='firstVisual_Home' style='margin-top:15px;'/>
  </div>
</div>

<div class='row'>
  <h2 style='width:100%;border:0px solid red;text-align:center;margin-top:40px;'>How It Works</h2>
  <div class='howItWorks border autoMargin80'>

    <div id='how1' class='item background flexCenter'>
      <div class='container'>
        <h2 >Create Job ID</h2>
        <i class='material-icons '>assignment_ind</i>
        <p>Design ideal candidate profiles for each job you hire for with our Job ID tool</p>
      </div>
      <div class='IE_Correction'><div style='margin-bottom:60px'></div></div>
    </div>
    <div id='how2' class='item background flexCenter'>
      <div class='container'>
        <h2>Assess Talent</h2>
        <i class='material-icons '>assessment</i>
        <p>Distribute assessments for candidates to take on their own time </p>
      </div>
      <div class='IE_Correction'><div style='margin-bottom:60px'></div></div>
    </div>
    <div id='how1' class='item background flexCenter'>
      <div class='container'>
        <h2>Receive Report</h2>
        <i class='material-icons '>library_books</i>
        <p>Once they finish, you'll get a fully personalized competency report</p>
      </div>
      <div class='IE_Correction'><div style='margin-bottom:60px'></div></div>
    </div>
    <div id='how2' class='item background flexCenter'>
      <div class='container'>
        <h2>Make Decisions</h2>
        <i class='material-icons '>how_to_reg</i>
        <p>Use the candidates competency report to inform critical decisions</p>
      </div>
      <div class='IE_Correction'><div style='margin-bottom:60px'></div></div>
    </div>
    <!--
    <div id='how3' class='item background'>Receive Report</div>
    <div id='how4' class='item background'>Assess Talent</div>
    -->
  </div>
</div>


<div class='row flexCenter'>
    <style>.twoSpaceContainer img{max-width:98%;max-height:98%;border:1px solid gray;}
    .spacer{width:100%;height:50px;}
    </style>
    <div class='spacer'></div>
    <div class='twoSpaceContainer border autoMargin80 ' style=''>
        <div class='itemMid flexCenter' style=''><img src='images/db1.png'/></div>
        <div class='itemMid midText flexCenter' style=''>
            <div class='container'>
              <h2>Better Decisions Across the Human Capital Supply Chain</h2>
              <h3>As technology continues to become central to how we work, the nature of work and how companies operate is constantly changing. The rapidity of this change requires companies and people to be incredibly adaptable to new technology and new working environments.</h3>
            </div>

        </div>
    </div>
    <div class='spacer'></div>
</div>

<div class='row' style='background:rgb(250,251,252);'>
  <h2 class='pushTop  title'>Drive <span style='color:rgb(254,36,0)'>Results</span></h2>
  <h3 class='subTitle'>Achieve Real Business Outcomes</h3>
  <div class='flexCenter border autoMargin80 pushBottom'>
    <img src='images/secondVisualNew.png' width='100%' style='margin-top:-5px;' id='firstVisual_Home'/>
  </div>
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
