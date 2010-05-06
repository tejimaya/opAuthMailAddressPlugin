<?php op_include_parts('ButtonBox', 'opAuthMailAddressPluginRegisterBox', array(
  'title'  => 'ﾒｰﾙｱﾄﾞﾚｽで登録する',
  'body'   => '以下のﾎﾞﾀﾝをｸﾘｯｸすると、招待されたﾒｰﾙｱﾄﾞﾚｽで登録をおこないます。',
  'button' => 'ﾌﾟﾛﾌｨｰﾙ入力ﾍﾟｰｼﾞへ',
  'url'    => url_for($sf_user->getRegisterInputAction()),
  'method' => 'get',
)) ?>
