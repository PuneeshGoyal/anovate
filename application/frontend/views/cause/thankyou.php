<script>

/*$('a.btn').on('click', function(e) {
    var src = $(this).attr('data-src');
    var height = $(this).attr('data-height') || 800;
    var width = $(this).attr('data-width') || 800;
    $("#myModalxx iframe").attr({'src':src,'height': height, 'width': width});
});*/

</script>
<!--mid area-->

<!--<a data-toggle="modal"  data-target="#myModalxx" href="#" class="btn" id="openBtn" >Open modal</a>
<div class="modal fade" id="myModalxx" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <iframe width="680" height="500" frameborder="1" src="http://192.168.1.226/solitaire/demo/anovate/cause/cause_detail/suman-ths-ash"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>-->
<?php $id = $this->uri->segment(3);
$row_id = $this->uri->segment(4);
?>
<div class="container thnks_area" >
  <div class="col-md-8 left_thnx">
    <h1>Thank You!</h1>
    <P>Your submission has been received.</P>
    <!--    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>-->
    <div class="social_icon">
      <ul style="width:auto;">
        <li> <a  data-toggle="modal" href="<?php echo base_url();?>cause/share_cause/<?php echo $id;?>/<?php echo $row_id;?>" data-target="#m"> <img src="<?php echo base_url();?>images/share_icon.png" />share</a> </li>
        <!-- <li> <a class="invite_link"  target="_blank" title="Share with Twitter" href="http://twitter.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>&text=<?php echo $text;?>" data-lang="en" data-size="large" data-count="none" /> <img src="<?php echo base_url();?>images/icon2.png" alt="twitter"/> </a> </li>
          <li> <a href="https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>','<?php echo $text;?>','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;"> <img src="<?php echo base_url();?>images/icon3.png" alt="google"/></a> </li>-->
      </ul>
    </div>
  </div>
  <div class="col-md-4 right_thnx"> <img src="<?php echo base_url();?>images/thanks.png" alt="thnks_img"> </div>
</div>
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="progress"> 
        <div id="modal_data_preview" style="display:block">Please wait...</div> 
      </div>
    </div>
  </div>
</div>
<script>

/*$('#m').on('shown.bs.modal', function () {
 $("#modal_data_preview").show();
})
$('#m').on('loaded.bs.modal', function () {
	$("#modal_data_preview").hide();
})*/
</script>