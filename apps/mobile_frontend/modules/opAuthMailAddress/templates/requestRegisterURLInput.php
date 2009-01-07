<p>ﾒｰﾙｱﾄﾞﾚｽを入力してください。</p>
<p>入力されたﾒｰﾙｱﾄﾞﾚｽ宛に <?php echo $op_config['sns_name'] ?> の招待状が送信されます。</p>
<form action="<?php echo url_for('opAuthMailAddress/requestRegisterURL') ?>" method="post">
<table>
<?php echo $form ?>
<tr>
<td><input type="submit" value="送信" /></td>
</tr>
</table>
</form>
