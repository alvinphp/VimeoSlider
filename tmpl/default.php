<?php
/*
--------------------------------------------------------------
 * @copyright	Copyright © 2024 - All rights reserved.
  Developer: Alvin Gil Saldaña
  @license		GNU General Public License v2.0
 --------------------------------------------------------------- */

defined('_JEXEC') or die;
$doc = JFactory::getDocument();
JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
?>
<div class="container">
	<div class="docs-section">
		<div class="examples">
			<div class="example">
      <!-- validate params -->
    <?php
       $StyleLayout   = $params->get('stylelayout');
       $ColorLayoutBotton = $params->get('colorbottonlayout');
       $Theme = $params->get('theme');
       if ($StyleLayout == 0 ) {
         $StyleLayout = "";
        }
       if ($StyleLayout == 1) {
         $StyleLayout = "rvs-horizontal";
        }
       if ($ColorLayoutBotton == 0 ) {
         $ColorLayoutBotton = "rvs-blue-highlight";
       }
       if ($ColorLayoutBotton == 1 ) {
         $ColorLayoutBotton = "rvs-green-highlight";
       }
       if ($ColorLayoutBotton == 2 ) {
         $ColorLayoutBotton = "rvs-orange-highlight";
       }
       if ($ColorLayoutBotton == 3 ) {
         $ColorLayoutBotton = "rvs-red-highlight";
       }
       if ($ColorLayoutBotton == 4 ) {
         $ColorLayoutBotton = "";
       }
       if ($Theme == 0 ) {
         $Theme = "";
      }
      if ($Theme == 1 ) {
         $Theme = "rvs-light";
      }

			//<------- restringe url -------->
		$count = 0;
		foreach ($VideoUrl as $value) {
			if (parse_url($value-> url, PHP_URL_HOST) != parse_url('https://vimeo.com', PHP_URL_HOST)) {
				if ($count == 0){
					echo '<div class="alert alert-danger" role="alert">
                  error !!! only vimeo! </div>';
							 }
				  $count++;
			}
		}

		// end restringe url
	?>


		<!-- home slider -->
       <div class="rvs-container  <?php echo $StyleLayout ; ?> <?php echo $ColorLayoutBotton ; ?> <?php echo $Theme; ?>">
					<div class="rvs-item-container">
						 <div class="rvs-item-stage">
               <?php
                  foreach ($VideoUrl as $value) {
                  if (parse_url($value-> url, PHP_URL_HOST) == parse_url('https://vimeo.com', PHP_URL_HOST)) { ?>
                  <!-- **** **** **** **** **** -->
                  <div class="rvs-item" style="background-image: url(<?php echo $value->image;?>)">
								  <p class="rvs-item-text"><?php echo $value->title;?><small><?php echo $value->subtitle;?></small></p>
								  <a href="<?php echo $value-> url; ?>" class="rvs-play-video"></a>
							</div>
                  <?php
                    }
                  }
                  ?>
            </div>
					</div>
          <!-- **** **** **** **** **** -->
					<div class="rvs-nav-container">
						<a class="rvs-nav-prev"></a>
						<div class="rvs-nav-stage">
            <!-- **** **** **** **** **** -->
            <?php
            foreach ($VideoUrl as $value) {
              if (parse_url($value-> url, PHP_URL_HOST) == parse_url('https://vimeo.com', PHP_URL_HOST)) { ?>
              <a class="rvs-nav-item">
							   <span class="rvs-nav-item-thumb" style="background-image: url(<?php echo $value->image; ?>)"></span>
							   <h4 class="rvs-nav-item-title"><?php echo $value->title;?></h4>
							   <small class="rvs-nav-item-credits"><?php echo $value->subtitle;?></small>
              </a>
            <?php
                }
						}
             ?>
             <!-- **** **** **** **** **** -->
           </div>
						<a class="rvs-nav-next"></a>
					</div>
				</div>
				<!-- end -->
      </div>
    </div>
	</div>
</div>
<!-- Responsive Video Slider HTML: END -->
<!-- jQuery -->
<script>
	jQuery(function($){
		$('.rvs-container').rvslider();
	});
</script>
