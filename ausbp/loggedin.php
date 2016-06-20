<?php
require 'core.inc.php';
require 'connect.inc.php';
//echo 'you are logged IN.<a href="logout.php" >Log out.</a><br>';
  $field = 'firstname';
  $sfield = 'surname';
  $efield = 'email_id';
  $dfield = 'dob';
  $isrc = 'cp' ;
  $dpfield = 'dp' ;
  $datefield = getuserfield($dfield);






//echo $http_referer;
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive product landing page.">

    <title>Landing Page &ndash; Layout Examples &ndash; Pure</title>








<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">




    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/main-grid.css">
    <!--<![endif]-->



    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/marketing.css">
    <!--<![endif]-->




<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">








</head>
<body>









<div class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href=""><?php echo getuserfield($field) ?></a>

        <ul>
            <li class="pure-menu-selected"><a href="#">Home</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </div>
</div>

<div class="splash-container">

        <img src= <?php echo getuserfield($isrc)?> height=600 width=1500>



</div>




 <div class="content-wrapper">
    <div class="content">
        <h2 class="content-head is-center"></h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-med-1-2 pure-u-lrg-1-4">

                <h3 class="content-subhead"> </h3>
                <p>

                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-med-1-2 pure-u-lrg-1-4">
                <h3 class="content-subhead"></h3>
                <p>

                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-med-1-2 pure-u-lrg-1-4">
                <h3 class="content-subhead"></h3>
                <p>

                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-med-1-2 pure-u-lrg-1-4">
                <h3 class="content-subhead"></h3>
                <p>

                </p>
            </div>
        </div>
    </div>

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-med-1-2 pure-u-lrg-2-5">
            <img class="pure-img-responsive" alt="File Icons" width="300" src=<?php echo getuserfield($dpfield)?>>
        </div>
        <div class="pure-u-1 pure-u-med-1-2 pure-u-lrg-3-5">

            <h2 class="content-head content-head-ribbon">Welcome ,<?php echo getuserfield($field) ?></h2>

            <h2 class="content-head content-head-ribbon">
                Profile <br>
                </h2>
            <h3 style="color:white;">
            <?php echo getuserfield($field) ?>&nbsp<?php echo getuserfield($sfield)?> <br><br>
            Email ID&nbsp: <?php echo getuserfield($efield) ?> <br><br>
            Date Of Birth&nbsp: <?php echo getuserfield($dfield) ?> <br><br>
           <!-- Age:  <?php echo date_diff(date_create('<?php echo getuserfield($dfield) ?>'), date_create('today'))->y ?> -->

            </h3>

        </div>
    </div>

    <div class="content">
        <h2 class="content-head is-center"></h2>

       /* <div class="pure-g">


            <div class="l-box-lrg pure-u-1 pure-u-med-3-5">
                <h4>Contact Us</h4>
                <p><b>
                    Sanket Prabhu :&nbsp&nbspsanketfunny92@gmail.com <br>
                    Vaibhav Shah&nbsp&nbsp:&nbsp shahvaibhav2205@gmail.com     <br>
                    Soham Patel&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsppsoham25@gmail.com        <br>
                </b></p>

            </div>
        </div> */

    </div>

    <div class="footer l-box is-center">

    </div>

</div>

<script src="http://yui.yahooapis.com/3.14.1/build/yui/yui.js"></script>
<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>





</body>
</html>
