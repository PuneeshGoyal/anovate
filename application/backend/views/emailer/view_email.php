<div class="viewform">
        <table width="850" border="0" cellpadding="5">
         <tr>
            <td align="right" class="label_form"><div class="view1">Subject :</div></td>
         	<td><div class="view2"><?php echo $resultset['subject']; ?></div></td>
         </tr>	
          <tr>
            <td align="right" class="label_form"><div class="view1">Message :</div></td>
         	<td><div class="view2"><?php echo wordwrap($resultset['message'],70,"<br>"); ?></div></td>
         </tr>
         <tr>
            <td align="right" class="label_form"><div class="view1">Mail to:</div></td>
         	<td><div class="view2"><?php echo $resultset['emailto']; ?></div></td>
         </tr>
          <tr>
            <td align="right" class="label_form"><div class="view1">Sent on :</div></td>
         	<td><div class="view2"><?php echo date("d M,Y",$resultset['time']); ?></div></td>
         </tr>
         </table>
         <div style="width:100%;margin-left:440px">
         <a class="a_button" href="<?php echo BASEURL;?>emailer/email_history">Close</a>
        </div>
     