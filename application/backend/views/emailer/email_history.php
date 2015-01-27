<div style="margin-top: 20px;"></div>
<div class="down_category" style="margin-top:30px">
  <div class="head"> <span class="head_text"><?php echo $item; ?></span> 
    <!-- <div class="add"> <a href="<?php echo BASEURL;?>stores/add_plan"> <span class="add1"> <span class="head_text1" style="font-size:14px;"> <?php echo $item; ?></span> </span> </a></div>

          <div class="resetallpage"><a href="<?php echo base_url(); ?>stores/manage_plan">Reset</a></div>-->
    
    <div class="search">
      <?php

		  $search=$this->input->get("search");

		  ?>
      <form method="GET" action="<?php echo BASEURL;?>emailer/email_history" >
        <input type="text" placeholder="search" name="search" value="<?php echo ($search!='' && $search!='search')?$search:''; ?>" onfocus="if(this.value=='search'){this.value=''}" onblur="if(this.value==''){this.value='search'}"/>
        <input type="submit" value="Search" name="Submitbut" class="side_search"  />
      </form>
    </div>
  </div>
  <br/>
  <input name="done" type="hidden" value="send" />
  <table width="100%" cellspacing="0" cellpadding="0"  class="maintbl" >
    <tr class="fstrow"  >
      <td align="center" width="14%">Subject</td>
      <td align="center" width="14%">Message</td>
      <td align="center" width="14%">Mail to</td>
      <td align="center" width="14%">Time</td>
      <td align="center" width="14%">Action</td>
    </tr>
    <?php

			if(count($resultset)!=0){

			$z=0;

			foreach($resultset as $key=>$val)

			{

			?>
    <tr class="scndrow <?php echo $z%2 ? '' : 'alternate';?>">
      <td align='center'><?php echo $val['subject']; ?></td>
      <td align='center'><?php echo substr($val['message'],0,50)."....."; ?></td>
      <td align='center'><?php echo $val['emailto']; ?></td>
      <td align='center'><?php echo date("d M,Y",$val['time']); ?></td>
      <?php

			if($this->common->show_hide_previleages('add'))

			{

	  	  	?>
      <td align='center'><a style="margin:0px 10px;" href="<?php echo BASEURL;?>emailer/view_email/<?php echo $val['id'];?>" title="Edit"> <img src="<?php echo BASEURL ?>images/view.png" /> </a></td>
      <?php

			}

	  	  	?>
    </tr>
    <?php

				$z++;

			}

			}

			else

			{

				?>
    <tr class="scndrow">
      <td colspan="7" align="center">No record found</td>
    </tr>
    <?php	

			}	



			?>
  </table>
  <?php

		    //$this->output->enable_profiler(TRUE);

            echo $this->pagination->create_links();

           ?>
  <div class="clear"></div>
</div>
