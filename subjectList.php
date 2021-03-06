<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="accordionContent.css" />
        <script src="accordion.js"></script>

    <?php
    if(session_id() == '') {
        session_start();
    }

    ?>

        <div id="logout">
            Welcome, <?php echo "{$_SESSION["myusername"]}"; ?>
            <form name="logout" method="post" action="logout.php">
                <input type="submit" name="Logout" value="Logout">
            </form>
        </div>

    <?php
    // Display correct header for Project
    switch ($_SESSION['myproject'])
    {

        case "OTIS" ?>
            <IMG src="logoOTIS_RGB-300x173.jpg"
                 alt="Mother to Baby"
                 style="width: 150px; float: left; margin-left: 10px; margin-bottom: 8px; margin-right: 50px" />
            <?php break;
        case "RSG" ?>
            <IMG src="logoRSG-outline.png"
                 alt="Ready, Set, Go"
                 style="width: 150px; float: left; margin-left: 10px; margin-bottom: 8px; margin-right: 50px" />
            <?php break;
        case "CTIS" ?>
             <IMG src="logoCTIS.jpg"
                  alt="Mother to Baby California"
                  style="width: 150px; float: left; margin-left: 10px; margin-bottom: 8px; margin-right: 50px" />
             <?php break;

    }//end switch
    ?>

        <br />
         <h2>List of Nutrition Assessment Participants from <?php echo "{$_SESSION['myproject']}" ?> </h2>
         <br /><br />
    </head>
<!-- END HEADER -------------------------------------------------------------------------------------------------->

    <body>

        <?php
            require_once('./querys.php');

            /**Subject List output here (in Tables).**/

            require_once('./subjects.php');

        ?>

<br />
<br />

    </body>
    <footer>
         <br /><br />
    </footer>

</html>
~
