<main id="tt-pageContent">
<?php userLoggedIn(); ?>
<div class="container">
        <div class="tt-wrapper-inner">
            <h1 class="tt-title-border">
                Create New Topic
            </h1>
            <form class="form-default create-form" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="inputSubjectTitle">Subject or Title</label>
                    <div class="tt-value-wrapper">
                        <input type="text" name="title" maxLength="99" class="form-control" id="inputSubjectTitle" placeholder="Subject of your topic">
                        <span class="tt-value-input">99</span>
                    </div>
                    <div class="tt-note">Describe your topic well, while keeping the subject as short as possible.</div>
                </div>
                <div class="form-group mb-4">
                    <div class="">
                        <label for="inputFileImage">Choose an Image</label>
                        <input type="file" name="image" id="inputFileImage"  />
                    </div>
                    <small>Allowed image format (png, jpg, jpeg, and gif) of maximum size 500kb</small>
                </div>
                <div class="form-group mb-4">
                    <label for="textareaContent">Content</label>
                    <textarea name="content" class="form-control" id="textareaContent" rows="3" placeholder="Lets get started"></textarea>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="selectCategory">Category</label>
                            <select name="category" id="selectCategory" class="form-control">
                                <option value="">-- Select Category</option>
                                <?php if ($categories = categoryOption()) {
                                    array_map(function($row) {
                                        printf('<option value="%s">%s</option>', $row['slug'], ucfirst($row['name']));
                                    }, $categories);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputTopicTags">Tags</label>
                            <input type="text" name="tags" class="form-control" id="inputTopicTags" placeholder="Use comma to separate tags">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto ml-md-auto">
                        <span class="font-weight-bold text-sm">Please be aware that newly created posts are held for review before being published.</span>
                        <button type="submit" name="create-btn" class="btn btn-nc btn-width-lg">Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>