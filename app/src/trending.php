
<main id="tt-pageContent">
    <div class="container">
        <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                Trending Topics
            </h1>
            <div class="tt-topic-list">
                <!-- subscribe to notification alert -->
                <div class="tt-topic-alert tt-alert-default d-none notification-alert" role="alert">
                    Do you want live notifications about new posts <a href="javascript:void(0);" class="enable-notification"> Enable Notifications</a>
                </div>
                <div class="tt-list-header">
                    <div class="tt-col-topic">Topic</div>
                    <div class="tt-col-category">Category</div>
                    <div class="tt-col-value hide-mobile">Likes</div>
                    <div class="tt-col-value hide-mobile">Replies</div>
                    <div class="tt-col-value hide-mobile">Views</div>
                    <div class="tt-col-value">Activity</div>
                </div>
                <div class="all-trending-posts">
            <?php  
            if ( $threndPosts = httpRequest("posts/trends", ["limit" => 10]) ) :
                ['posts' => $posts, 'count' => $count] = $threndPosts;
                $i = 0; 
                foreach( $posts as $post ) :
                    $i++; 
                    $iStr = str_pad($i, 2, "0", STR_PAD_LEFT); // Pad with leading zeros

                    // Destructure the post array for cleaner code
                    ['user' => $user, 'slug' => $slug, 'title' => $title, 'category' => $category, 'tags' => $tags, 'createdAt' => $createdAt, 'likes' => $likes, 'comments' => $comments, 'views' => $views] = $post;
                    ?>
                    <!-- <div class="tt-item tt-itemselect"> -->
                    <div class="tt-item ">
                        <div class="tt-col-avatar">
                            <svg class="tt-icon">
                            <use xlink:href="#icon-ava-<?= get_acronym($user['username']) ?>"></use>
                            </svg>
                        </div>
                        <div class="tt-col-description">
                            <h6 class="tt-title">
                            <a href="topic/<?= $slug ?>" class="slug" data-id="<?= $slug ?>">
                                <!-- <svg class="tt-icon">
                                <use xlink:href="#icon-pinned"></use>
                                </svg> -->
                                <?= $title ?>
                            </a></h6>
                            <div class="row align-items-center no-gutters">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile"><a href="cat/<?= $category['slug'] ?>"><span class="tt-color01 tt-badge"><?= ucfirst($category['name']) ?></span></a></li>
                                        <?php
                                        if (!empty($tags)) {
                                            foreach ($tags as $tag) {
                                                echo '<li><span class="tt-badge">' . trim($tag) . '</span></li>';
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
                        <div class="tt-col-value tt-color-select hide-mobile"><?= count($comments) ?></div>
                        <div class="tt-col-value hide-mobile"><?= count($views) ?></div>
                        <div class="tt-col-value hide-mobile"><?= toStringTime($createdAt) ?></div>
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="no-posts"></div>
                <?php if ( count($posts) < $count ) : ?>
                <div class="tt-row-btn">
                    <button type="button" class="btn-icon js-topiclist-showmore">
                        <svg class="tt-icon">
                        <use xlink:href="#icon-load_lore_icon"></use>
                        </svg>
                    </button>
                </div>
            <?php 
                endif;
            endif; 
            ?>
        </div>
    </div>
</main>

