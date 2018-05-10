<?php snippet('header'); ?>

  <main>
    <div class="container mx-auto">
          <h2><?php echo $page->intro_title(); ?></h2>
          <?php echo html($page->kirbytext()); ?>
    </div>
    <div class="container mx-auto bg-red pt-8 pb-8">
        <h2>News</h2>
        <div class="flex -mx-2"><?php foreach ($newsList as $news): ?><div class="w-full lg:width-1/4 px-2"><?php echo $news->title() ?></div><?php endforeach;?></div>
    </div>
  </main>

<?php snippet('footer') ?>
