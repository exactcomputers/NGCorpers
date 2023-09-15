<?php
/**
 * Comment and Reply Script
 * Topic script
 * @return string data result
 */
require_once dirname(__DIR__) . '/index.php';
    
if ( isset($_GET['slug']) ) {
    // echo $_GET['slug'];
    $data = array("slug" => $_GET['slug']);
    //init http request
    $req = new HttpRequest(API."categories/", "GET", $data);
    $response = $req->get();
    //var_dump($response);
    $count = 0;
    $categories = json_decode($response, true);
    if( $req->info == "200" ) {
        //check if status is ok
        if( isset($categories['status']) && $categories['status'] === 'ok' ) {
            if ( $categories['data'] ) { ?>
                <div class="tt-catSingle-title">
                    <div class="tt-innerwrapper tt-row">
                        <div class="tt-col-left">
                            <ul class="tt-list-badge">
                                <li><a href="cat/<?=$categories['data'][0]['taxonomy']?>"><span class="tt-color01 tt-badge"><?=ucfirst($categories['data'][0]['taxonomy'])?></span></a></li>
                            </ul>
                        </div>
                        <div class="ml-left tt-col-right">
                            <div class="tt-col-item">
                                <h2 class="tt-value">Threads - <?=$categories['data'][0]['threads']?></h2>
                            </div>
                            <div class="tt-col-item">
                                <a href="#" class="tt-btn-icon">
                                    <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                </a>
                            </div>
                            <div class="tt-col-item">
                                <div class="tt-search">
                                    <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                    <form class="search-wrapper">
                                        <div class="search-form">
                                            <input type="text" class="tt-search__input" placeholder="Search in <?=$categories['data'][0]['taxonomy']?>">
                                            <button class="tt-search__btn" type="submit">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-search"></use>
                                                </svg>
                                            </button>
                                            <button class="tt-search__close">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-cancel"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tt-innerwrapper">
                    <?=htmlspecialchars_decode($categories['data'][0]['description'])?>
                    </div>
                    <div class="tt-innerwrapper">
                        <h6 class="tt-title">Similar TAGS</h6>
                        <ul class="tt-list-badge">
                        <?php 
                        if ( $tags = $categories['data'][0]['tags'] ) {
                            $tags = explode(",", $tags);
                            foreach($tags as $tag) { ?>
                                <li><a href="tags/<?=trim($tag)?>"><span class="tt-badge"><?=$tag?></span></a></li>
                            <?php    
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div>
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
                foreach( $categories['data'][0]['posts'] as $cats ) {  
                    if ( strlen($count++) == 1 && $count++ < 10 ) {
                        $i = '0'.$count++;
                    } elseif ( $count == 21 ) {
                        $count = 1;
                        $i = '0'.$count++;
                    } else{
                        $i = $count++;
                    }
                    ?>
                    <div class="tt-item ">
                        <div class="tt-col-avatar">
                            <svg class="tt-icon">
                            <use xlink:href="#icon-ava-<?=get_acronym($categories['data'][0]['author'])?>"></use>
                            </svg>
                        </div>
                        <div class="tt-col-description">
                            <h6 class="tt-title"><a href="topic/<?=$cats['post_name']?>" class="slug" data-id="<?=$cats['post_name']?>">
                                <!-- <svg class="tt-icon">
                                <use xlink:href="#icon-pinned"></use>
                                </svg> -->
                                <?=$cats['post_title']?>
                            </a></h6>
                            <div class="row align-items-center no-gutters">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile"><a href="cat/<?=$categories['data'][0]['taxonomy']?>"><span class="tt-color<?=$i?> tt-badge"><?=$categories['data'][0]['taxonomy']?></span></a></li>
                                        <?php 
                                        if ( $post_tags = $cats['post_tags'] ) {
                                            $post_tags = explode(",", $post_tags);
                                            foreach($post_tags as $post_tag) { ?>
                                                <li><a href="tags/<?=trim($post_tag)?>"><span class="tt-badge"><?=$post_tag?></span></a></li>
                                            <?php    
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-1 ml-auto show-mobile">
                                    <div class="tt-value"><?=time_elapsed($cats['post_date'])?></div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-category"><span class="tt-color<?=$i?> tt-badge"><?=$categories['data'][0]['taxonomy']?></span></div>
                        <div class="tt-col-value hide-mobile"><?=$categories['data'][0]['likes']?></div>
                        <div class="tt-col-value tt-color-select hide-mobile"><?=$cats['comment_count']?></div>
                        <div class="tt-col-value hide-mobile"><?=$cats['views']?></div>
                        <div class="tt-col-value hide-mobile"><?=time_elapsed($cats['post_date'])?></div>
                    </div>
                    <?php
                }
                ?>
                    <!-- <div class="tt-row-btn">
                        <button type="button" class="btn-icon js-topiclist-showmore">
                            <svg class="tt-icon">
                            <use xlink:href="#icon-load_lore_icon"></use>
                            </svg>
                        </button>
                    </div> -->
                </div>
                <?php 
            }
        }
    }
}
