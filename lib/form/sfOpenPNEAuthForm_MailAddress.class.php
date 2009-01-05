<?php

/**
 * sfOpenPNEAuthForm_MailAddress represents a form to login.
 *
 * @package    symfony
 * @subpackage user
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class sfOpenPNEAuthForm_MailAddress extends sfOpenPNEAuthForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'mail_address' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInputPassword(),
    ));

    $this->setValidatorSchema(new sfValidatorSchema(array(
      'mail_address' => new sfValidatorEmail(),
      'password' => new sfValidatorString(),
    )));

    if ($this->getAuthAdapter()->getAuthConfig('is_check_multiple_address'))
    {
      $this->mergePostValidator(new sfValidatorOr(array(
        new opAuthValidatorMemberConfigAndPassword(array('config_name' => 'mobile_address', 'field_name' => 'mail_address')),
        new opAuthValidatorMemberConfigAndPassword(array('config_name' => 'pc_address', 'field_name' => 'mail_address')),
      )));
    }
    else
    {
      if (sfConfig::get('app_is_mobile', false))
      {
        $configName = 'mobile_address';
      }
      else
      {
        $configName = 'pc_address';
      }
      $this->mergePostValidator(
        new opAuthValidatorMemberConfigAndPassword(array('config_name' => $configName, 'field_name' => 'mail_address'))
      );
    }

    parent::configure();
  }

  public function setForRegisterWidgets($member = null)
  {
    parent::setForRegisterWidgets($member);

    // FIXME
    unset($this->configForm['mail_address']);
    unset($this['mail_address']);
    unset($this['password']);

    $this->getValidatorSchema()->setPostValidator(new sfValidatorPass());
  }

  public function getAuthMode()
  {
    return 'MailAddress';
  }
}
