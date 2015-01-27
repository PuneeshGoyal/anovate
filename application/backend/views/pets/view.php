<style>
.attachment-viewer-frame-preview-iframe {
	background-color: rgb(255, 255, 255);
	border-radius: 3px;
	border: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	height: 100%;
	opacity: 0;
	padding: 12px;
	width: 100%;
}
#controlbarBackButton{
	display:none !important;
}
#controlbarForwardButton{
	display:none !important;
}
</style>
<iframe src="http://docs.google.com/viewer?url=<?php echo $this->config->item("cause_upload_docs");?><?php echo $name;?>&embedded=true"
style="width:800px; height:700px " frameborder="0" scrolling="auto" id="embedURL"></iframe> 	