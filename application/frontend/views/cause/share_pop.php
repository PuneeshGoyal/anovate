<?php

$data = $this->start_cause_model->getIndividualcause($id);
$dataset = $this->start_cause_model->getcausedatabyslug($data["slug"]);

$i=0;foreach($dataset['causeimages'] as $key=>$val){
	$array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
	$ext = end(explode('.',$val));
	if(in_array($ext,$array))
	{
		if($i==0){
	  		$img = base_url().'cause_upload_images/thumbnail/'.$val.'';
		}
	}
	$i++;
}

$title = urlencode($data["title"]);
$url = base_url()."cause/view/".$id; 
$summary = urlencode($data['summary']);
$image = urlencode($img);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta property="og:title" content="<?php echo $data["title"]; ?>" />
<meta property="og:description" content="<?php echo $data['summary']; ?>" />
<meta property="og:image" content="<?php echo $img; ?>"/>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Crowdcauses" />
<meta property="fb:app_id" content="736788853060365" />

<meta name="twitter:site" content="<?php echo base_url();?>">
<meta name="twitter:title" content="<?php echo $data["title"]; ?>">
<meta name="twitter:description" content="<?php echo $summary; ?>"
<meta name="twitter:creator" content="<?php echo base_url();?>">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<?php echo $img; ?>">
<meta content="<?php echo $data['summary']; ?>" name="description" />

<title>Crowdcauses</title>

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
<script type="text/javascript" src="<?php echo base_url();?>share42/share42.js"></script>

</head>
<body>
<div class="first1" style="padding:10px;">
  <div class="pica1">
    <div class="pic_cntr1">
      <div class="imga1">
        <?php if(!empty($img)){?>
        <img src="<?php echo $img; ?>" alt="pic"><?php }?>
      </div>
      <div class="grey_txt lbl1"><?php echo urldecode($title); ?></div>
    </div>
  </div>
 
    <div class="share42init"
     data-url="<?php echo $url;?>"
     data-title="<?php echo $title; ?>"
     data-image="<?php echo $img; ?>" 
     data-description="<?php echo $summary; ?>"
     data-top1="110"
     data-top2="20"
     data-margin="70"> </div>
</div>
</body>
</html>
<script type="text/javascript">
jQuery.noConflict();
$('.invite_link').on('hidden.bs.modal', function (e) {
  $(this).removeData('bs.modal');
});
</script>