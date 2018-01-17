<div class="content-left">
	<!-- 
	begin will be moved 
	used to show a mesage when an article is deleted
	-->
		<?php if ($TEMPLATE_VARS['deleted']) { ?>
			<div class="validationError">
				<?php echo $TEMPLATE_VARS['deleted']; ?>
			</div>
		<?php } ?>
	<!-- end will be moved -->
	<div class="inbox box">
		<div class="inboxHeader">
			<div class="smc">
				<div class="small-message">...</div>
			</div>
			<span class="inboxHText">Inbox </span>
		</div>
		<div class="inboxContent">
			<p class=inboxCText>
				Want to see how your emails look in over 50+ desktop, mobile, and webmail clients, including in plain text? Never forget to include plain text as part of your next email campaign with Litmus Checklist.
			</p>
			<a href="#" class="read-more">Read more</a>
		</div>
	</div>
	<!-- begin article listing -->
	<?php foreach ($TEMPLATE_VARS['articles'] as $article) { ?>
		<div class="laptop box">
			
			
		<?php if(Media::getStaticImageUrl($article['id'])) { ?>
			<div class="laptop-img-div" style="background-image: url(<?=THUMBNAILS_DIR . Media::getStaticImageUrl($article['id']); ?>);">
				<a href="/admin.php?page=article-delete&id=<?=$article['id']?>" 
					class="aclose hidden"></a>
			</div>
		<?php } else { ?>
			<div class="laptop-img-div laptop-img">
				<a href="/admin.php?page=article-delete&id=<?=$article['id']?>" 
					class="aclose hidden"></a>
			</div>
		
		<?php } ?>
		
			<a href="/admin.php?page=article&id=<?=$article['id']?>">
				<p class="product-img-text"> <?=htmlspecialchars($article['title'])?> </p>
			</a>
		</div>
	<?php } ?>
	<!-- end article listing -->
	<!-- begin Pagination -->
	<div class='paginator' style="clear: both;">
		<?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
			<a class='zerospacing' href="/admin.php?p=1" title="first page"> &lt&lt </a>
			<a href="/admin.php?p=<?=$TEMPLATE_VARS['currentPage'] - 1 ?>" title="previvious page"> &lt </a>
		<?php } ?>		
		<?php for ($i = 1; $i <= $TEMPLATE_VARS['totalPages']; $i++) { ?>
			<?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
				<a href="/admin.php?p=<?=$i ?>"> 
					<?=$i ?> 
				</a>
			<?php } else { ?>
				<span class="activeP" alt="Current Page"> 
					<?=$i ?> 
				</span>	
			<?php } ?>
		<?php } ?>
		<?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages']) { ?>	
			<a href="/admin.php?p=<?=$TEMPLATE_VARS['currentPage'] + 1 ?>" title="next page"> &gt </a>
			<a class='zerospacing last' href="/admin.php?p=<?=$TEMPLATE_VARS['totalPages'] ?>" title="last page"> &gt&gt </a>
		<?php } ?>	
	</div>	
	<!-- end pagination -->
	<!--
	<div class="laptop box">
		<div class="laptop-img-div"></div>
		<a href="article.html">
			<p class="product-img-text"> New Product </p>
		</a>
	</div>
	-->
	
</div><!-- end left content -->

<div class="content-right">
	<div class="comments box">
		<div class="comments-logo">
			<div class=message>...</div>
		</div>
		<div class="comments-text"><!--unused class -->
			<p class="com-viewNumbers">
			<?=Article::countIt('')[0]['total']?>	
			 </p>
			<p class="com-viewText">Articles</p>
			<!-- temporary modification
			<p class="com-viewNumbers">52 </p>
			<p class="com-viewText">Comments</p>
			-->
		</div>
	</div>
	<div class="views box">
		<div class="views-logo">
			<div class=eye> </div>
		</div>
		<div class="textInfo">
			<p class="com-viewNumbers">
			<?=Comment::countIt('')[0]['total']?>
			</p>
			<p class="com-viewText">Comments</p>
			<!-- temporary modification
			<p class="com-viewNumbers">26.4k </p>
			<p class="com-viewText">Views</p>
			-->
		</div>
	</div>
	<div class="donuts box">
		<div class="boxss" id="piechart"></div>
	</div>
</div><!-- end right content -->
<div class="clear-fixit"></div>
<script type='text/javascript' src='public/js/chart.js'></script>