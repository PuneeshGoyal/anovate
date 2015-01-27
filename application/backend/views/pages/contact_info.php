<div class="form5">
<form id="add" name="add" method="post" action="<?php echo BASEURL;?>pages/update_contact_information" enctype="multipart/form-data">
  <table width="890" border="0" cellpadding="5">
    <tr>
      <td align="right" class="label_form" width="150px;">Contact Number: </td>
      <td width="700px"><input name="contact_number" type="text" class="input_text" value="<?php echo $resultset['contact_number'];?>"  />
        <br class="clear" /></td>
    </tr>
    <tr>
      <td align="right" class="label_form" width="150px;">Contact Email: </td>
      <td width="700px"><input name="contact_email" type="text" class="input_text" value="<?php echo $resultset['contact_email'];?>"  />
        <br class="clear" /></td>
    </tr>
    <tr>
      <td align="right" class="label_form" width="150px;">Address: </td>
      <td width="700px"><textarea name="contact_address" class="input_textarea" style="height:50px" ><?php echo $resultset['contact_address']; ?></textarea>
        <br class="clear" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div class="btn">
          <input class="button" name="submitbut" value="Save" type="submit" />
          
          <!--<a class="a_button" href="<?php echo base_url(); ?>page/manage_page">Cancel</a>--> 
          
        </div></td>
    </tr>
  </table>
</form>
