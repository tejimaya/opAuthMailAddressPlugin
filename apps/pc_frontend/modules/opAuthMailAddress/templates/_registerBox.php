<?php op_include_parts('ButtonBox', 'opAuthMailAddressPluginRegisterBox', array(
  'title'  => 'メールアドレスで登録する',
  'body'   => '以下のボタンをクリックすると、招待されたメールアドレスで登録をおこないます。',
  'button' => 'プロフィール入力ページへ',
  'url'    => url_for($sf_user->getRegisterInputAction()),
  'method' => 'get',
)) ?>
