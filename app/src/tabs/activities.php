<?php 
if ( $activities = httpRequest("users/profile/activities", []) ) :
    ['likes' => $likes, 'views' => $views] = $activities;
    foreach ($likes as $row) : 
        
    ['title' => $title, 'slug' => $slug, 'category' => $category, 'createdAt' => $createdAt] = $row;
?>
                        <div class="tt-item">
                            <div class="tt-col-avatar">
                                <svg class="tt-icon">
                                  <use xlink:href="#icon-ava-n"></use>
                                </svg>
                            </div>
                            <div class="tt-col-description">
                                <h6 class="tt-title">
                                    <a href="#">
                                    <?= $title ?>
                                    </a>
                                </h6>
                                <!-- <div class="tt-col-message">
                                    <a href="#">Dylan replied:</a> It’s time to channel your inner Magnum P.I., Ron Swanson or Hercule Poroit! It’s the time that all guys (or gals) love and all our partners hate It’s Movember!
                                </div> -->
                                <div class="row align-items-center no-gutters hide-desktope">
                                    <div class="col-9">
                                        <ul class="tt-list-badge">
                                            <li class="show-mobile"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color05 tt-badge"><?= $category['name'] ?></span></a></li>
                                        </ul>
                                        <a href="#" class="tt-btn-icon show-mobile">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="col-3 ml-auto show-mobile">
                                       <div class="tt-value"><?= toStringTime($createdAt) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color05 tt-badge"><?= $category['slug'] ?></span></div>
                            <div class="tt-col-value-large hide-mobile">
                                <a href="#" class="tt-btn-icon">
                                     <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                </a>
                            </div>
                            <div class="tt-col-value-large hide-mobile"><?= toStringTime($createdAt) ?></div>
                        </div>
<?php 
    endforeach; 
?>                   
    <!-- <div class="tt-row-btn">
        <button type="button" class="btn-icon js-topiclist-showmore">
            <svg class="tt-icon">
                <use xlink:href="#icon-load_lore_icon"></use>
            </svg>
        </button>
    </div> -->
<?php endif; ?>
                    
