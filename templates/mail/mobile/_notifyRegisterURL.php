<?php $snsName = $op_config['sns_name'] ?>
<?php echo __('Hello! This is information from %1%.', array('%1%' => $snsName)) ?>

<?php echo __('If you register(free) of member by the following URL,%br%you can participate in %1%.', array('%1%' => $snsName, '%br%' => "\n")) ?>

<?php echo __('* Participate in %1%', array('%1%' => $snsName)) ?>

<?php echo url_for(sprintf('opAuthMailAddress/register?token=%s&authMode=%s', $token, $authMode), true); ?>
