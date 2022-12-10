<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CareBot-Profile</title>
        <link rel="stylesheet" href="css/profile.css">

    </head>
    <body>
        <?php include 'header.php'; ?>
        <br/><br/><br/><br/><br/>

        <?php
        include('includes/dbconfig.php');

        $ref_table = 'user';
        $key_child = '-NI2Qq7LZ2XkyfaGXzco';
        $userprofile = $database->getReference($ref_table)->getChild($key_child)->getValue();

        if ($userprofile > 0) {
            ?>
            <div class="profileDiv">
                <h1>Profile</h1>
                <form method="get" action="profile.php">
                    <table id="rightTbl" >
                        <tr>
                            <td><label class="lbl">USER ID</label></td>
                            <td><label class="lbl">GENDER</label></td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 20px;"><input readonly type="text" placeholder="Enter Your User ID" id="userID" name="userID" value="<?= $userprofile['userID']; ?>" /></td>
                            <td style="padding-bottom: 20px;"><input type="radio" id="male" name="gender" value="M" checked="true" disabled> <label class="rdlbl">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="female" name="gender" value="F" disabled> <label class="rdlbl">Female</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl">PASSWORD</label></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-bottom: 20px;"><input readonly type="password" value="****************" id="psd" name="psd" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl">FULL NAME</label></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-bottom: 20px;"><input readonly type="text" placeholder="Enter Your Full Name" id="fname" name="fname" value="<?= $userprofile['userName']; ?>"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl">EMAIL</label></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-bottom: 20px;"><input type="email" placeholder="Enter Your Email" id="email" name="email" value="<?= $userprofile['userEmail']; ?>" required/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label class="lbl">PHONE NUMBER</label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="phone" name="phone" placeholder="Enter Your Phone No" value="<?= $userprofile['userPhone']; ?>" required pattern="[0-9]+"/></td>
                        </tr>
                    </table>

                    <input class="registerbtn" value="Edit" type="submit" name="edit" >
                </form>
            </div>

            <?php
        }
        ?>

        <?php
        if (isset($_GET['edit'])) {
            $updateData = [
                'userEmail' => $_GET['email'],
                'userPhone' => $_GET['phone'],
            ];

            $ref_table = 'user/-NI2Qq7LZ2XkyfaGXzco';
            $updatequery = $database->getReference($ref_table)->update($updateData);

            echo '<script>alert("Profile updated successfully."); window.location.href="profile.php";</script>';
        }
        ?>
   
    </body>
</html>
