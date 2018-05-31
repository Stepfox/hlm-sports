<?php 

function hlm_sports_ctm(){ 

    ?>
<a href="" target="_blank">
    <div class="hlm-cta-button">

            <?php the_field('bet_now', 'option');  ?>

    </div>
</a>

<?php 
} 


add_shortcode('hlm_sports_ctm','hlm_sports_ctm');


?>