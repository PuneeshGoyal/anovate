<?php
$slug = '';
$id = '';
$slug = $this->uri->segment(3);
$id = $this->start_cause_model->get_cause_id_byslug($slug);
$userid = $this->session->userdata("userid");
$user_type = $this->session->userdata("user_type");
$username = $this->common->get_user_name($userid, $user_type);

//for sharing
$data = $this->start_cause_model->getIndividualcause($id);
$dataset = $this->start_cause_model->getcausedatabyslug($data["slug"]);
//debug($dataset);
$i = 0;
foreach ($dataset['causeimages'] as $key => $val) {
    $array = array('gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
    $ext = end(explode('.', $val));
    if (in_array(strtolower($ext), $array)) {
        if ($i == 0) {
            $img = base_url() . 'cause_upload_images/thumbnail/' . $val . '';
        }
    }
    $i++;
}

$title = urlencode($data["title"]);
//$url = urlencode(base_url()."cause/cause_detail/".$data["slug"]);
$summary = urlencode($data['summary']);
$image = urlencode($img);

$url = base_url() . 'cause/view/' . $id;
$text = stripcslashes($summary);

$username = $this->session->userdata("name");
$email = $this->session->userdata("email");
$user_type = $this->session->userdata("user_type");
$address = $this->session->userdata("address");
$userid = $this->session->userdata("userid");
$phone_number = $this->session->userdata("phone_number");
$gender = $this->session->userdata("gender");
$temp_age = $this->session->userdata("d_o_b");
//$age = intval((time() - strtotime($this->session->userdata("d_o_b")))/31556926);
if ($temp_age <> "") {
    $age = $this->common->get_age($temp_age);
}
!empty($username) ? $username : "";
!empty($email) ? $email : "";
!empty($user_type) ? $user_type : "";
!empty($address) ? $address : "";
!empty($userid) ? $userid : "";
!empty($gender) ? $gender : "";
!empty($phone_number) ? $phone_number : "";
!empty($age) ? $age : "";

if ($gender == "m") {
    $mchecked = 'checked="checked"';
    $fchecked = '';
}
if ($gender == "f") {
    $fchecked = 'checked="checked"';
    $mchecked = '';
}
?>
<!--<div id="show_disable_session" style="width:100%; height:100%; background:rgba(0,0,0,0.6); position:absolute; left:0; top:0">weqfwef</div>-->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
<script defer src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script> 
<style>
    .mnt_f img, .mnt_g img, .mnt_t img {
        margin-top: 0 !important;
    }
    .es-carousel ul {
        display: block;
    }
    .hel1 {
        float: left;
        min-width: 80px;
    }
    .h-time {
        float: left;
        width: 150px;
    }
    .h-time > p {
        font-size: 12px !important;
        padding: 2px 0 0;
    }
    .social_icon ul {
        margin: 0 auto;
        width: 147px;
        padding: 0;
    }
    #carousel_ab li {
        max-width: 150px;
        opacity:1 !important;
        margin:0 10px 0 0 !important;
    }
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script>function fbs_click() {
        u = '<?php echo urldecode($url); ?>';
        t = '<?php echo urldecode($title); ?>';
        window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t), 'sharer', 'toolbar=0,status=0,width=626,height=436');
        return false;
    }
</script>
<!--mid area-->
<div class="container"> 
    <!-- Causes Main Container Start -->
    <div class="row custom-row">
        <div class="col-md-12 col-xs-12 col-sm-12 heading cause_hding">
            <h3 class="col-md-2 col-sm-2 offset-md-10"> <?php echo strlen($dataset['title']) > 200 ? substr(ucfirst($dataset['title']), 0, 200) . ".." : ucfirst($dataset['title']); ?> </h3>
            <!-- HTML to write --> 
            <!--<span> <a class="tooltip_tick ribbon" href="#" data-toggle="tooltip" data-original-title="Ribbon Text">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Identity verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Location verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Documents verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Situation verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="On-site checked">Tooltip</a> </span>--> 
        </div>

    </div>
    <div class="row custom_row">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="description"><span>By:</span>
                <p><?php echo ucfirst($this->common->get_user_name($dataset['user_id'], $dataset['user_type'])); ?></p>
                <p>Tagline:
                    <?php
                    $tagline = explode(",", $dataset['tagline']);
                    echo stripcslashes($this->start_cause_model->get_cause_tags($tagline));
                    ?>
                </p>
            </div>
            <div>
                <?php if ($dataset["youtube_link"] <> "") { ?>
                    <iframe id="ytplayer" type="text/html" class="iframe_res" title="YouTube video player" width="696" height="400" src="http://www.youtube.com/embed/<?php echo $this->common->get_video_id_from_url($dataset["youtube_link"]); ?>" frameborder="0"></iframe>
                <?php } ?>

            </div>

            <!--slider starts-->
            <div class="content cause_sevenslide">
                <div class="col-md-12 none_p">
                    <div id="container" style="margin-top: 25px;">
                        <section class="slider">
                            <div id="slider_ab" class="flexslider">
                                <ul class="slides">
                                    <?php
                                    foreach ($dataset['causeimages'] as $key => $val) {
                                        $array = array('gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
                                        $ext = end(explode('.', $val));
                                        if (in_array(strtolower($ext), $array)) {
                                            ?>
                                               <li class="main_image" style="background-image:url(<?php echo base_url(); ?>cause_upload_images/<?php echo $val; ?>); background-size:contain; height:450px;background-position: center center; background-repeat:no-repeat;border: 2px solid gray;background-color: #000;"> <!--<img src="<?php echo base_url(); ?>cause_upload_images/<?php echo $val; ?>" width="" height="300"/>--> </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div id="carousel_ab" class="flexslider">
                                <ul class="slides">
                                    <?php
                                    foreach ($dataset['causeimages'] as $key => $val) {
                                        $array = array('gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG');
                                        $ext = end(explode('.', $val));
                                        if (in_array(strtolower($ext), $array)) {
                                            ?>
                                             <li class="thumb_hover" data-src="<?php echo $val; ?>" style="background-image:url(<?php echo base_url(); ?>cause_upload_images/thumbnail/<?php echo $val; ?>); background-size:cover; height:100px;background-position: center center; background-repeat:no-repeat;border: 2px solid gray;background-color: #428bca; cursor:pointer"> <!--<img  src="<?php echo base_url(); ?>cause_upload_images/thumbnail/<?php echo $val; ?>" width="127" height="85"/>--> </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </section>
                        <!-- template --> 
                        <!-- end of template --> 
                    </div>
                </div>
            </div>
            <div class="buttons">
                <ul>
                    <?php
                    //get cause informatin 
                    $val = '';
                    $btn = '';
                    $btn1 = '';
                    $btn2 = '';
                    $btn3 = '';
                    $val = $this->start_cause_model->getIndividualcause($id);
                    if ($val["status"] == 3) {
                        $btn = '<a href="javascript:void(0);" style="pointer-events:none;" >Closed</a>';
                    } else {
                        if ($val["is_fundraise"] == 1) {
                            $btn1 = '<a href="javascript:void(0);" data-target="#myModal9" data-toggle="modal">Donate now</a>';
                        }
                        if ($val["is_petition"] == 1) {
                            $btn2 = '<a href="javascript:void(0);" data-target="#myModal7" data-toggle="modal">Sign it!</a>';
                        }
                        if ($val["is_volunteer"] == 1) {
                            $btn3 = '<a href="javascript:void(0);" data-target="#myModal8" data-toggle="modal">Support Now</a>';
                        }
                    }
					if(!empty($btn)){
						echo '<li class="link_bttn">'.$btn.'</li>';
					}
                    if ($dataset["is_fundraise"] == 1) {
                        ?>
                        <li class="link_bttn"><?php echo $btn1; ?></li>
                    <?php } ?>

                    <?php if ($dataset["is_volunteer"] == 1) { ?>
                        <li class="link_bttn"><?php echo $btn3; ?></li>
                    <?php } ?>

                    <?php if ($dataset["is_petition"] == 1) { ?>
                        <li class="link_bttn"><?php echo $btn2; ?></li>
                    <?php } ?>

                </ul>
            </div>
            <div class="custom-row">
                <div class="col-md-12 story_heading m_head"> <!-- brahm -->
                    <h3 class="col-md-2 offset-md-10">Summary headlines</h3>
                </div>
                <div style="clear:both;"></div>
                <div class="cause3_story">
                    <p><?php echo stripcslashes($dataset['summary']); ?></p>
                </div>
                <div class="col-md-12 story_heading">
                    <h3 class="col-md-2 offset-md-10">Story</h3>
                </div>
            </div>
            <div class="story">
                <p><?php echo stripcslashes($dataset['detailed_stories']); ?></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="social_icon">
                <ul style="width:200px;">
                    <li>
                        <a  style="text-indent:-9999px; margin-right:20px;" rel="nofollow" href="http://www.facebook.com/share.php??s=100&p[title]=<?php echo urldecode($title); ?>&p[summary]=<?php echo strip_tags($text); ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $image; ?>']asdfa[/a]" onclick="return fbs_click()" target="_blank">
                            <img src="<?php echo base_url(); ?>images/facebook.png" />
                        </a>
                        <a class="plus" target="_blank" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urldecode($text); ?>&url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                return false" data-count="twi" href="#"  rel="nofollow">
                            <img src="<?php echo base_url(); ?>images/twitter.png" />
                        </a>
                        <a class="gog" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                return false" data-count="gplus" href="#"  rel="nofollow">
                            <img src="<?php echo base_url(); ?>images/g+.png" />
                        </a>
                        <!--<div class="share42init"
                         data-url="<?php echo $url; ?>"
                         data-title="<?php echo urldecode($title); ?>"
                         data-image="<?php echo $image; ?>" 
                         data-description="<?php echo urldecode($text); ?>"
                         data-top1="110"
                         data-top2="20"
                         data-margin="70"> </div>-->
                    </li>
                </ul>
            </div>
            <?php
            //get cause informatin 
            $val = '';
            $btn = '';
            $btn1 = '';
            $btn2 = '';
            $btn3 = '';
            $val = $this->start_cause_model->getIndividualcause($id);
            $fninfo = array();
            $closetime = $val['activated_time'] + ($val['duration'] * 24 * 60 * 60);

            if ($val["status"] == 3) {
                $btn = '<a href="javascript:void(0);" style="pointer-events:none;" >Closed</a>';
            } else {
                if ($val["is_fundraise"] == 1) {
                    $btn1 = '<a href="javascript:void(0);" data-target="#myModal9" data-toggle="modal">Donate now</a>';
                }
                if ($val["is_petition"] == 1) {
                    $btn2 = '<a href="javascript:void(0);" data-target="#myModal7" data-toggle="modal">Sign it!</a>';
                }
                if ($val["is_volunteer"] == 1) {
                    $btn3 = '<a href="javascript:void(0);" data-target="#myModal8" data-toggle="modal">Support Now</a>';
                }
            }
            ?>
            <!--FUNDRASING INFORMATION STARTS-->
            <?php if ($val["is_fundraise"] == 1) { ?>
                <div class="fundraising_main">
                    <h1>FUNDRAISING</h1>
                    <strong><span data-time="<?php echo $closetime; ?>" class="kkcount-down"></span></strong>
                    <div id="red"></div>
                    <p>Target: <?php echo number_format($val["target_amount"]); ?></p>
                    <p>Current donation: <span id="el"><?php echo number_format($donation_data[0]["total_sum"], 2); ?></span></p>
                    <p>People donated: <?php echo $donation_data[0]["count"]; ?></p>
                    <p>Fund allocation: <span id="el"><?php echo $val["fund_allocation_information"]; ?></span></p>
                    <div class="donate_bttn" id="donate_bttn"><?php echo $btn . $btn1; ?></div>
                </div>
            <?php } ?>
            <!--FUNDRASING INFORMATION ENDS--> 

            <!--VOLUNTEER INFORMATION STARTS -->
            <?php if ($val["is_volunteer"] == 1) { ?>
                <div class="volunterring_main">
                    <h1>VOLUNTEERS</h1>
                    <strong><span data-time="<?php echo $closetime; ?>" class="kkcount-down"></span></strong>
                    <p>Date &amp; time of event</p>
                    <p>Start: <?php echo date('d/m/Y h:i a', $val["volunteer_start_date"]); ?></p>
                    <p>End: <?php echo date('d/m/Y h:i a', $val["volunteer_end_date"]); ?></p>
                    <p>Location: </p>
                    <p>Postal: <?php echo!empty($val["volunteer_event_postal"]) ? $val["volunteer_event_postal"] : ""; ?></p>
                    <p><?php echo!empty($val["volunteer_event_address"]) ? $val["volunteer_event_address"] : ""; ?></p>
                    <p>People supported: <?php echo $volunteer_cause_data["count"]; ?></p>
                    <div class="donate_bttn"><?php echo $btn . $btn3; ?></div>
                </div>
            <?php } ?>
            <!--VOLUNTEER INFORMATION ENDS -->

            <!--PETITION INFORMATION STARTS-->
            <?php if ($val["is_petition"] == 1) { ?>
                <div class="fundraising_main">
                    <h1 class="t_cap">Pledge</h1>
                    <strong><span data-time="<?php echo $closetime; ?>" class="kkcount-down"></span></strong>
                    <div class="petition_box">
                        <p>Target: <?php echo number_format($val["petition_target_amount"]); ?></p>
                        <p>Name: <?php echo ucfirst($this->common->get_user_name($dataset['user_id'], $dataset['user_type'])); ?></p>
                        <p>People pledged: <?php echo $petition_cause_data["count"]; ?></p>
                    </div>
                    <div class="donate_bttn"><?php echo $btn . $btn2; ?></div>
                </div>
                <!--PETITION INFORMATION STARTS-->
            <?php } ?>

            <div class="hall_of_heros">
                <div class="table-responsive">
                    <div class="table_head">
                        <h3 class="head_head">Hall of heros</h3>
                    </div>
                    <ul>
                        <?php
                        if (count($heroes) != 0) {
                            $i = 0;
                            foreach ($heroes as $k => $v) {
                                if ($v["table_type"] == "cause_donations") {
                                    $sub = 'fundraised';
                                }
                                if ($v["table_type"] == "petitions") {
                                    $sub = 'pledged';
                                }
                                if ($v["table_type"] == "volunteers") {
                                    $sub = 'supported';
                                }
                                if ($v["table_type"] == "cause_donations") {
                                    $name = $this->common->get_user_name($v['user_id'], $v['user_type']);
                                } else {
                                    $name = $v["name"];
                                }
                                ?>
                                <li><?php echo ucfirst($name); ?><sub style="font-size:10px; padding-left:2px; font-weight:bold;"><?php echo $sub; ?></sub></li>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <li>No record found</li>
                        <?php } ?>
                    </ul>
                </div>

                <!--end--> 
            </div>

            <!--end--> 
        </div>
    </div>
    <div class="row custom_row" id="cause3">
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <?php if (isset($dataset['causedoc']) && !empty($dataset['causedoc'])) { ?>
                <div class="col-md-12 story_heading m_head">
                    <h3 class="col-md-2 offset-md-10">Documents for references</h3>
                </div>
                <div class="cause3_story">
                    <div class="item active">
                        <ul class="thumbnails">
                            <?php
                            foreach ($dataset['causedoc'] as $key => $val) {
                                $pdf = array('pdf', 'PDF');
                                $name1 = end(explode('.', $val));
                                if (in_array(strtolower($name1), $pdf)) {
                                    $src = base_url() . 'images/my_file_048.png';
                                } else {
                                    $src = base_url() . 'images/my_file_020.png';
                                }
                                ?>
                                <li> <a  rel="tooltip" data-placement="right" title="Click here to view" data-src="http://docs.google.com/viewer?url=<?php echo base_url(); ?>cause_upload_docs/<?php echo $val; ?>&embedded=true" data-height=350 data-width=660 data-target="#myModalxx" class="modalButton" data-toggle="modal"  style="text-decoration:none;"  href="javascript:void(0);"  > <img src="<?php echo $src; ?>" alt="" width="100" height="110"> </a> <br />
                                    <span><a data-toggle="tooltip" data-placement="right" title="Click here to download this file" class="download_txt" href="<?php echo base_url() . $this->router->class; ?>/download_file/<?php echo $val; ?>" >download</a></span> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>


            <div class="col-md-12 story_heading m_head">
                <h3 class="col-md-2 offset-md-10">Comments</h3>
            </div>
            <div style="float:left; left:600px;" id="message"> <font color='red'><?php echo $this->session->flashdata('comment_errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('comment_successmsg'); ?></font> </div>
            <?php
            if (count($comment) > 0) {
                $k = 0;
                foreach ($comment as $k => $v) {
                    ?>
                    <div class="comment_row" > 
                      <!-- <img src="<?php //echo base_url();         ?>images/comment_img.jpg" class="comment_img">-->
                        <div class="comment_text">
                            <div class="hello">
                                <div class="hel1">
                                    <p><?php echo $this->common->get_user_name($v["userid"], $v["user_type"]) ?>:</p>
                                </div>
                                <div class="h-time">
                                    <p><?php echo $this->common->convert_time_days($v["time"]) ?></p>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <p><?php echo stripcslashes(nl2br($v["comment"])); ?></p>
                        </div>
                    </div>
                    <?php
                    $k++;
                }
            }
            ?>

            <?php
//echo count($comment);
            if (count($comment) > 4) {
                $last_blog_id = array_reverse($comment, true);
                $max = max(array_keys($last_blog_id));
                $id = $comment[$max]["id"];
                ?>
                <span id="data_append_<?php echo $v["id"]; ?>"></span>
                <input type="hidden" id="last_id" value="<?php echo $id; ?>" />
                <div  onclick="load_more();" id="load_more" class="link_bttn buttons" ><a href="javascript:void(0);">Load More</a> </div>
            <?php } ?>
            <?php if ($userid <> "") { ?>
                <form method="post" name="" action="<?php echo base_url() . $this->router->class; ?>/add_comment/">
                    <input type="hidden"  name="userid" value="<?php echo!empty($userid) ? $userid : ""; ?>"/>
                    <div class="username">
                        <p class="bac"><?php echo ucfirst($username); ?></p>
                        <input type="hidden" name="cause_id" value="<?php echo $slug; ?>"/>
                    </div>
                    <div class="comment_area">
                        <textarea class="comment_box" placeholder="Comment" name="comment"></textarea>
                        <input type="submit" value="Submit"/>
                    </div>
                </form>
            <?php } else { ?>
                <div class="link_bttn" style="float:left;"><a href="javascript:void(0);" data-target="#myModal" data-toggle="modal">Login to comment!</a></div>
            <?php } ?>
        </div>
    </div>
</div>
<!--end-->

<div class="container"> 
    <!--<a class="modalButton" data-toggle="modal" data-src="http://www.youtube.com/embed/Oc8sWN_jNF4?rel=0&wmode=transparent&fs=0" data-height=320 data-width=450 data-target="#myModalxx">Click me</a>-->

    <div class="modal fade" id="myModalxx" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <!--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--> 
                </div>
                <div class="modal-body">
                    <iframe frameborder="0" src="" style="width:100%"></iframe>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                 </div>--> 
            </div>
            <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 
</div>

<!-- End --> 
<!--Modal-9(CAUSE4 - DONATION PAYMENT WINDOW) -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header custom_m_head">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
            </div>
            <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause" id="error_msgs" style="text-align:center; "> </div>
            <div class="modal-body">
                <form class="form-horizontal login_form thanks_form" role="form" id="pay_form" method="post" action="<?php echo base_url() ?>donation/paypal/">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Amount (USD)</label>
                        <div class="col-sm-7 name_fed">
                            <input type="text" class="form-control name_input" id="amount" name="amount" placeholder="10">
                        </div>
                    </div>
                    <?php
//case 1:user is logged in and have no card 
//case 2: if logged in and have card
//case 3: not logged in 

                    $is_logged = $this->session->userdata("userid");

                    if ($is_logged) {
                        $ucard = count($user_cards);
                    } else {
                        $ucard = $user_cards;
                    }
// echo $ucard;
                    if ($ucard > '0') {
                        // echo "hi";
                        $display = 'none';
                        ?>
                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style" id="default_payment">
                            <label for="inputEmail3" class="col-sm-4 control-label">Default Payment</label>
                            <div class="col-sm-7">
                                <?php foreach ($user_cards as $key => $val) { ?>

                                    <div>
                                        <input type="radio" id="<?php echo $val['id']; ?>" value="<?php echo $val['card_id']; ?>" name="cards" class="cards">
                                        Card Ends With - <?php echo $val['card_number']; ?> </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-offset-4 col-sm-8" >
                            <button id="show_method_txt" type="button" class="btn btn-default login_cstm" style="margin-bottom:25px;" onclick="show_methods();">CHANGE PAYMENT METHOD</button>
                        </div>
                    <?php } else { ?>
                        <?php
                        //echo "heloo";
                        $display = 'block';
                        ?>
                    <?php } ?>
                    <span style="display:<?php echo $display; ?>" id="show_m" rel="<?php echo $display; ?>">
                        <div class="col-md-12 col-xs-12 name_fed mnt_mb2">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="firstname">Payment Type:</label>
                                <select class="selectpicker show-menu-arrow col-sm-7" style="left:5px;" name="payment_method" onchange="show_block(this.value);" id="method">
                                    <option value="">Select Method</option>
                                    <option value="card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="card_info" style="display:none">
                            <div class="col-md-12 col-xs-12 name_fed mnt_mb2">
                                <div class="form-group mnt_credit_option">
                                    <label class="col-sm-4 col-xs-12 control-label" for="firstname">Credit Card:</label>
                                    <div class="col-sm-2 col-xs-3">
                                        <input type="radio" name="card" id="visa" value="visa" class="gender">
                                        <img src="<?php echo base_url(); ?>images/thumbs/visa_small.gif" /> </div>
                                    <div class="col-sm-2 col-xs-3">
                                        <input type="radio" name="card" id="master" value="mastercard" class="gender">
                                        <img src="<?php echo base_url(); ?>images/thumbs/mastercd_small.gif" /> </div>
                                    <div class="col-sm-2 col-xs-3">
                                        <input type="radio" name="card" id="discovercard" value="discover" class="gender">
                                        <img src="<?php echo base_url(); ?>images/thumbs/discovercard_sm.gif" /> </div>
                                    <div class="col-sm-2 col-xs-3">
                                        <input type="radio" name="card" id="amex" value="amex" class="gender">
                                        <img src="<?php echo base_url(); ?>images/thumbs/amex_small.gif" /> </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-xs-12 name_fed mnt_mb2">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="firstname">Credit Card Number:</label>
                                    <div class="col-sm-7 name_fed">
                                        <input type="text" placeholder="" id="cnumber" name="cnumber" class="form-control name_input">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 name_fed mnt_mb2">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="firstname">CVV Number:</label>
                                    <div class="col-sm-5 name_fed">
                                        <input type="password" placeholder="" id="cvc" name="cvc" class="form-control name_input">
                                    </div>
                                    <div class="col-sm-3  mnt_cvv" for="firstname"><a target="_blank" href="http://www.cvvnumber.com/">What is CVV number?</a></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 name_fed mnt_mb2">
                                <div class="form-group mnt_select_margin">
                                    <label class="control-label col-md-4 col-sm-4" for="firstname">Expiration Date:</label>
                                    <div class="col-sm-3 month_selection">
                                        <select class="form-control selectpicker show-menu-arrow" name="exp_month" id="exp_month">
                                            <option value="">Month</option>
                                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 name_fed mnt_select">
                                        <select class="form-control selectpicker show-menu-arrow" name="exp_year" id="exp_year">
                                            <option value="">Year</option>
                                            <?php
                                            $year = date('Y');
                                            for ($j = $year; $j <= $year + 20; $j++) {
                                                ?>
                                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </span>
                    <div class="form-group">
                        <label class="col-sm-4 col-xs-8 control-label" for="inputEmail3">Support as anonymous</label>
                        <div class="col-sm-6 col-xs-2">
                            <label>
                                <input type="checkbox" value="" name="support_as" id="support_as">
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="inputEmail3" style="margin-top:8px;">Share this Cause</label>
                        <div class="col-sm-7 mnt-modal7">
                            <a  style="text-indent:-9999px;" rel="nofollow" href="http://www.facebook.com/share.php??s=100&p[title]=<?php echo urldecode($title); ?>&p[summary]=<?php echo strip_tags($text); ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $image; ?>']asdfa[/a]" onclick="return fbs_click()" target="_blank">
                                <img src="<?php echo base_url(); ?>images/facebook.png" />
                            </a>
                            <a class="plus" target="_blank" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urldecode($text); ?>&url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="twi" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/twitter.png" />
                            </a>
                            <a class="gog" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="gplus" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/g+.png" />
                            </a>
                            <!--<div class="share42init"
                               data-url="<?php echo $url; ?>"
                               data-title="<?php echo urldecode($title); ?>"
                               data-image="<?php echo $image; ?>" 
                               data-description="<?php echo urldecode($text); ?>"
                               data-top1="110"
                               data-top2="20"
                               data-margin="70"> 
                          </div>-->
                            <!--
                          <label class="checkbox-inline mnt_f"> <a title="Share with twitter" target="_blank" href="<?= share_url('twitter', array('url' => $url, 'text' => $text, 'via' => $this->config->item("site_name"))) ?>"><img src="<?php echo base_url(); ?>images/icon2.png" alt="twitter"/> </a></label>
                          <label class="checkbox-inline mnt  _t"> <a title="Share with Facebook" target="_blank" class="invite_link" href="<?= share_url('facebook', array('url' => $url, 'text' => $text)) ?>"><img src="<?php echo base_url(); ?>images/icon1.png" alt="facebook"/></a></label>
                          <label class="checkbox-inline mnt_g"> <a title="Share with Google+" href="https://plus.google.com/share?url=<?php echo base_url() . 'cause/view/' . $id ?>" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url() . 'cause/view/' . $id; ?>','<?php echo $text; ?>','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;"> <img src="<?php echo base_url() ?>images/g+.png"> </a> </label>
                            <label class="checkbox-inline mnt_f"> <a title="Share with Facebook" href="https://www.facebook.com/dialog/feed?app_id=736788853060365&display=popup&link=<?php echo base_url(); ?>cause/cause_detail/<?php echo $dataset['slug']; ?>&name=<?php echo $title; ?>&description=<?php echo $text; ?>&redirect_uri=<?php echo base_url(); ?>cause/cause_detail/<?php echo $dataset['slug']; ?>" class="invite_link"  target="_blank"> <img src="<?php echo base_url() ?>images/facebook.png"> </a> </label>
                            <label class="checkbox-inline mnt  _t"> <a class="invite_link"  target="_blank" title="Share with Twitter" href="http://twitter.com/share?url=<?php echo base_url(); ?>cause/cause_detail/<?php echo $dataset['slug']; ?>&text=<?php echo $text; ?>" data-lang="en" data-size="large" data-count="none" /> <img src="<?php echo base_url() ?>images/twitter.png"> </a> </label>
                            <label class="checkbox-inline mnt_g"> <a href="https://plus.google.com/share?url=<?php echo base_url(); ?>cause/cause_detail/<?php echo $dataset['slug']; ?>" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>cause/cause_detail/<?php echo $dataset['slug']; ?>','<?php echo $text; ?>','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;"> <img src="<?php echo base_url() ?>images/g+.png"> </a> </label>
                            --> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                            <button type="button" class="btn btn-primary btn-lg" onclick="return get_payment(this);">CONFIRM</button>
                        </div>
                    </div>
                    <input type="hidden"  id="cause_id" name="cause_id" value="<?php echo $dataset['id'] ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal-end--> 

<!--Modal-7(PETITION MODAL BOX 	) -->
<div class="modal fade mnt_support_modal" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header custom_m_head">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
            </div>
            <div class="modal-body"> <span id="error_petition" style="padding: 0px 0px 0px 155px;"></span>
                <form id="petition_form" class="form-horizontal login_form" role="form">
                    <input type="hidden"  value="<?php echo $id ?>" name="cause_id" id="cause_id"/>
                    <?php
                    $utype = $this->session->userdata('user_type');
                    ?>
                    <input type="hidden"  value="<?php echo $this->uri->segment(3) ?>" id="uri"/>
                    <input type="hidden" name="user_type" id="user_type" value="<?php echo!empty($utype) ? $utype : "guest"; ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Name:</label>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <input type="hidden" name="userid" value="<?php echo $userid; ?>" id="userid">
                            <input type="text" data-ajax='name' data-required='true' data-type='name' data-min='3' data-max='6' class="form-control input_field" id="name" name="name" value="<?php echo $username; ?>" <?php if ($username <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                        <label for="inputPassword3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Location:</label>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <input type="text" data-ajax='true' data-required='true' data-type='numeric' data-min='3' data-max='6' class="form-control input_field" id="location" name="location" value="<?php echo $address; ?>" <?php if ($address <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Email Subscribe:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <input type="text" data-ajax='true' data-required='true' data-type='numeric' data-min='0' data-max='35' class="form-control input_field" id="email" value="<?php echo $email; ?>" name="email" <?php if ($email <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Your message:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <textarea data-ajax='true' data-required='true' data-type='numeric' data-min='0' data-max='500' class="form-control" style="resize:none" rows="3" id="content" name="content" <?php echo!empty($message) ? $message : ""; ?> ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Support as anonymous</label>
                        <div class="col-sm-9 col-xs-2">
                            <label>
                                <input type="checkbox" id="anonymous_status" name="anonymous_status" value="" data-required='false' data-type='numeric' data-min='0' data-max='0'>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Share this Cause:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <a  style="text-indent:-9999px;" rel="nofollow" href="http://www.facebook.com/share.php??s=100&p[title]=<?php echo urldecode($title); ?>&p[summary]=<?php echo strip_tags($text); ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $image; ?>']asdfa[/a]" onclick="return fbs_click()" target="_blank">
                                <img src="<?php echo base_url(); ?>images/facebook.png" />
                            </a>
                            <a class="plus" target="_blank" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urldecode($text); ?>&url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="twi" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/twitter.png" />
                            </a>
                            <a class="gog" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="gplus" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/g+.png" />
                            </a>
                            <!-- <div class="share42init"
                                        data-url="<?php echo $url; ?>"
                                        data-title="<?php echo urldecode($title); ?>"
                                        data-image="<?php echo $image; ?>" 
                                        data-description="<?php echo urldecode($text); ?>"
                                        data-top1="110"
                                        data-top2="20"
                                        data-margin="70"> </div>
                           </div>-->
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 col-xs-12">
                            <?php
                            if (($this->common->is_already_supported("petitions", $email, $id) != 0) && $userid <> "") {
                                $function = '';
                                $confirm = 'Already pledged';
                                $disable = 'disabled="disabled"';
                            } else {
                                $function = 'onclick="return petition_validation(this);"';
                                $confirm = 'Confirm';
                                $disable = '';
                            }
                            ?>
                            <button  <?php echo $function; ?> <?php echo $disable; ?> type="button" class="btn btn-primary btn-lg"> <?php echo $confirm; ?> </button>
                            <!--<button type="submit" class="btn btn-default login_cstm">CONFIRM</button>--> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--SUPPORTER STARTS -->
<div class="modal fade mnt_support_modal" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header custom_m_head">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
            </div>
            <div class="modal-body"> 
                <div id="error_volunteer" class="alert" role="alert"  style="display:none"></div>

                <form id="volunteer_form" class="form-horizontal login_form" role="form">
                    <input type="hidden"  value="<?php echo $dataset['id'] ?>" name="cause_id" id="ucause_id"/>
                    <?php $utype = $this->session->userdata('user_type'); ?>
                    <input type="hidden"  value="<?php echo $this->uri->segment(3) ?>" id="uri"/>
                    <input type="hidden" name="user_type" id="uuser_type" value="<?php echo!empty($utype) ? $utype : "guest"; ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Name:</label>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <input type="hidden"  name="userid" id="uuserid" value="<?php echo!empty($userid) ? $userid : "0"; ?>"/>
                            <input type="text"  class="form-control input_field" id="uname" name="name" value="<?php echo $username; ?>" <?php if ($username <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                        <label for="inputPassword3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Location:</label>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                            <input type="text" class="form-control input_field" id="ulocation" name="location" value="<?php echo $address; ?>" <?php if ($address <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Email Subscribe:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <input type="text"  class="form-control input_field" id="uemail" value="<?php echo $email; ?>" name="email" <?php if ($email <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Phone number:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <input type="text"  class="form-control input_field" id="phone_number" value="<?php echo $phone_number; ?>" name="phone_number" <?php if ($phone_number <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Age:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <input type="text"  class="form-control input_field" id="age" value="<?php echo $age; ?>" name="age" <?php if ($age <> "") { ?> disabled="disabled" <?php } ?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Gender:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            <input <?php echo $mchecked; ?> type="radio"  id="gender" value="m" name="gender" <?php if ($gender <> "") { ?>  disabled="disabled" <?php } ?>>Male
                            <input <?php echo $fchecked; ?> type="radio"  id="gender" value="f" name="gender" <?php if ($gender <> "") { ?>  disabled="disabled" <?php } ?>>Female

                        </div>
                    </div>


                    <!--<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Support as anonymous</label>
                      <div class="col-sm-9 col-xs-2">
                        <label>
                          <input type="checkbox" id="uanonymous_status" name="anonymous_status" value="" >
                        </label>
                      </div>
                    </div>-->

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Share this Cause:</label>
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">

                            <a  style="text-indent:-9999px;" rel="nofollow" href="http://www.facebook.com/share.php??s=100&p[title]=<?php echo urldecode($title); ?>&p[summary]=<?php echo strip_tags($text); ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $image; ?>']asdfa[/a]" onclick="return fbs_click()" target="_blank">
                                <img src="<?php echo base_url(); ?>images/facebook.png" />
                            </a>
                            <a class="plus" target="_blank" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urldecode($text); ?>&url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="twi" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/twitter.png" />
                            </a>
                            <a class="gog" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=<?php echo $url; ?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');
                                    return false" data-count="gplus" href="#"  rel="nofollow">
                                <img src="<?php echo base_url(); ?>images/g+.png" />
                            </a>
                            <!--<div class="share42init"
                                       data-url="<?php echo $url; ?>"
                                       data-title="<?php echo urldecode($title); ?>"
                                       data-image="<?php echo $image; ?>" 
                                       data-description="<?php echo urldecode($text); ?>"
                                       data-top1="110"
                                       data-top2="20"
                                       data-margin="70"> </div>
                          </div>-->
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 col-xs-12">
                            <?php
                            if (($this->common->is_already_supported("volunteers", $email, $id) != 0) && $userid <> "") {
                                $function = '';
                                $confirm = 'Already supported';
                                $disable = 'disabled="disabled"';
                            } else {
                                $function = 'onclick="return volunteer_validation(this);"';
                                $confirm = 'Confirm';
                                $disable = '';
                            }
                            ?>
                            <button  <?php echo $function; ?> <?php echo $disable; ?> type="button" class="btn btn-primary btn-lg"> <?php echo $confirm; ?> </button>

                            <!--<button type="submit" class="btn btn-default login_cstm">CONFIRM</button>--> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--SUPPORTER ENDS-->



<!--Modal-end--> 
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.slimscroll.js"></script> 
<script defer src="<?php echo base_url(); ?>js/thanks.giving.js"></script>--> 
<script>
    function load_more() {
        var last_id = $("#last_id").val();
        var cause_id = '<?php echo $dataset['id']; ?>';

        if (last_id != "undefined" || last_id != "") {
            $.ajax({
                type: 'GET',
                url: BASEURL + 'cause/load_more/' + last_id + '/' + cause_id,
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(rep) {
                    result = rep.split("|::|");
                    $('#data_append_' + last_id).append(result[0]);
                    $('#last_id').val(result[1]);
                    $('#loading').hide();
                    if (result[1] == 0) {
                        $("#load_more").hide();
                    }
                }
            });
        }
    }
</script> 
<!-------------------------------------------------counter script starts---------------------------------------------------------------> 
<script src="<?php echo base_url(); ?>js/countdown/kkcountdown.min.js"></script> 
<!-------------------------------------------------counter script ends---------------------------------------------------------------> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/payment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>share42/share42.js"></script>
<script src="<?php echo base_url(); ?>js/cause_detail.js"></script> 

<script type="text/javascript">
// Animate the element's value from x to y:
    $({someValue: 0}).animate({someValue: <?php echo number_format($donation_data[0]["total_sum"], 2); ?>}, {
        duration: 3000,
        easing: 'swing', // can be anything
        step: function() { // called on every step
            // Update the element's text with rounded-up value:
            $('#el').text(commaSeparateNumber(Math.round(this.someValue)));
        }
    });
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        }
        return val;
    }
<?php if($is_mobile !=1){?>
		$(document).on('mouseover','.thumb_hover',function(){
			var div = $('#slider_ab .main_image');
			div.fadeTo( "opacity", 1 ).css({'background-image': 'url(<?php echo base_url();?>cause_upload_images/'+$(this).data('src')+')'});
		});
<?php }?>
</script>

<!--
http://www.getcreditcardnumbers.com/
http://git.aaronlumsden.com/progression/-->