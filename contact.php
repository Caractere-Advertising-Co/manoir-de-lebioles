<?php 
/* Template Name: Page Contact */

get_header();

$title          = get_field('titre'); 
$form           = get_field('shortcode_form','options');

$titleInfos     = get_field('titreInfos');
$adresse        = get_field('adresse');

$maps           = get_field('maps','options');

?>

<section id="formulaire-contact">
    <div class="container">
        <?php if($title): echo $title; endif;?>
    </div>
    <div class="container flex flex-row gap-[100px]">
        <div class="basis-3/4 ">
            <?php if($form): echo do_shortcode($form); endif;?>
        </div>
        <div class="basis-1/4">
            <?php if($titleInfos): echo $titleInfos; endif;?>
            <?php if($adresse): echo $adresse; endif;?>
        </div>
    </div>
</section>

<section id="maps">
    <?php if($maps):?>
        <div class="block-img">
            <img src="<?php echo $maps['url'];?>" alt="<?php echo $maps['title'];?>"/>
        </div>
    <?php endif;?>
</section>

<?php get_template_part( "templates-parts/section-citation" );?>
<?php get_footer();?>
