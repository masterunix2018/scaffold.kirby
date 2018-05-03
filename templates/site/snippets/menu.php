<ul class="block-nav list-reset m0" id="responsive-menu">
  <?php foreach($pages->visible() as $p): ?>
  <li class="inline-block ml4 <?php echo $p->id(); ?>">
    <a class="<?php e($p->isOpen(), ' active') ?>" href="/<?php echo $p->uri() ?>"><?php echo $p->title()->html() ?></a>
  </li>
  <?php endforeach ?>
</ul>

