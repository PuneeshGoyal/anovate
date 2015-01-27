<div class="form5">
        <form id="add" name="add" method="post" action="<?php echo BASEURL;?>emailer/send_email_to_recipients" enctype="multipart/form-data">
            <table width="850" border="0" cellpadding="5">
            <tr>
            <td align="right" class="label_form">Send to: </td>
            <td>
            <input type="checkbox" name="stores" <?php if(isset($resultset["stores"]) && $resultset["stores"]!="") echo "checked=checked";?> />All Stores
            <input type="checkbox" name="advertisers" <?php if(isset($resultset["advertisers"]) && $resultset["advertisers"]!="") echo "checked=checked";?>/>All Advertiser
            <input type="checkbox" name="users" <?php if(isset($resultset["users"]) && $resultset["users"]!="") echo "checked=checked";?> />All Users
            <input type="checkbox" name="newsletters" <?php if(isset($resultset["newsletters"]) && $resultset["newsletters"]!="") echo "checked=checked";?> />All Newsletters
            </td>
            </tr>
              <tr>                
                  <td align="right" class="label_form">Email Subject: </td>
                  <td><input name="subject" type="text" class="input_text" value="<?php if(isset($resultset["subject"])) echo $resultset["subject"];?>"  /></td>
              </tr>
              <tr>                
                  <td align="right" class="label_form">Email message: </td>
                  <td>
                  <textarea name="message" class="ckeditor">
                  <?php
				  if(isset($resultset["message"]))
				  {
				  echo $resultset["message"];
				  }
				  ?>
                  </textarea>
                  </td>
              </tr>
              <tr>
              <td>&nbsp;</td>
                <td>
                    <div class="btn">
                        <input class="button" name="submitbut" value="Save" type="submit" />
                        <a class="a_button" href="<?php echo base_url(); ?>stores/manage_plan">Cancel</a>
                    </div>
                </td>
              </tr>
            </table>
        </form>