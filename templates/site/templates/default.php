<?php snippet('header'); ?>

<main>
  <div class="container mx-auto">
    <h1><?php echo $page->title(); ?></h1>
    <?php echo html($page->kirbytext()); ?>
  </div>
</main>

<?php snippet('footer') ?>
