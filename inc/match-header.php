<?php
function match_header(){

 ?>
                <!-- Game Result Bug-->
                <article class="game-result">
                  <div class="game-info game-info-creative">
                    <h1 class="h3"><?php echo get_the_title(); echo ' odds'; ?></h1>
                    <div class="game-info-main">
                      <div class="game-info-middle game-info-middle-vertical">
                        <time class="time-big" ><?php $myDateTime = get_field('start_time'); echo date('D d',$myDateTime);?><?php echo date('F Y',$myDateTime);?>
                        <span class="heading-3"><?php echo date ('H:i',$myDateTime); ?>
                        </time>
                        
                        <div class="group-sm">
                          <div class="button button-sm button-share-outline">Share
                            <ul class="game-info-share">

                              <li class="game-info-share-item"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="blank" title="<?php _e('Share this post on Facebook', 'examiner'); ?>" onclick="window.open(this.href,'window','width=640,height=480,resizable,scrollbars,toolbar,menubar') ;return false;" class="icon fa fa-facebook" href="#"></a></li>
                              <li class="game-info-share-item"><a href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?>" target="_blank" title="<?php _e('Share this post on Twitter', 'examiner'); ?>" onclick="window.open(this.href,'window','width=640,height=480,resizable,scrollbars,toolbar,menubar') ;return false;" class="icon fa fa-twitter" href="#"></a></li>
                              <li class="game-info-share-item"><a href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank" title="<?php _e('Share this post on Google Plus', 'examiner'); ?>" onclick="window.open(this.href,'window','width=640,height=480,resizable,scrollbars,toolbar,menubar') ;return false;"  class="icon fa fa-google-plus" href="#"></a></li>
                              <li class="game-info-share-item"><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank" title="<?php _e('Share this post on Reddit', 'examiner'); ?>" onclick="window.open(this.href,'window','width=640,height=480,resizable,scrollbars,toolbar,menubar') ;return false;" class="icon fa fa-reddit" href="#"></a></li>
                            </ul>
                      </div>
                    </div>
                    
                  </div>



                </article>





<?php

}
add_shortcode('match_header','match_header');