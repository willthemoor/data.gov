<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/jquery.bxslider.js"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/jquery.bxslider.css">
<?php
$category = get_the_category();
$term_name = $category[0]->cat_name;
$term_slug = $category[0]->slug;
?>
<?php
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->slug;
?>
<script type="text/javascript">


	$(document).ready(function(){
 
   if ($(window).width() < 480) {
	     $('.bxslider').bxSlider({
	  minSlides: 1,
  maxSlides: 1,
  slideWidth: 220,
  slideMargin: 10
  });
   }
   else{ 
   $('.bxslider').bxSlider({
	    minSlides: 3,
  		maxSlides: 4,
  		slideWidth: 220,
  		slideMargin: 10
  });
   }
});
</script>
<?php
	 // show Links associated to a community
      // we need to build $args based either term_name or term_slug
      $args = array(
          'category_name'=> $term_slug, 'categorize'=>0, 'title_li'=>0,'orderby'=>'rating');
      wp_list_bookmarks($args);
      if (strcasecmp($term_name,$term_slug)!=0) {
          $args = array(
              'category_name'=> $term_name, 'categorize'=>0, 'title_li'=>0,'orderby'=>'rating');
          wp_list_bookmarks($args);
      }
?>
<?php
            while( have_posts() ) {
                the_post();
   ?>
<div class="Apps-wrapper">
  <div class="Apps-post" id="post-<?php the_ID(); ?>">
      <div id="appstitle" class="Appstitle" ><?php the_title();?></div>
    <?php the_content();   ?>
    <?php }?>
  </div>
</div>
<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_types',
					'terms' => 'mobile-30',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		
	if (!empty($apps)) { ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Mobile Applications</div>
    <div id="Appscontainer" class="appscontainer">
      <ul class="bxslider">
        <?php 
            while( have_posts() ) {
				the_post();
				
				
				
	  ?>
        <li>
          <div id="Appsitem" class="appsitem <?php the_ID();?>">
            <div id="itemtitle"> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
              <?php the_title() ?>
              </a> </div>
            <div id="itemimage">
              <center>
                <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
                <img class="scale-with-grid" src="<?php echo $imagefile['value']; ?>" style="height:85px;">
              </center>
            </div>
            <div id="itemcontent">
              <?php the_content() ?>
            </div>
            <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
          </div>
        </li>
        <?php
				}
	}
		?>
      </ul>
    </div>
    <br clear="all" >
  </div>
</div>
<br clear="all" />

<!-- Web Apps -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_types',
					'terms' => array('web-30','apps-30'),
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		if (!empty($apps)) { ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Web Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
      <div id="bottomimages">
        <center>
          <?php if (strlen(get_post_meta($post->ID, 'field_ios_app_download_url', TRUE ))>10) :?>
          <a href="<?php echo get_post_meta($post->ID, 'field_ios_app_download_url', TRUE );?>"> <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/jquery.bxslider/images/ios.png" class="iconApp"> </a>
          <?php endif; ?>
          <?php if (strlen(get_post_meta($post->ID, 'field_android_app_download_url', TRUE ))>10) :?>
          <a href="<?php echo get_post_meta($post->ID, 'field_android_app_download_url', TRUE );?>"> <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/jquery.bxslider/images/android.png" class="iconApp" > </a>
          <?php endif; ?>
          <?php if (strlen(get_post_meta($post->ID, 'field_windows_phone_app_download', TRUE ))>10) :?>
          <a href="<?php echo get_post_meta($post->ID, 'field_windows_phone_app_download', TRUE );?>"> <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/jquery.bxslider/images/windows.png" class="iconApp"> </a>
          <?php endif; ?>
        </center>
      </div>
    </div>
    <?php
				}
		}
		?>
    <br clear="all" />
  </div>
</div>
<br clear="all" />
<!-- Application categories taxonomy--> 
<!-- Agriculture Apps -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'agriculture-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		if (!empty($apps)) { ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Agriculture Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		}
		?>
    <br clear="all" />
  </div>
</div>
<br clear="all" />
<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'education-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		if (!empty($apps)) { ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Education Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>
<br clear="all" />
<?php } ?>

<!-- Energy & Enivornment-->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'energy_&_environment-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Energy & Environment Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Finance -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'finance-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Finance Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Food & Nutrition -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'food_&_nutrition-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		 ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Food & Nutrition Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Global Food Security -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'global_food_security-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
 ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Global Food Security Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Health Apps -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'health-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
		 ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Health Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Rural Apps -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'rural-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
	 ?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Rural Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Safety Apps -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'safety-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
	?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Safety Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Telecommunications -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'telecommunications-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
	?>
<div class="Apps-wrapper">
  <div class="Mobile-post" id="post-<?php the_ID(); ?>">
    <div id="Mobiletitle" class="Appstitle" >Telecommunications Applications</div>
    <?php
			while( have_posts() ) {
				the_post();
	  ?>
    <div id="Webcontainer" class="webcontainer <?php the_ID();?>">
      <div id="webimage">
        <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
        <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
      <div id="webcontent">
        <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
          <?php the_title() ?>
          </a> </h2>
        <div class='content'>
          <div id="webtext">
            <?php the_content() ?>
          </div>
        </div>
      </div>
      <br clear="all" />
      <?php //echo "Application URL:".get_post_meta($post->ID, 'field_application_url', TRUE ); ?>
    </div>
    <?php
				}
		
		?>
    <br clear="all" />
  </div>
</div>

<!-- Transportation -->

<?php
					$args = array(
						 'post_type' => 'Applications',
					   'tax_query'=>	array(
						'relation' => 'AND',
					array(
					'taxonomy' => 'application_categories',
					'terms' => 'transportation-40',
					'field' => 'slug',
					),
					
				)
			);
					
		$apps = query_posts($args);
	 ?>
<div class="Apps-wrapper">
<div class="Mobile-post" id="post-<?php the_ID(); ?>">
<div id="Mobiletitle" class="Appstitle" >Transportation Applications</div>
<?php
			while( have_posts() ) {
				the_post();
	  ?>
<div id="Webcontainer" class="webcontainer <?php the_ID();?>">
  <div id="webimage">
    <?php 
				$imagefile=get_field_object('field_5240b9c982f41');
		  ?>
    <img class="scale-with-grid" src="<?php echo $imagefile['value']['url']; ?>"> </div>
  <div id="webcontent">
    <h2> <a href="<?php echo get_post_meta($post->ID, 'field_application_url', TRUE ); ?>">
      <?php the_title() ?>
      </a> </h2>
    <div class='content'>
      <div id="webtext">
        <?php the_content() ?>
      </div>
    </div>
  </div>
  <br clear="all" />
 
</div>
<?php
				}
		
		?>
        <br clear="all" />
        </div>
        </div>
