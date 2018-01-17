<header>
   <?php if($TEMPLATE_VARS['article']->getImageUrl()) { ?>
		<div class="blogHeaderImg" style="background-image: url(<?=UPLOADS_DIR . $TEMPLATE_VARS['article']->getImageUrl(); ?>);"><div class="overlay"></div></div>
	<?php } else { ?>
      <div class="blogHeaderImg article"><div class="overlay"></div></div>
	<?php } ?>
   
   <div class="tableCentering">
      <div class="tableCellCentering">
        <a href="?page=blog" style="text-decoration: none"> 
           <div class="headerTitle"><?=htmlspecialchars($TEMPLATE_VARS['article']->title)?></div>
        </a>
        <!-- scos din uz parca nu avea ce cauta in titlu -->
         <div style="display: none" class="headerDesc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod finibus arcu eget efficitur.s.
         </div>
      </div>
   </div>
</header>

<div class="art-content">
   <div class="art-top">
      <span class="art-breadcrump">
         POSTED BY: ADMIN /
         <?=htmlspecialchars($TEMPLATE_VARS['article']->date_published)?> 
      </span>
   </div>
   <p>
      <?=nl2br(htmlspecialchars($TEMPLATE_VARS['article']->description))?>
   </p>
   
   <!--<h2>Subtitlu si detalii</h2>-->
   <!--<p>-->
   <!--   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod finibus arcu eget efficitur. Morbi commodo ut risus sed sollicitudin. Etiam non nibh eget diam tristique hendrerit id eu mauris. Maecenas egestas eros id vestibulum pretium.-->
   <!--</p>-->
   <!--<p>-->
   <!--   Nullam consectetur rutrum erat quis facilisis. Maecenas ligula ex, ultrices sed augue et, placerat venenatis lectus. In aliquet in diam et aliquam. Pellentesque vestibulum libero vitae tincidunt rutrum. Vestibulum ante ipsum primis in faucibus orci luctus-->
   <!--   et ultrices posuere cubilia Curae; In vitae dictum libero, ac cursus arcu. Sed ac nulla metus. Cras dictum vulputate congue. Cras erat sem, interdum eget ullamcorper a, egestas nec erat. Nullam gravida ligula nec leo pulvinar, id mattis ante tristique.-->
   <!--</p>-->
   
   <!--<h2>Subtitlu si detalii nr. 2</h2>-->
   <!--<p>-->
   <!--   Duis lorem nunc, interdum convallis odio sit amet, egestas feugiat ex. Proin porttitor, odio iaculis varius consequat, turpis lorem pellentesque ligula, quis ornare erat justo in enim. Nullam ut pharetra felis. Mauris id pellentesque justo, et dapibus-->
   <!--   lacus. Praesent sapien libero, ullamcorper rutrum congue in, maximus eget tellus. Mauris vitae urna ac mauris varius tincidunt.-->
   <!--</p>-->
   <!--<div class="article-img zebra-in"></div>-->
   <!--<h2>Subtitlu si detalii nr. 3</h2>-->
   <!--<p>-->
   <!--   Morbi finibus vehicula lacus. Vestibulum a felis quam. Sed ac ipsum fermentum, mollis odio sed, rutrum ante. Pellentesque faucibus, sapien sit amet porttitor ultricies, ligula massa venenatis ex, quis ultrices orci erat imperdiet leo. Sed pharetra in-->
   <!--   purus eu accumsan. Quisque accumsan iaculis ex vel iaculis.-->
   <!--</p>-->
   <!--<p>-->
   <!--   Praesent fermentum nisl eleifend, hendrerit magna vel, eleifend metus. Phasellus eget eros tellus.-->
   <!--</p>-->

   <input type="hidden" id="myArticleId" value="<?=htmlspecialchars($TEMPLATE_VARS['article']->id)?>">
   <div class="comments">
      
      <span> 
      <?=Comment::countIt('WHERE `article_id`=' . $TEMPLATE_VARS['article']->id)[0]['total']?> 
      <?=
      (Comment::countIt('WHERE `article_id`=' . 
      $TEMPLATE_VARS['article']->id)[0]['total'] > 1) ?
      "Comentarii" :
      (Comment::countIt('WHERE `article_id`=' . 
      $TEMPLATE_VARS['article']->id)[0]['total'] == 0) ?
      "Comentarii" :
      "Comentariu"
      ?>
      </span>
      
   </div>
   
   <!--<div class="comment-box">-->
   <!--   <div class="user-img"></div>-->
   <!--   <div class="user-comment">-->
   <!--      <div class="user-name"> Ionut Bogdan </div>-->
   <!--      <div class="user-comment-text">-->
   <!--         Eu cred ca zebrele...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod finibus arcu eget efficitur. Morbi commodo ut risus sed sollicitudin. Etiam non nibh eget diam tristique hendrerit id eu mauris. Morbi commodo ut risus sed sollicitudin.-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   
   <div class="comments-list"></div>
   <form method="POST"  enctype="multipart/form-data" action="">
      <div class="add-comment">
     
         <div class="add-c-header"> ADAUGA COMENTARIU </div>
         <textarea name="content" placeholder="comment Content"><?=
				htmlspecialchars($TEMPLATE_VARS['comment']->message)
				?></textarea>
         <div class="add-c-desc"> NUME PRENUME</div>
         <input type="textarea" 
               name="comment-name"
               value="<?=htmlspecialchars($TEMPLATE_VARS['comment']->name)?>"
         >
         <div class="add-c-desc"> EMAIL </div>
         <input type="textarea" 
               name="comment-email"
               value="<?=htmlspecialchars($TEMPLATE_VARS['comment']->email)?>"
               >
         <div class="add-c-desc"></div>
         <?php if ($TEMPLATE_VARS['validationMessage']) { ?>
      
      	   <div class='validationError'> <?php echo $TEMPLATE_VARS['validationMessage']; ?></div>
      
         <?php } ?>
         <input type="submit" name="Submit" value="Posteaza Comentariu" />
         <div class="add-c-desc"></div>
         <!--<div class="add-c-button">-->
         <!--   <a href="#">POSTEAZA COMENTARIU</a>-->
         <!--</div>-->
      </div>
   </form>
</div>
<script type="text/javascript" src="/public/js/ajaxRequest.js"></script>
<script type="text/javascript" src="/public/js/blog/article.js"></script>
<!-- end art-content -->
