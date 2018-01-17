<header>
   <div class="blogHeaderImg blog"><div class="overlay"></div></div>
   <div class="tableCentering">
      <div class="tableCellCentering">
         <div class="headerTitle">Pagina de blog</div>
         <div class="headerDesc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod finibus arcu eget efficitur.s.
         </div>
      </div>
   </div>
</header>

<div class="content">
   <?php if ($TEMPLATE_VARS['globalError']) { ?>
 			<div class="globalError">
 				<?=$TEMPLATE_VARS['globalError'] ?>
 			</div>
 	<?php } ?>	
   <div class="content-left">
   <!-- begin article listing -->
      <?php foreach ($TEMPLATE_VARS['articles'] as $article) { ?>
         <article>
            <!-- begin article image listing or default if none available -->
            <?php if(Media::getStaticImageUrl($article['id'])) { ?>
      			<div class="article-image" style="background-image: url(<?=UPLOADS_DIR . Media::getStaticImageUrl($article['id']); ?>);"></div>
      		<?php } else { ?>
      			<div class="article-image zebra"></div>	
      		<?php } ?>
            <!-- end article image -->
                           <!-- <div class="article-image zebra"></div> -->
            <!-- begin article content -->
            <a href="?page=article&id=<?=$article['id']?>">
               <h1><?=htmlspecialchars($article['title'])?></h1>
            </a>
            <span class="art-breadcrump">
               POSTED BY:
               <?=htmlspecialchars(User::getUserName($article['user_id']))?> /
               <?=htmlspecialchars($article['date_published'])?> 
               <?php if (isset($_SESSION['loggedUserId'])) { if ($article['user_id'] == $_SESSION['loggedUserId']) { ?>
         			<a href="/admin.php?page=article&id=<?=$article['id']?>" 
         			   title="edit article"> edit </a>
      		   <?php } } ?>
            </span>
            <p>
               <?=shortArticle2(htmlspecialchars($article['description']),200)?>
            </p>
         <!-- se doreste ca titlul sa fie link-ul ... pastram codul in cazul in care revenim la photoshop!-->
             <a style="display: none" href="?page=article&id=<?=$article['id']?>"> Citeste mai mult ... </a>
         </article>
   	<?php } ?>
   <!-- end article listing --> 
   
   <!-- begin Pagination -->
   	<div class='paginator'>
   		<?php if ($TEMPLATE_VARS['currentPage'] > 1) { ?>
   			<a class='zerospacing' href="/index.php?p=1<?=$TEMPLATE_VARS['searchText']?>" title="first page"> &lt&lt </a>
   		<?php } ?>	
   		<?php if ($TEMPLATE_VARS['currentPage'] > 2) { ?>
   			<a href="/index.php?p=<?=$TEMPLATE_VARS['prevPage'] . $TEMPLATE_VARS['searchText']?>" title="previous page"> &lt </a>
   		<?php } ?>	
   		<?php for ($i = 1; $i <= $TEMPLATE_VARS['totalPages']; $i++) { ?>
   			<?php if ($TEMPLATE_VARS['currentPage'] != $i) { ?>
   				<a href="/index.php?p=<?=$i . $TEMPLATE_VARS['searchText'] ?>"> 
   					<?=$i ?> 
   				</a>
   			<?php } else { ?>
   				<span class="activeP" alt="Current Page"> 
   					<?=$i ?> 
   				</span>	
   			<?php } ?>
   		<?php } ?>
   		<?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages'] - 1) { ?>	
   			<a href="/index.php?p=<?=$TEMPLATE_VARS['nextPage'] . $TEMPLATE_VARS['searchText']?>" title="next page"> &gt </a>
   		<?php } ?>	
   		<?php if ($TEMPLATE_VARS['currentPage'] < $TEMPLATE_VARS['totalPages']) { ?>	
   			<a class='zerospacing last' href="/index.php?p=<?=$TEMPLATE_VARS['totalPages'] . $TEMPLATE_VARS['searchText']?>" title="last page"> &gt&gt </a>
   		<?php } ?>	
   	</div>	
	<!-- end pagination -->
     
   </div><!-- end content-left-->

   <div class="content-right">
      <p> SEARCH </p>
      <div class="search">
         <span class="fa fa-search"></span>
         <form method="GET">
            <input name="s" type="search" placeholder="Cauta si ti se va da...">
         </form>
      </div>
      <p> PARAGRAF DE TEXT </p>
      <div class="paragraf">
         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod finibus arcu eget efficitur. Morbi commodo ut risus sed sollicitudin. Etiam non nibh eget diam tristique hendrerit id eu mauris.
      </div>
      <div class="paragraf" style="margin: 20px 0;">
         <a href="/?page=slideshow">Click here for slideshow</a>
      </div>
      <div class="paragraf">
         <a href="/admin.php">Admin area</a>
      </div>
      <div class="paragraf">
         <a href="/firme.php">Firme app</a>
      </div>
   </div><!-- end content-right-->
</div><!-- end content -->
  