<?php

add_action('admin_menu', 'lunar_magazine_one_button_preset');

function lunar_magazine_one_button_preset() {
    if(is_super_admin()){
    add_theme_page('Lunar Magazine one button install widgets', 'Widget Presets', 'read', 'lunar_magazine_one_button','lunar_magazine_prearange');
    }
}

function lunar_demo_image_upload( $image_url  ){
    $upload_dir = wp_upload_dir();
    $image_data = wp_remote_get($image_url);
    $image_data = wp_remote_retrieve_body( $image_data );
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    global $wp_filesystem;
    WP_Filesystem(); // Initial WP file system
    $wp_filesystem->put_contents( $file, $image_data );
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    return $attach_id;
}

function lunar_magazine_prearange(){
    $screen = get_current_screen();
    if ($screen->base === 'appearance_page_lunar_magazine_one_button'){
    $bloginfo = get_template_directory_uri(); ?>

<div class="theme-presets">


        <div class="widget-layouts-text">

            <h2>
                <?php esc_html_e( 'Stepfox Theme Setup:', 'lunar-magazine' ); ?>
            </h2>
        </div>
        <!-- widget-layouts-text -->
    <div class="color-presets">
        <div class="color-presets-radios">
            <ul class="theme-colors-presets">
                <li class="theme-colors-preset1 homepagebutton">                
                    <form method="post">                    
                        <input  type="submit" class="button-secondary" name="homepage" value="<?php echo esc_attr('Add and Set Homepage as Front Page'); ?>"/>
                    </form>
                </li>
            </ul>
        
        
            <ul class="theme-colors-presets">
                <li class="theme-colors-preset1">
                    
                    <form method="post">                    
                        <input  type="submit" class="button-secondary" name="preset1" value="<?php echo esc_attr('Add Demo Posts'); ?>"/>
                    </form>
                </li>
                <li class="theme-colors-preset2">
                    
                    <form method="post">
                        <input  type="submit" class="button-secondary" name="preset2" value="<?php echo esc_attr('Remove all Demo Posts and images'); ?>"/>
                    </form>
                </li>
                <li class="theme-colors-preset3">
                    
                    <form method="post">
                        <input  type="submit" class="button-secondary" name="preset3" value="<?php echo esc_attr('Add Demo Posts with Images'); ?>"/>
                    </form> 
                </li>
            </ul>
        </div>
        <!-- color-presets-radios -->
    </div>
    <!-- color-presets -->
    <div class="widget-layouts">
    



<?php 
if (isset($_POST) && !empty($_POST['preset1'])){
            $img = lunar_demo_image_upload( $bloginfo.'/images/hlm_demo_0.jpg' );

            for ($i=0; $i < 30; $i++) { 

            $post= array('post_title' => 'Stepfox Basic demo used for layout setup'.$i, 'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a felis mollis, fringilla ipsum sit amet, pretium tellus. Donec dignissim augue non diam iaculis fringilla id nec ipsum. Praesent sollicitudin suscipit lectus, ut hendrerit nisi semper eu. Duis ut elementum ex, eget posuere libero. Proin eu faucibus risus. Fusce eu massa dui. Quisque sit amet sem sed eros scelerisque placerat eget vel sem. In ac dignissim massa, eu elementum lorem. Curabitur dapibus vestibulum placerat. Aliquam lacinia vel est quis euismod.

            Pellentesque rutrum vestibulum porta. Sed tempor, leo a tristique iaculis, eros eros accumsan libero, eu interdum ligula neque ac diam. Aenean non ligula eu elit pellentesque feugiat. Phasellus elementum vel lorem sed fermentum. Aliquam dignissim efficitur orci quis bibendum. Donec in tempor lectus. Curabitur ac placerat nulla, id scelerisque risus. Ut in nisi accumsan, maximus lacus vel, congue ante. Fusce porttitor nunc quis facilisis tristique. Ut vitae euismod sem. Donec facilisis condimentum lorem in convallis.', 'post_status' => 'publish' );
            $post_ID = wp_insert_post( $post );
            set_post_thumbnail( $post_ID, $img  );

add_post_meta($post_ID, 'naslov', 'Stepfox Basic demo used for layout setup'.$i);
add_post_meta($post_ID, 'lice_za_kontakt', 'Petko');
add_post_meta($post_ID, 'nachin_za_kontakt', 'default');
add_post_meta($post_ID, 'mail', 'default');
add_post_meta($post_ID, 'facebook', 'default');
add_post_meta($post_ID, 'telefon', 'default');
add_post_meta($post_ID, 'sodrzina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a felis mollis, fringilla ipsum sit amet, pretium tellus. Donec dignissim augue non diam iaculis fringilla id nec ipsum. Praesent sollicitudin suscipit lectus, ut hendrerit nisi semper eu. Duis ut elementum ex, eget posuere libero. Proin eu faucibus risus. Fusce eu massa dui. Quisque sit amet sem sed eros scelerisque placerat eget vel sem. In ac dignissim massa, eu elementum lorem. Curabitur dapibus vestibulum placerat. Aliquam lacinia vel est quis euismod.');


$category = get_cat_ID( 'живеалишта' );
wp_set_post_categories($post_ID, $category);

update_field( 'valuta', 'Euro', $post_ID );
update_field( 'kategorija', '6', $post_ID );
update_field( 'cel_na_oglasot', 'prodava', $post_ID );
update_field( 'cena', '150000', $post_ID );
update_field( 'slika', 'default', $post_ID );
update_field( 'slikshe', 'default', $post_ID );
update_field( 'password', 'makaveli', $post_ID );
update_field( 'kilometraza', '100000', $post_ID );
update_field( 'kvadratura', '100', $post_ID );
//update_field( 'so_mebel', '100', $post_ID );
//txt
//add_post_meta($post_ID, 'cena', '150000');







// add_post_meta($post_ID, 'broj_na_sobi', 'default');
// add_post_meta($post_ID, 'greenje', 'default');
// add_post_meta($post_ID, 'broj_na_sprat', 'default');
// add_post_meta($post_ID, 'godina_na_proizvodstvo', 'default');
// add_post_meta($post_ID, 'menuvac', 'default');
// add_post_meta($post_ID, 'registracija', 'default');
// add_post_meta($post_ID, 'gorivo', 'default');
// add_post_meta($post_ID, 'karoserija', 'default');
// add_post_meta($post_ID, 'broj_na_vrati', 'default');
// add_post_meta($post_ID, 'brendovi', 'default');








            }


}elseif (isset($_POST) && !empty($_POST['preset2'])){

            //Delete Demo Posts
            $search_this = 'demo';
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,  
                's' => $search_this,
                'post_status' => 'publish',   
            );
            $lunar_magazine_posts = new WP_Query($args);
            while($lunar_magazine_posts->have_posts()) : $lunar_magazine_posts->the_post();
                $page_name_id = get_the_ID();
                wp_delete_post( $page_name_id, true );
            endwhile;   

            //Delete Demo Images
            $args1 = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image/jpeg,image/gif,image/jpg,image/png',  
                'post_status' => 'all',  
                'posts_per_page' => -1,  
                    );
            $lunar_magazine_posts1 = new WP_Query($args1);
            while($lunar_magazine_posts1->have_posts()) : $lunar_magazine_posts1->the_post();
                $image_title = get_the_title();
                if (strpos($image_title, 'stepfox_demo_') !== false) {
                    $att_name_id = get_the_ID();
                    wp_delete_attachment( $att_name_id, true );
                }
            endwhile;

}elseif (isset($_POST) && !empty($_POST['preset3'])){
                $img1 = lunar_demo_image_upload( $bloginfo.'/images/demo-posts/stepfox_demo_1.jpg' );
                $img2 = lunar_demo_image_upload( $bloginfo.'/images/demo-posts/stepfox_demo_2.jpg' );
                $img3 = lunar_demo_image_upload( $bloginfo.'/images/demo-posts/stepfox_demo_3.jpg' );
                $img4 = lunar_demo_image_upload( $bloginfo.'/images/demo-posts/stepfox_demo_4.jpg' );
                $img5 = lunar_demo_image_upload( $bloginfo.'/images/demo-posts/stepfox_demo_5.jpg' );
                for ($i=0; $i < 30; $i++) { 
                $post= array('post_title' => 'Stepfox Basic demo used for layout setup'.$i, 'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a felis mollis, fringilla ipsum sit amet, pretium tellus. Donec dignissim augue non diam iaculis fringilla id nec ipsum. Praesent sollicitudin suscipit lectus, ut hendrerit nisi semper eu. Duis ut elementum ex, eget posuere libero. Proin eu faucibus risus. Fusce eu massa dui. Quisque sit amet sem sed eros scelerisque placerat eget vel sem. In ac dignissim massa, eu elementum lorem. Curabitur dapibus vestibulum placerat. Aliquam lacinia vel est quis euismod.

                Pellentesque rutrum vestibulum porta. Sed tempor, leo a tristique iaculis, eros eros accumsan libero, eu interdum ligula neque ac diam. Aenean non ligula eu elit pellentesque feugiat. Phasellus elementum vel lorem sed fermentum. Aliquam dignissim efficitur orci quis bibendum. Donec in tempor lectus. Curabitur ac placerat nulla, id scelerisque risus. Ut in nisi accumsan, maximus lacus vel, congue ante. Fusce porttitor nunc quis facilisis tristique. Ut vitae euismod sem. Donec facilisis condimentum lorem in convallis.', 'post_status' => 'publish' );
                $post_ID = wp_insert_post( $post );

                }
                            $search_this = 'demo';
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => -1,  
                                's' => $search_this,
                                'post_status' => 'publish',   
                            );
                            $lunar_magazine_posts = new WP_Query($args);


                            $count = 0;
                            while($lunar_magazine_posts->have_posts()) : $lunar_magazine_posts->the_post();$count++;
                                $page_name_id = get_the_ID();
                                add_post_meta($page_name_id, 'lunar_magazine_post_views_count', '100000'); 
                                if($count == 1){
                                    set_post_thumbnail( $page_name_id, $img1 );
                                }
                                    elseif($count == 2){
                                        set_post_thumbnail( $page_name_id, $img2 );
                                    }
                                    elseif($count == 3){
                                        set_post_thumbnail( $page_name_id, $img3 );
                                    }
                                    elseif($count == 4){
                                        set_post_thumbnail( $page_name_id, $img4 );
                                    }
                                    elseif($count == 5){
                                        set_post_thumbnail( $page_name_id, $img5 );$count = 0;
                                    }


                            endwhile;   
}

    if (isset($_POST) && !empty($_POST['homepage'])){

                $post= array( 'post_title' => 'Homepage', 'post_content' => '', 'post_type' => 'page', 'post_status' => 'publish', 'page_template'  => 'home-page.php' );
                $post_ID = wp_insert_post( $post );
                update_option( 'page_on_front', $post_ID );
                update_option( 'show_on_front', 'page' );
    }


?>





</div>
<!-- theme-presets -->

<?php


}}







function change_post_taxonomy_44582( $post_id ) {

    $cat_name = $_POST['acf']['field_59c10b6551e59'];
    //$sub_cat_name = $_POST['acf']['field_59c10b6551e59'];
$category = get_cat_ID( $cat_name );

wp_set_post_categories($post_id, $category);


 $copy_title = array(
      'ID'           => $post_id,
      'post_title'   => $_POST['acf']['field_59be834a66357'],
      'post_content' => $_POST['acf']['field_59be82e419f23'],
  );

// Update the post into the database
  wp_update_post( $copy_title );



}
add_action('acf/save_post', 'change_post_taxonomy_44582', 20);





?>