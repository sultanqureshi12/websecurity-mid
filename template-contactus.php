<?php

/*
Template Name: Contact Us

*/

?>
<?php get_header();?>
<section class="page-wrap">


<div class="container">

	<h1><?php the_title() ?></h1>

	<div class="row">
		<div class="col-lg-6">

			<?php get_template_part('includes/section','form');?>


		</div>
		<div class="col-lg-6">
			<div class="form-contents">
				<?php get_template_part('includes/section','content');?>
			</div>
			
		</div>
	</div>

	

</div>
<section class="page-wrap">


<?php get_footer();?>

