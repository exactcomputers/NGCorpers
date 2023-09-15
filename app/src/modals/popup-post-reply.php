<div class="modal fade" id="modal-reply" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="tt-modal-title">
					<h3>Post comment</h3>
					<a class="pt-close-modal" href="javascript:void(0);" data-dismiss="modal">
						<svg class="icon">
							<use xlink:href="#icon-cancel"></use>
						</svg>
					</a>
				</div>
			</div>
			<div class="modal-body">
                <form class="comment-form" method="post">
                    <div class="form-default">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="5" placeholder="Enter your comment..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="thread-id" value="<?=$row['_id'] ?? ""?>" />
                            <button type="submit" name="comment-btn" class="btn btn-secondary btn-width-lg">Reply</button>
                        	<button type="button" class="btn btn-default btn-width-lg" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </div>
                </form> 
            </div>
		</div>
	</div>
</div>