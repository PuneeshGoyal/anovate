<?php
$donate_amt='';
$summary='';
$data = array();
$dataset = array();

$data = $this->start_cause_model->getIndividualcause($id);
$dataset = $this->start_cause_model->getcausedatabyslug($data["slug"]);
foreach($dataset['causeimages'] as $key=>$val){
	$array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
	$ext = end(explode('.',$val));
	if(in_array($ext,$array)){ if($i==0){$img = base_url().'cause_upload_images/thumbnail/'.$val.'';}}
}
//debug($dataset);
//get guest user donation info
$supporter_amount=array();
$supporter_amount = $this->start_cause_model->get_guestuser_donation_info($row_id);

$donate_amt = $this->common->my_donate_amt($this->session->userdata("userid"),$id);
$user = $this->common->get_user_name($this->session->userdata("userid"),$this->session->userdata("user_type"));

if($user <> ""){$user = $user;}
else{$user='This user';}

if($supporter_amount <> ""){$donate_amt = $supporter_amount["amount"];}
else{$donate_amt = $donate_amt;}

$summary = $user." has made an $".$donate_amt." contribution to '".$data["title"]."' Join him to support this cause now!";
$url = base_url()."cause/share_cause/".$id."/".$row_id;
$image = urlencode($img);

$redirect = base_url()."cause/cause_detail/".$data["slug"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Crowd cause - <?php echo $data["title"]; ?></title>

 <!-- Place this data between the <head> tags of your website -->

<meta name="description" content="<?php echo $summary;?>." />
<meta name="image" content="<?php echo $img; ?>" />
<!-- Open Graph data -->
<meta property="og:title" content="Crowd cause - <?php echo $data["title"]; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $url;?>" />
<meta property="og:image" content="<?php echo $img; ?>"/>
<meta property="og:description" content="<?php echo $summary; ?>" />
<meta property="og:site_name" content="<?php echo base_url();?>, i.e. Crowd cause" />

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@TestingSlinfy">
<meta name="twitter:creator" content="@TestingSlinfy">
<meta name="twitter:url" content="<?php echo $url;?>">
<meta name="twitter:title" content="Crowd cause - <?php echo $data["title"]; ?>">
<meta name="twitter:description" content="<?php echo $summary;?>">
<meta name="twitter:image" content="<?php echo $img; ?>">




<style type="text/css">
@media (max-width: 300px) and (min-width:20px) {
.share42init {
	margin: 0 0px !important;
}
.share42 a {
	width: 47px !important;
}
.left_plug {
	width: 100% !important;
	margin: 10px 0 0 0px !important;
}
.first1 {
	width: 100% !important;
}
}
</style>

<!--medi query style sheet-->
<style>
.imga1 img {
	max-height: 336px;
	max-width: 98%;
}
.first1 {
	margin: 0 auto;
	padding: 10px;
	width: 69%;
	text-align: center;
}
.pica1 {
	margin: 0 auto;
	width: 100%;
}
.pic_cntr1 {
	border-radius: 10px;
	-webkit-border-radius: 10px;
	/*   box-shadow:0px 0px 10px #dcdcdc;*/
	max-width: 90%;
	padding: 10px;
	overflow: hidden;
	margin: 0 auto;/*float:left;*/
}
.grey_txt {
	float: left;
	font-family: "pakenham";
	font-size: 18px;
	color: black;
	line-height: 20px;
	text-align: justify;
	width: 100%;
	margin-top: 10px;
	padding: 4px 0px;
}
.lbl1 {
	padding: 5px 0px
}
.left_plug {
	float: left;
	margin: 10px 0 0 0;
	width: 100%;
	word-break: break-word;
	overflow: hidden;
}
</style>
<!--<script type="text/javascript" src="<?php echo base_url();?>share42/share42.js"></script>-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <script>function fbs_click() {
	u='<?php echo urldecode($url); ?>';
	t='<?php echo urldecode($data["title"]); ?>';
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
	}
</script>
</head>
<body>
<!--<div  class="custom_m_head" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>-->

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" id="myModalLabel"><?php echo ($data["title"]); ?></h4>
</div>
<div class="modal-body">
  <div class="first1" style="padding:10px;">
    <div class="pica1">
      <div class="pic_cntr1">
        <div class="imga1">
          <?php if(!empty($img)){?>
          <img width="177" height="120" src="<?php echo $img; ?>" alt="pic">
          <?php }?>
        </div>
        <!--  <div class="grey_txt lbl1"><?php echo ($summary); ?></div>--> 
      </div>

<a  target="_blank" title="Share on Facebook" onClick="window.open('http://www.facebook.com/sharer.php?m2w&s=100&p[url]=<?php echo $url?>&p[title]=<?php echo $title;?> &p[summary]=<?php echo $sum;?>&p[images][0]=<?php echo $img;?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false" data-count="fb" href="javascript:void(0);"  rel="nofollow"><img src="<?php echo base_url();?>images/facebook.png"/></a>
<a class="plus" target="_blank" title="Share on Twitter" onClick="window.open('https://twitter.com/intent/tweet?text=<?php echo $data["title"];?>&url=<?php echo $url;?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false" data-count="twi" href="javascript:void(0);"  rel="nofollow"><img src="<?php echo base_url();?>images/twitter.png"/></a>
<a class="gog" target="_blank" title="Share on Google+" onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false" data-count="gplus" href="javascript:void(0);"  rel="nofollow"><img src="<?php echo base_url();?>images/g+.png"/></a> 
      <!--<div style="margin-left:12px;"  class="share42init"
             data-url="<?php echo $url;?>"
             data-title="<?php //echo $title; ?>"
             data-image="<?php echo $img; ?>" 
             data-description="<?php echo $summary; ?>"
             data-top1="110"
             data-top2="20"
             data-margin="70"> </div>--> 
    </div>
  </div>
  <div class="modal-footer"> 
  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location.href='<?php echo $redirect;?>'">Back</button>
  </div>
</div>
</body>
</html>
