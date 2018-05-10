<?php

use Uniform\Form;

return function($site, $pages, $page) {

  $form = new Form([
    'firstname' => [
     'rules' => ['required'],
     'message' => 'Firstname is required.',
    ],
    'lastname' => [
     'rules' => ['required'],
     'message' => 'Lastname is required.',
    ],
    'email' => [
     'rules' => ['required', 'email'],
     'message' => 'Email is required.',
    ],
    'message' => [],
  ]);

  //smtp service toegevoegd (Postmark), zie email_services.php voor meer info.
  //is omdat mailen anders niet lukt op localhost
  //mailen lukt nu enkel "from" bram@crispclean.be omdat info@gloribox.be nog niet is goedgekeurd door Ann
  if (r::is('POST')) {
    $form->emailAction([
      'to' => 'bramloosveld@gmail.com',
      'from' => 'info@.eu',
      'subject' => 'New message from the contact form',
      'service' => 'postmark',
      'service-options' => ['key'=>'c6d1faf1-2118-4a49-baaa-d5f935aaad8a']
    ]);
  }

  return compact('form');

};

//https://github.com/mzur/kirby-uniform