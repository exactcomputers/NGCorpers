<?php 
if ( $threads = httpRequest("users/profile/threads", []) ) :
    $i = 0;
    foreach ($threads as $row) : 
    $i++;
    $iStr = str_pad($i, 2, '0', STR_PAD_LEFT); // pad left

    ['user' => $user, 'slug' => $slug, 'title' => $title, 'category' => $category, 'tags' => $tags, 'likes' => $likes, 'comments' => $comments, 'views' => $views, 'createdAt' => $createdAt] = $row; 
    ?>
        <div class="tt-item">
            <div class="tt-col-avatar">
                <svg class="tt-icon">
                    <use xlink:href="#icon-ava-<?= get_acronym($user['username']) ?>"></use>
                </svg>
            </div>
            <div class="tt-col-description">
                <h6 class="tt-title">
                    <a href="topic/<?= $slug ?>">
                        <?= $title ?>
                    </a>
                </h6>
                <div class="row align-items-center no-gutters">
                    <div class="col-11">
                        <ul class="tt-list-badge">
                            <li class="show-mobile"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color<?= $iStr ?> tt-badge"><?= ucfirst($category['name']) ?></span></a></li>
                            <?php
                            if ( count($tags) > 0 ) {
                                foreach ($tags as $tag) { ?>
                                    <li><span class="tt-badge"><?= ucfirst($tag) ?></span></li>
                                <?php 
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-1 ml-auto show-mobile">
                        <div class="tt-value"><?= toStringTime($createdAt) ?></div>
                    </div>
                </div>
            </div>
            <div class="tt-col-category"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color<?= $iStr ?> tt-badge"><?= ucfirst($category['name']) ?></span></a></div>
            <div class="tt-col-value hide-mobile"><?= count($likes) ?></div>
            <div class="tt-col-value tt-color-select  hide-mobile"><?= count($comments) ?></div>
            <div class="tt-col-value hide-mobile"><?= count($views) ?></div>
            <div class="tt-col-value hide-mobile"><?= toStringTime($createdAt) ?></div>
        </div>
    <?php endforeach; ?>
        <!-- <div class="tt-row-btn">
            <button type="button" class="btn-icon js-topiclist-showmore">
                <svg class="tt-icon">
                    <use xlink:href="#icon-load_lore_icon"></use>
                </svg>
            </button>
        </div> -->
<?php endif; ?>