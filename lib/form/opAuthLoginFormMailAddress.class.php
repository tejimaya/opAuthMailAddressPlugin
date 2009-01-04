<?php

/**
 * opAuthLoginFormMailAddress represents a form to login by one's E-mail address.
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class _opAuthLoginFormMailAddress extends opAuthLoginForm
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

    $this->mergePostValidator(
      new opAuthValidatorMemberConfigAndPassword(array('config_name' => 'pc_address'))
    );

    parent::configure();
  }
}
