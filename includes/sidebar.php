<?php
  $stmt = mysqli_prepare($connection, "SELECT fotografija, link FROM baneri WHERE aktivno='aktivan'");
  $stmt->execute();
  testQuery($stmt);
  $stmt->bind_result($fotografija, $link);  

  while($stmt->fetch()){
?>
<div class="col-lg-12 p-0 py-2">
    <a href="<?php echo $link ?>" target="_blank" class="p-0 m-0"><img src="admin/images/baneri/<?php echo $fotografija ?>" class="img-responsive m-0 banner_container_img" style="width:100% !important;"></a>    
</div>
<?php } ?>
<div class='col-sm-12 col-xs-12 p-0 text-center' style="padding: 0; margin-top: 30px;">
		<div  class='col-sm-12 col-xs-12 naslov_slajd social_wall' style="cursor:context-menu; padding: 5px !important;text-align:left; margin-left: 0px; margin-bottom: 0px;">
			<span class='col-sm-12 col-xs-12 prvi_tim text-center'><span style="">SOCIAL WALL</span></span>
		</div>
		<div class="col-lg-12 fb-page m-0 p-0" style="overflow:auto !important" data-href="https://www.facebook.com/KkBuducnostVoli/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/KkBuducnostVoli/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/KkBuducnostVoli/">KK Budućnost VOLI</a></blockquote></div>	
	 	
		
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/sr_RS/sdk.js#xfbml=1&version=v3.2&appId=1147309338752775&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

