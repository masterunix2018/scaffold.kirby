<?php snippet('header')?>

<main>

  <div class="mx-auto container">

    <form action="<?php echo $page->url() ?>" method="post">

      <div class="required mb-4 <?php e($form->error('firstname'), 'validation')?>">
        <label for="firstname">Voornaam</label>
        <?php if ($form->error('firstname')): ?>
            <div class="validation-error"><?php echo implode('<br>', $form->error('firstname')) ?></div>
        <?php endif;?>
        <input class="border w-full py-2 px-3 text-grey-darker" type="text" name="firstname" value="<?php echo $form->old('firstname'); ?>" required/>
      </div>
      <div class="required mb-4 <?php e($form->error('lastname'), 'validation')?>">
        <label for="lastname">Familienaam</label>
        <?php if ($form->error('lastname')): ?>
            <div class="validation-error"><?php echo implode('<br>', $form->error('lastname')) ?></div>
        <?php endif;?>
        <input class="border w-full py-2 px-3 text-grey-darker" type="text" name="lastname" value="<?php echo $form->old('lastname'); ?>" required/>
      </div>
      <div class="required mb-4 <?php e($form->error('email'), 'validation')?>">
        <label for="email">Email</label>
        <?php if ($form->error('email')): ?>
            <div class="validation-error"><?php echo implode('<br>', $form->error('email')) ?></div>
        <?php endif;?>
        <input class="border w-full py-2 px-3 text-grey-darker" type="text" name="email" value="<?php echo $form->old('email'); ?>" required/>
      </div>
      <div class="required mb-4 <?php e($form->error('message'), 'validation')?>">
        <label for="message">Message</label>
        <?php if ($form->error('message')): ?>
            <div class="validation-error"><?php echo implode('<br>', $form->error('message')) ?></div>
        <?php endif;?>
        <textarea class="border w-full py-2 px-3 text-grey-darker" type="text" name="message" value="<?php echo $form->old('message'); ?>" required/>
      </div>

      <?php echo csrf_field(); ?>

      <?php echo honeypot_field(); ?>

      <?php if ($form->hasMessage()): ?>
      <div class="alert <?php e($form->success(), 'alert-success', 'alert-warning')?>">
        <?php $form->echoMessage()?>
      </div>
      <?php endif;?>

      <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">Bestellen</button>

    </form>

    <?php if ($form->success()): ?>
      Success!
    <?php else: ?>
      <?php snippet('uniform/errors', ['form' => $form]);?>
    <?php endif;?>

  </div>

</main>


<?php snippet('footer')?>
