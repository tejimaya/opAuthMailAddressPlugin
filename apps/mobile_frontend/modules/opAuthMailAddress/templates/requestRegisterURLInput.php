<?php include_customizes('inputForm', 'top') ?>
<p>ﾒｰﾙｱﾄﾞﾚｽを入力してください。</p>
<p>入力されたﾒｰﾙｱﾄﾞﾚｽ宛に <?php echo $op_config['sns_name'] ?> の招待状が送信されます。</p>
<?php include_customizes('inputForm', 'formTop') ?>
<form action="<?php echo url_for('opAuthMailAddress/requestRegisterURL') ?>" method="post">
<?php if ($form->hasGlobalErrors()): ?>
<?php echo $form->renderGlobalErrors() ?><br>
<?php endif; ?>
<table>
<?php echo $form ?>
<tr>
<td><input type="submit" value="送信" /></td>
</tr>
</table>
<?php include_customizes('inputForm', 'formBottom') ?>
</form>
<?php include_customizes('inputForm', 'bottom') ?>
