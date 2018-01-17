<div class="whitebg">
	<div class="article-cnt">
<!-- begin getimage -->
		<?php if($TEMPLATE_VARS['article']->getImageUrl()) { ?>
			<!--<div class="bg" style="backgrounds-image: url(<=$TEMPLATE_VARS['article']->getImageUrl(); ?>);">-->
		<!--	<img src="<$TEMPLATE_VARS['article']->getImageUrl(); ?>"> -->
			<img src="<?=UPLOADS_DIR . $TEMPLATE_VARS['article']->getImageUrl(); ?>">
		<?php } else { ?>
			<div class="bg bgimg">
			</div>	
		<?php } ?>

<!-- end getimage -->
		<div class="popin-content pcedit">
			<form method="POST"  enctype="multipart/form-data" action="">
				<div class="top">
					<span class="breadcrump bedit">
						<?php if($TEMPLATE_VARS['article']->user_id) { ?>	
							<?=htmlspecialchars(User::getUserName($TEMPLATE_VARS['article']->user_id))?> / 
							<?=htmlspecialchars($TEMPLATE_VARS['article']->date_published)?>
						<?php } ?>
					</span>
					<span class="right-side rsedit">
						<div class="select-options">
							<label for="status">Article status:</label>
							<select name="status">
								<option value="draft" <?=$TEMPLATE_VARS['article']->status==='draft' ? 'selected' : '' ?>> Draft</option>
								<option value="published" <?=$TEMPLATE_VARS['article']->status==='published' ? 'selected' : '' ?>> Published</option>
							</select>
							
						</div>
						<?php if (($TEMPLATE_VARS['actionMessage']) Xor ($TEMPLATE_VARS['validationMessage'])) { ?>
							<div class='validationError'>
								<?php echo $TEMPLATE_VARS['actionMessage']; ?> 
								<?php echo $TEMPLATE_VARS['validationMessage']; ?>
							</div>
						<?php } else { ?>
							<div class='validationError'>
								<?php echo $TEMPLATE_VARS['validationMessage']; ?>
							</div>
						<?php } ?>
					</span>
				</div><!-- end top div -->
				<input class="input-title" type="textarea" placeholder="articleTitle" 
						name="article-title" 
						value="<?=htmlspecialchars($TEMPLATE_VARS['article']->title)?>" />
				<textarea name="content" placeholder="articleContent"><?=
				htmlspecialchars($TEMPLATE_VARS['article']->description)
				?></textarea>
				<div class="form-footer">
					<label for="media">Upload Image:</label>
					<input type="file" name="media" accept="image/*"/>
					<?php if($TEMPLATE_VARS['article']->getImageUrl()) { ?>
						<label for="deleteImg">Delete Image:</label>
						<input name="deleteImg" type="checkbox" value="Yes">
					<?php } ?>
				</div>
				<input name="Submit" type="submit" value="Save article" />
				<input type="hidden" id="myArticleId" value="<?=htmlspecialchars($TEMPLATE_VARS['article']->id)?>">
			</form>
		</div>
	</div>
</div>

<!--<button id="111" value="222" onclick="manageComment('test',this);">Click me</button>-->

<script type="text/javascript" src="/public/js/ajaxRequest.js"></script>
<script type="text/javascript" src="/public/js/admin/article.js"></script>

<script>

function manageComment(arg1, arg2) {
	if (arg1 === 'accept') {
			/* global setCommentState */
		setCommentState(arg2.value, "approved");
   	// console.log('accept where id = ', arg2.value);
	} else if (arg1 === 'reject') {
		/* global setCommentState */
		setCommentState(arg2.value, "rejected");
   	// console.log('reject where id= ', arg2.value);
	}
	else { 
		console.log('unknown command', arg1);
	}
}

</script>

