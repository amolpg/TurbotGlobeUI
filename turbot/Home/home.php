<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script src="../Scripts/jquery-1.8.0.min.js" ></script>
<script  type="text/javascript">



    $(document).ready(function () {
        var a = ("datastring");
       
        //        alert(['data']);
        //        alert(XMLHttpRequest.valueOf());
        $.ajax({
            url: 'http://turbotglobeserver.elasticbeanstalk.com/social/rest/activities/john.doe/@self',
            dataType: 'jsonp',
            success: function (jsonDataArr) {
                jsonDataArr = jsonDataArr;
                parseJSON(jsonDataArr);
            }
        });


        function parseJSON(jsonDataArr) {
            /*
            var htmlRetStr = "<a class='ttip_container' id='abc' href='#'>";
            htmlRetStr += "<span class='tooltip'>" + jsonDataArr.list[0].userId + ' has body color ' + jsonDataArr.list[0].body + ' and title ' + jsonDataArr.list[0].title + "</span>;"
            htmlRetStr += "<ul>";
            htmlRetStr += "<li>";
            htmlRetStr += jsonDataArr.list[0].userId + ' has updated body to ' + jsonDataArr.list[0].body + ' and title to ' + jsonDataArr.list[0].title;
            htmlRetStr += '</li></ul  >';
            htmlRetStr += "</a>";
            $("#frndUpdates").html(htmlRetStr);

            $('a.ttip_container').click(myclick);
            $('a.ttip_container').mouseout(mouseOut);

            
            */

            var jsonDataArr = [{ "filtered": true, "startIndex": 0, "totalResults": 1, "sorted": true, "list": [{ "id": "1", "userId": "john.doe", "body": "what a color!", "title": "yellow"}], "updatedSince": true, "itemsPerPage": 1 },
            { "filtered": true, "startIndex": 0, "totalResults": 1, "sorted": true, "list": [{ "id": "1", "userId": "james.gibbs", "body": "what a font!", "title": "green"}], "updatedSince": true, "itemsPerPage": 1}];


            var iCount;
            var htmlRetStr = "<h3 class='recurse_title'>Friends Updates</h3> ";

            // Counts from 0 through one less than the array length.
            for (iCount = 0; iCount < jsonDataArr.length; iCount++) {
                htmlRetStr += "<a class='ttip_container' href='#'>";
                htmlRetStr += "<span class='tooltip'>" + jsonDataArr[iCount].list[0].userId + ' has body color ' + jsonDataArr[iCount].list[0].body + ' and title ' + jsonDataArr[iCount].list[0].title + "</span>;"
                htmlRetStr += "<ul>";
                htmlRetStr += "<li>";
                htmlRetStr += jsonDataArr[iCount].list[0].userId + ' has updated body to ' + jsonDataArr[iCount].list[0].body + ' and title to ' + jsonDataArr[iCount].list[0].title;
                htmlRetStr += '</li></ul  >';
                if (iCount == 3)
                    return false;
            }
            $("#frndUpdates").html(htmlRetStr);

            $('a.ttip_container').click(myclick);
            $('a.ttip_container').mouseout(mouseOut);


        }

        /*----------------------------------------------------------------------------------------------------------------------------------------*/
        //Show tooltip on mouseclick

        function myclick(e) {

            var mousex = e.pageX + 20;
            //fetch X coodrinates of pointer
            var mousey = e.pageY + 20;
            //fetch Y coordinates of pointer
            ttip = $(this).find('.tooltip');
            ttip.show();
            var tipWidth = ttip.width();
            //get width of tooltip
            var tipHeight = ttip.height();
            //get height of tooltip
            //Distance of element from the right edge of viewport
            var tipX = $(window).width() - (mousex + tipWidth);
            //Distance of element from the bottom of viewport
            var tipY = $(window).height() - (mousey + tipHeight);
            if (tipX < 20) {
                //If tooltip exceeds the X coordinate of viewport
                mousex = e.pageX - tipWidth - 20;
            }
            if (tipY < 20) {
                //If tooltip exceeds the Y coordinate of viewport
                mousey = e.pageY - tipHeight - 20;
            }
            //Absolute position the tooltip according to mouse position
            ttip.css({ top: mousey, left: mousex });
        }

        //Hide tooltip on mouseout event
        function mouseOut(e) {
            ttip = $(this).find('.tooltip');
            ttip.hide();
        }

    });


   
   
</script> 





<head runat="server">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../Styles/main.css" />
	<link rel="stylesheet" type="text/css" href="../Styles/Turbot.css" />


    
</head>
<body>
    <form id="form1" runat="server" style=" height: 100%;">
	 <header>
    </header>
       <!--
    <div id="headerDiv" style="">
        <img alt="" src="../images/logo1.jpg" style="width:25%;height:100%;text-align:left;" />     
        
    </div>
-->
    <table class="tabMain">
        <tr>
            <td style="width:20%;height:100%;margin:0px;text-align:left;">
                 <label id="lblDescription" title="Description" ></label>
            </td>
            <td style="width:60%;height:20%;vertical-align:top;">
                <img alt="" src="../images/DSCN0381 - Copy.JPG" style="height:100px;width:100%; text-align:center;" />  
            </td>
            <td style="width:20%;height:100%;">
                <select id="Select1" name="D1" style="width:100%;text-align:right; vertical-align:middle;margin-right:0;" >
                    <option></option>
                </select>
            </td>
        </tr>
    </table>
   
   
         <table cellspacing="10" cellpadding="10" class="tabInner" style="table-layout:fixed;">
             
        
        <tr style="width:100%" >
            <td  style="width:20%;height:50%;vertical-align :top;">Menu
                <table>
                    <tr>
                        <td style="border-color:transparent;" class="tdCls"> <a id="trlActivity"  href="../Activities/travelReview.php">Add Travel Actvities</a></td>
                    </tr>
                   
                </table>
            
            
            </td>
            <td  style="width:60%;vertical-align:top;display:table-cell;" rowspan="2";>Updates for the User</td>
            <td  style="width:20%;vertical-align:top;" rowspan="2" id="frndUpdates"></td>
         </tr>
       <tr> 
            <td style="width:20%;height:50%;vertical-align:top;text-align:left; ">User Offers
            </td>
            
       </tr>


       


        
    </table>
       
    </form>
    
      
</body>
</html>

