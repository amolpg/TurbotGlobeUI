<?php?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title></title>
  <!--<link rel="stylesheet" type="text/css" href="../Styles/Turbot.css" />-->
</head>
<body>
<img src="../images/IMG_3831.JPG" style="background-attachment:fixed;height:100%;background-size:100% auto;
-webkit-background-size:100% auto;-moz-background-size: 100% auto; -o-background-size: 100% auto;
 width:100%; top: 0;left: 0;margin: 0;padding: 0;min-width:1024;position: absolute;z-index:-12000;"/>
    <form id="loginForm" runat="server" style="height:100%;">
     <div>
    
        <table style="width:60%;height:80%;margin-left:20%;margin-right:20%;table-layout:fixed; " >
            
            <tr>               
                 <td style="width:70%;">
                    <img src="" id="Rotating1" style="width:100%;height:300px; text-align:center;"/>
                    <DIV id="imgText" style="position:absolute;margin-top:-2%;  height:25px ;">
                        <center>
                            <font color="White" size="+1">
                            A journey of a thousand miles must begin with a single step.
                            </font>
                        </center>
                    </DIV>

                 </td>
                 </tr>
                 <tr>
               
                <td style="margin-left:0px;margin-top:0px;width:70%;background-color:AppWorkspace;border:1px solid black;
   opacity:0.4;" id="signUptd" >
                <center>
                    <table style="margin-left:0px;width:60%;text-align:center;opacity:1;font-weight:bold;color:#000000;">
                        <tr>
                            <td>Login Name:</td>
                            <td style="text-align:left;"><input id="username" type="text" value="Enter Login Name" style="width:200px;"/></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td style="text-align:left;"><input id="password" type="password" value="Enter Password" style="width:200px;"/>
                            <a id="a" title=""  style="vertical-align:text-top;" >forgot password?</a>
                                    </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <img src="../images/signup6.jpg" id="submit" style=""/>
                                <!--input id="submit" type="button" value="button" /-->
                                
                            </td>
                        </tr>
                    </table>
                    </center>
                    
                </td>
            </tr>
           
        </table>
    
    </div>
    </form>
</body>
<?php
echo '<script src="../Scripts/jquery-1.8.0.min.js" ></script>';
echo '<script type="text/javascript">';

    //Image rotation code..

    var ImageArr1 = new Array("../images/DSCN0381%20-%20Copy.JPG", "../images/DSCN0383%20-%20Copy.JPG", "../images/DSCN0477%20-%20Copy.JPG");
    var ImageHolder1 = document.getElementById('Rotating1');
    function RotateImages(whichHolder, Start) {
        var a = eval("ImageArr" + whichHolder);
        var b = eval("ImageHolder" + whichHolder);
        if (Start >= a.length)
            Start = 0;
        b.src = a[Start];
        window.setTimeout("RotateImages(" + whichHolder + "," + (Start + 1) + ")", 1500);
    }

    RotateImages(1, 0);


    //User authentication.

    $("#submit").click(function () {

        var username = $("#username").val();
        var password = $("#password").val();
        var datastring = 'username=' + username + '&password= ' + password;
        $.ajax({
            type: "POST",
            url: 'login4.aspx',
            data: datastring,
            error: function () {
                alert("Data Error");
            },
            success: function (data) {
               window.location.replace("Test.aspx ");
            }
        });
    });

   //change Opacity

   $("#signUptd").mouseover()
   {
       alert('mouseover');
   }

   $("signUptd").mouseout(){
   
        alert('mouseout');
   }


  
echo '</script>';


?>


