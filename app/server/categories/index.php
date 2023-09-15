<?php
/**
 * Comment and Reply Script
 * Topic script
 * @return string data result
 */
require_once dirname(__DIR__) . '/index.php';
    
    //init http request
    $req = new HttpRequest(API."categories/", "GET", []);
    $response = $req->get();
    //var_dump($response);
    $count = 0;
    $categories = json_decode($response, true);
    if( $req->info == "200" ) {
        //check if status is ok
        if( isset($categories['status']) && $categories['status'] === 'ok' ) { ?>
            <div class="row">
            <?php foreach ($categories['data'] as $cats) : 
                if ( strlen($count++) == 1 && $count++ < 10 ) {
                    $i = '0'.$count++;
                } elseif ( $count == 21 ) {
                    $count = 1;
                    $i = '0'.$count++;
                } else{
                    $i = $count++;
                }
                    ?>
                <div class="col-md-6 col-lg-4">
                    <div class="tt-item">
                        <div class="tt-item-header">
                            <ul class="tt-list-badge">
                                <li><a href="cat/<?=$cats['taxonomy']?>"><span class="tt-color<?=$i?> tt-badge"><?=ucfirst($cats['taxonomy'])?></span></a></li>
                            </ul>
                            <h6 class="tt-title"><a href="cat/<?=$cats['taxonomy']?>">Threads - <?=$cats['post']['threads']?></a></h6>
                        </div>
                        <div class="tt-item-layout">
                           <div class="innerwrapper">
                               <?=$cats['description']?>
                           </div>
                           <div class="innerwrapper">
                                <h6 class="tt-title">Similar TAGS</h6>
                                <ul class="tt-list-badge">
                                <?php 
                                if ( $tags = $cats['post']['tags'] ) {
                                    $tags = explode(",", $tags);
                                    foreach($tags as $tag) { ?>
                                        <li><a href="tags/<?=trim($tag)?>"><span class="tt-badge"><?=$tag?></span></a></li>
                                    <?php    
                                    }
                                }
                                ?>
                                </ul>
                           </div>
                           <a href="javascript:;" class="tt-btn-icon">
                                <i class="tt-icon favorite" data-id="<?=$cats['term_id'];?>"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- <div class="col-12">
                    <div class="tt-row-btn">
                        <button type="button" class="btn-icon js-topiclist-showmore">
                            <svg class="tt-icon">
                              <use xlink:href="#icon-load_lore_icon"></use>
                            </svg>
                        </button>
                    </div>
                </div> -->
            </div>
    <?php }
    }