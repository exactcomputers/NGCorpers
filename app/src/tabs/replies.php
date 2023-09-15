<?php 
if ( $results = httpRequest("users/profile/replies", []) ) :
    foreach ($results as $posts) :
        ['title' => $title, 'slug' => $slug, 'category' =>  $category, 'comments' => $postComments] = $posts;
        foreach ($postComments as $comments) :
            ["_id" => $id, "user" => $user, "text" => $text, "date" => $date] = $comments; 
?> 
            <div class="tt-item">
                <div class="tt-col-avatar">
                    <svg class="tt-icon">
                        <use xlink:href="#icon-ava-d"></use>
                    </svg>
                </div>
                <div class="tt-col-description">
                    <h6 class="tt-title"><a href="topic/<?= $slug ?>">
                        <?= ucfirst($title) ?>
                    </a></h6>
                    <div class="row align-items-center no-gutters hide-desktope">
                        <div class="col-9">
                            <ul class="tt-list-badge">
                                <li class="show-mobile"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color06 tt-badge"><?= $category['name'] ?></span></a></li>
                            </ul>
                        </div>
                        <div class="col-3 ml-auto show-mobile">
                            <div class="tt-value"><?= toStringTime($date) ?></div>
                        </div>
                    </div>
                    <div class="tt-content">
                        <?= implode("...", [substr($text, 0, 100)," "]) ?>
                    </div>
                </div>
                <div class="tt-col-category"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color06 tt-badge"><?= $category['name'] ?></span></a></div>
                <div class="tt-col-value-large hide-mobile"><?= toStringTime($date) ?></div>
            </div>
<?php    
        endforeach;
    endforeach;
endif;
?>