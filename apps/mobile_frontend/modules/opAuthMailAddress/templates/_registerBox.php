<?php op_include_parts('ButtonBox', 'opAuthMailAddressPluginRegisterBox', array(
  'title'  => __('Registration with your e-mail address'),
  'body'   => __('You can go to the registration page by clicking the button bellow.'),
  'button' => __('Go to the registration page'),
  'url'    => url_for($sf_user->getRegisterInputAction()),
  'method' => 'get',
)) ?>
