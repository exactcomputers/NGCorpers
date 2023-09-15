<?php $slug = isset($_GET['slug']) ? $_GET['slug'] : ''; ?>
    <div class="container" >
        <?php if ( $res = httpRequest("categories/$slug", []) ) : ?>
        <div class="tt-catSingle-title">
                <div class="tt-innerwrapper tt-row">
                    <div class="tt-col-left">
                        <ul class="tt-list-badge">
                            <li><a href="cat/<?=$res['category']['slug']?>"><span class="tt-color01 tt-badge"><?=ucfirst($res['category']['name'])?></span></a></li>
                        </ul>
                    </div>
                    <div class="ml-left tt-col-right">
                        <div class="tt-col-item">
                            <h2 class="tt-value">Threads - <?=count($res['posts'])?></h2>
                        </div>
                        <!-- <div class="tt-col-item">
                            <a href="javascript:void(0);" class="tt-btn-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            </a>
                        </div> -->
                        <div class="tt-col-item">
                            <div class="tt-search">
                                <button class="tt-search-toggle" data-toggle="modal" data-target="#modalAdvancedSearch">
                                <svg class="tt-icon">
                                    <use xlink:href="#icon-search"></use>
                                    </svg>
                                </button>
                                <form class="search-wrapper">
                                    <div class="search-form">
                                        <input type="text" class="tt-search__input" placeholder="Search in <?=$slug?>">
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
                    <?=$res['category']['description']?>
                </div>
                <div class="tt-innerwrapper">
                    <h6 class="tt-title">Similar TAGS</h6>
                    <ul class="tt-list-badge">
                        <?php 
                            $post_tags = array_column($res['posts'], 'tags');
                            array_map(function($tag) {
                                printf('<li><span class="tt-badge">%s</span></li>', trim($tag));
                            }, mergeArrays($post_tags));
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

            <?php  $count = 0;  
            foreach ($res['posts'] as $row) :
                $i = (strlen($count++) == 1) ? '0'.$count++ : $count++; ?>
            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-ava-<?=get_acronym($row['user']['username'])?>"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="topic/<?=$row['slug']?>">
                        <?=ucfirst($row['title'])?>
                    </a></h6>
                    <div class="row align-items-center no-gutters">
                        <div class="col-11">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="cat/<?=$row['category']['slug']?>"><span class="tt-color01 tt-badge"><?=ucfirst($row['category']['name'])?></span></a></li>
                                <?php 
                                if ( count($row['tags']) > 0 ) {
                                    foreach($row['tags'] as $tag) { ?>
                                        <li><span class="tt-badge"><?=trim($tag)?></span></li>
                                    <?php    
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-1 ml-auto show-mobile">
                            <div class="tt-value"><?=toStringTime($row['createdAt'])?></div>
                        </div>
                    </div>
                </div>
                <div class="tt-col-category"><a href="cat/<?=$row['category']['slug']?>"><span class="tt-color<?=$i?> tt-badge"><?=ucfirst($row['category']['name'])?></span></a></div>
                <div class="tt-col-value hide-mobile"><?=count($row['likes'])?></div>
                <div class="tt-col-value tt-color-select hide-mobile"><?=count($row['comments'])?></div>
                <div class="tt-col-value hide-mobile"><?=count($row['views'])?></div>
                <div class="tt-col-value hide-mobile"><?=toStringTime($row['createdAt'])?></div>
            </div>             
            <?php endforeach; ?>
       
            <div class="tt-row-btn">
                <button type="button" class="btn-icon js-topiclist-showmore">
                    <svg class="tt-icon">
                      <use xlink:href="#icon-load_lore_icon"></use>
                    </svg>
                </button>
            </div>
        </div>
        <?php endif; ?>
    </div>


