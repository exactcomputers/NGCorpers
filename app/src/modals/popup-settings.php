<div id="js-popup-settings" class="tt-popup-settings">
		<div class="tt-btn-col-close">
			<a href="#">
				<span class="tt-icon-title">
					<svg>
						<use xlink:href="#icon-settings_fill"></use>
					</svg>
				</span>
				<span class="tt-icon-text">
					Settings
				</span>
				<span class="tt-icon-close">
					<svg>
						<use xlink:href="#icon-cancel"></use>
					</svg>
				</span>
			</a>
		</div>
		<div class="tt-tab-wrapper">
			<div class="tt-wrapper-inner">
				<ul class="nav nav-tabs pt-tabs-default" role="tablist">
					<li class="nav-item">
						<a class="nav-link show active" data-toggle="tab" data-name="profile" href="#tt-tab-11" role="tab"><span>Update Profile</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" data-name="password" href="#tt-tab-12" role="tab"><span>Change Password</span></a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane show fade active" id="tt-tab-11" role="tabpanel">
					<form class="form-default profile-form" method="post" enctype="multipart/form-data">
						<div class="tt-form-upload">
							<div class="row no-gutter">
								<div class="col-auto">
									<div class="tt-avatar input-avatar"></div>
								</div>
								<div class="col-auto ml-auto">
									<label for="upload-picture" class="btn btn-primary picture-label">Upload Picture</label>
									<input type="file" name="upload-picture" id="upload-picture" hidden>
								</div>
							</div>
							<span class="picture-name"></span>
						</div>
						<div class="form-group">
							<label for="settingsFullname">Fullname</label>
							<input type="text" name="fullname" class="form-control" id="settingsFullname" disabled required style="pointer-events:none" />
						</div>
						<div class="form-group">
							<label for="settingsUserName">Username</label>
							<input type="text" name="username" class="form-control" id="settingsUserName"  required>
						</div>
						<div class="form-group">
							<label for="settingsUserWebsite">Mobile No.</label>
							<input type="text" name="mobileno" class="form-control" id="settingsUserMobileNo" required>
						</div>
						<div class="form-group">
							<label for="settingsUserEmail">Email</label>
							<input type="text" name="email" class="form-control" id="settingsUserEmail"  required>
						</div>
						<!-- <div class="form-group">
							<label for="settingsUserAbout">About</label>
							<textarea name="bio" placeholder="Few words about you" class="form-control" id="settingsUserAbout"></textarea>
						</div> -->
						<div class="form-group">
							<label for="settingsUserAbout">Notify me via Email</label>
							<div class="checkbox-group">
								<input type="checkbox" id="settingsCheckBox01" name="replies">
								<label for="settingsCheckBox01">
									<span class="check"></span>
									<span class="box"></span>
									<span class="tt-text">When someone replies to my thread</span>
								</label>
							</div>
							<div class="checkbox-group">
								<input type="checkbox" id="settingsCheckBox02" name="likes">
								<label for="settingsCheckBox02">
									<span class="check"></span>
									<span class="box"></span>
									<span class="tt-text">When someone likes my thread or reply</span>
								</label>
							</div>
							<!-- <div class="checkbox-group">
								<input type="checkbox" id="settingsCheckBox03" name="checkbox">
								<label for="settingsCheckBox03">
									<span class="check"></span>
									<span class="box"></span>
									<span class="tt-text">When someone mentions me</span>
								</label>
							</div> -->
						</div>
						<div class="form-group">
							<button type="submit" name="profile-btn" class="btn btn-secondary">Save</button>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="tt-tab-12" role="tabpanel">
					<form class="form-default password-form" method="post">
						<div class="form-group">
							<label for="oldPassword">Current Password</label>
							<input type="password" name="old-password" class="form-control" id="oldPassword" placeholder="*******">
						</div>	
						<div class="form-group">
							<label for="newPassword">New Password</label>
							<input type="password" name="new-password" class="form-control" id="newPassword" placeholder="*******">
						</div>
						<div class="form-group">
							<label for="confirmPassword">Confirm Password</label>
							<input type="password" name="confirm-password" class="form-control" id="confirmPassword" placeholder="*******">
						</div>
						<div class="form-group">
							<button type="submit" name="paaword-btn" class="btn btn-primary btn-sm">Save Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- </div> -->

<?php include path('src', 'modals/btn-create'); ?>

<?php include path('src', 'modals/advanced-search'); ?>
