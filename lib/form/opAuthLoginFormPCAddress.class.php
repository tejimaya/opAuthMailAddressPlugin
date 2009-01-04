<?php

/**
 * opAuthLoginFormPCAddress represents a form to login by one's PC E-mail address.
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class _opAuthLoginFormPCAddress extends opAuthLoginForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'pc_address' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInputPassword(),
    ));

    $this->setValidatorSchema(new sfValidatorSchema(array(
      'pc_address' => new sfValidatorEmail(),
      'password' => new sfValidatorString(),
    )));

    $this->mergePostValidator(
      new opAuthValidatorMemberConfigAndPassword(array('config_name' => 'pc_address'))
    );

    parent::configure();
  }
}
