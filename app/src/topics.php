<main id="tt-pageContent">
    <div class="container">
        <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                New Topics
            </h1>
            <div class="tt-topic-list">
                <div class="tt-list-header">
                    <div class="tt-col-topic">Topic</div>
                    <div class="tt-col-category">Category</div>
                    <div class="tt-col-value hide-mobile">Likes</div>
                    <div class="tt-col-value hide-mobile">Replies</div>
                    <div class="tt-col-value hide-mobile">Views</div>
                    <div class="tt-col-value">Activity</div>
                </div>
        <?php  
            if( $res = httpRequest("posts/new", []) ) :  ?>
                <?php if ( !$posts ) : ?>
                    <div class="tt-row-btn">
                        <button type="button" class="btn-icon ">
                            <svg class="tt-icon"  style="border: 2px solid #000; padding:3px"><use xlink:href="#icon-cancel"></use></svg>
                        </button>
                        <p>No Post Found!</p>
                    </div>
                <?php endif;
                if ( $posts ) :
                    $i = 0;
                    foreach( $posts as $post ) :                 
                        $i++;
                        $i = ( strlen($i) == 1 ) ? '0'.$i : $i;  ?>
                        <!-- list of topics -->
                        <div class="tt-item ">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                <use xlink:href="#icon-ava-<?=get_acronym($post['user']['username'])?>"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title">
                                <a href="topic/<?=$post['slug']?>" class="slug" data-id="<?=$post['slug']?>">
                                    <!-- <svg class="tt-icon">
                                    <use xlink:href="#icon-pinned"></use>
                                    </svg> -->
                                    <?=$post['title']?>
                                </a></h6>
                                <div class="row align-items-center no-gutters">
                                    <div class="col-11">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="cat/<?=$post['category']['slug']?>"><span class="tt-color01 tt-badge"><?=ucfirst($post['category']['name'])?></span></a></li>
                                            <?php 
                                            if ( count($post['tags']) > 0 ) {
                                                $tags = $post['tags'];
                                                foreach($tags as $tag) { ?>
                                                    <li><span class="tt-badge"><?=ucfirst($tag)?></span></li>
                                                <?php    
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-1 ml-auto show-mobile">
                                        <div class="tt-value"><?=time_elapsed($post['createdAt'])?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category"><a href="cat/<?=$post['category']['slug']?>"><span class="tt-color<?=$i?> tt-badge"><?=ucfirst($post['category']['name'])?></span></a></div>
                            <div class="tt-col-value hide-mobile"><?=count($post['likes'])?></div>
                            <div class="tt-col-value tt-color-select hide-mobile"><?=count($post['comments'])?></div>
                            <div class="tt-col-value hide-mobile"><?=count($post['views'])?></div>
                            <div class="tt-col-value hide-mobile"><?=time_elapsed($post['createdAt'])?></div>
                        </div>
                    <?php if( !isset($_SESSION['accessToken']) && ($i % 10) == 0 ) : include path("src", "incs/cta-reg"); endif; 
                    endforeach; ?>
                        <!-- more btn -->
                        <div class="tt-row-btn">
                            <button type="button" class="btn-icon js-topiclist-showmore">
                                <svg class="tt-icon">
                                <use xlink:href="#icon-load_lore_icon"></use>
                                </svg>
                            </button>
                        </div>
                <!-- end of more btn -->
                <?php endif; ?>
        <?php endif; ?>
            </div>
        </div>
    </div>
</main>

