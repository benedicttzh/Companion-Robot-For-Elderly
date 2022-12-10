<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CareBot-Home</title>

        <link rel="stylesheet" href="css/home.css">

    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <br/><br/><br/><br/><br/><br />

        <div class="float-container">

            <div class="float-child left">
                <h1>Live View</h1>
                <?php
                if (isset($_GET['humanBtn'])) {
                    echo exec("sudo kill $(pgrep -f camera.py)");
                    exec("sudo python /var/www/html/human_follower.py");
                    echo '<iframe src="http://192.168.43.188:2204/" frameBorder="1" scrolling="no" width="1000px" height="700px"></iframe>';
                } else {
                    echo exec("sudo kill $(pgrep -f human_follower.py)");
                    echo exec("sudo python /var/www/html/py/camera.py");
                    echo '<iframe src="http://192.168.43.188:8000/" frameBorder="1" scrolling="no" width="1000px" height="700px"></iframe>';
                }
                ?>                
            </div>

            <div class="float-child right">           
                <span id="txtlbl">Movement Mode</span>
                <div class="tooltip"><img id="ttimg" src="img/information.png" />
                    <span class="tooltiptext">
                        <b>Remote Movement Control</b><br/>
                        Control through button below OR keyboard:<br/>
                        ↑ - Forward&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ↓ - Backward<br/>
                        ← - Left&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        → - Right<br/>
                        Spacebar - Stop<br/><br/>
                        <b>Human Following Mode</b><br/>
                        The robot will automatically track human.
                    </span>
                </div>

                <br />  
                <form method="get">
                    <input type="submit" id="remoteMovement" name="remoteBtn" value="Remote Movement">&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="humanFollowing" name="humanBtn" value="Human Following">
                </form>                

                <table id="ctrltbl" border="0">
                    <tr>
                        <td colspan="3">
                            <a href="home.php?move=f"><img class="icn" src="img/arrow_forward.png"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="home.php?move=l"><img class="icn" src="img/arrow_left.png"/></a></td>
                        <td><a href="home.php?move=s"><img id="stopicn" class="icn" src="img/arrow_stop.png"/></a></td>
                        <td><a href="home.php?move=r"><img class="icn" src="img/arrow_right.png"/></a></td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="home.php?move=b"><img class="icn" src="img/arrow_backward.png"/></a></td>
                    </tr>
                </table>

            </div>

        </div>

        <?php
        if (isset($_GET['move'])) {
            switch ($_GET['move']) {
                case "f":
                    echo exec("sudo python /var/www/html/py/forward.py");
                    break;
                case "l":
                    echo exec("sudo python /var/www/html/py/left.py");
                    break;
                case "r":
                    echo exec("sudo python /var/www/html/py/right.py");
                    break;
                case "b":
                    echo exec("sudo python /var/www/html/py/backward.py");
                    break;
                case "s":
                    echo exec("sudo python /var/www/html/py/stop.py");
                    break;
            }
        }

        ?>

        <script>
            window.onkeydown = function (event) {
                if (event.which === 38) {
                    window.location.href = "home.php?move=f";
                } else if (event.which === 40) {
                    window.location.href = "home.php?move=b";
                } else if (event.which === 37) {
                    window.location.href = "home.php?move=l";
                } else if (event.which === 39) {
                    window.location.href = "home.php?move=r";
                } else if (event.which === 32) {
                    window.location.href = "home.php?move=s";
                }
            }
            
            if (screen.width <= 700) {
                window.location.href = "mobileView.php";
            }
        </script>
    </body>
</html>
