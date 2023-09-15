<main id="tt-pageContent">
    <div class="container">
    <?php
        $slug = isset($_GET['slug']) ? $_GET['slug'] : "";
        $userId = isset($_SESSION['currentUser']) ? $_SESSION['currentUser']['_id'] : "";
        if ( $row = httpRequest("posts/$slug", []) ) : ?>
        <div class="tt-single-topic-list">
            <div class="tt-item">
                 <div class="tt-single-topic" >
                    <div class="tt-item-header">
                        <div class="tt-item-info info-top">
                            <div class="tt-avatar-icon">
                                <i class="tt-icon"><svg><use xlink:href="#icon-ava-<?= get_acronym($row['user']['username']); ?>"></use></svg></i>
                            </div>
                            <div class="tt-avatar-title">
                               <?= ucfirst($row['user']['username']); ?>
                            </div>
                            <div class="tt-info-time">
                                <!-- <i class="tt-icon"><svg><use xlink:href="#icon-time"></use></svg></i> -->
                                <?= date("M. j, Y", strtotime($row['createdAt'])); ?>
                            </div>
                        </div>
                        <h3 class="tt-item-title">
                            <a href="topic/<?= $row['slug']; ?>"><?= $row['title']; ?></a>
                        </h3>
                        <div class="tt-item-tag">
                            <ul class="tt-list-badge">
                                <li><a href="cat/<?=$row['category']['slug']?>"><span class="tt-color03 tt-badge"><?= ucfirst($row['category']['name']); ?></span></a></li>
                                <?php 
                                if ( count($row['tags']) > 0 ) {
                                    // $tags = explode(",", $tags);
                                    foreach($row['tags'] as $tag) { ?>
                                        <li><span class="tt-badge"><?= trim($tag); ?></span></li>
                                    <?php    
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="wrapper">
                    <?php if (@$row['picUrl']) : ?>
                        <div class="img-responsive"><img src="<?= $row['picUrl']; ?>" alt="<?= $row['title']; ?>" srcset="<?= $row['picUrl']; ?> 2x" class="mfp-img"></div>
                        <?php 
                    endif;
                    ?>
                    </div>
                    <div class="tt-item-description">
                        <?= specialchars_decode($row['content']); ?>
                    </div>
                    <div class="tt-item-info info-bottom">
                        <a href="javascript:void(0);" class="tt-icon-btn">
                            <i class="tt-icon"><?= showLike($row); ?></i>
                            <span class="tt-text like-count"><?= count($row['likes']) ?></span>
                        </a>
                        <div class="col-separator"></div>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-share" class="tt-icon-btn tt-hover-02 tt-small-indent">
                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                        </a>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" class="tt-icon-btn tt-hover-02 tt-small-indent">
                             <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php include path("src", "incs/thread-status"); ?>
            <div class="comments-wrapper"><?php include path("src", "incs/replies"); ?></div>
        </div>
        <?php include path("src", "modals/popup-share"); ?>
        <div class="tt-wrapper-inner">
            <h4 class="tt-title-separator"><span>You’ve reached the end of replies</span></h4>
        </div>
        <?php isset($_SESSION['accessToken']) ? include path("src", "modals/popup-post-reply") : "";
        endif;
        !isset($_SESSION['accessToken']) ? include path("src", "incs/cta-reg") : "";
        ?>
    </div>
</main>

