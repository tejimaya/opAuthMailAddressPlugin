<?php

/**
 * sfOpenPNEAuthForm_PCAddress represents a form to login.
 *
 * @package    symfony
 * @subpackage user
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class sfOpenPNEAuthForm_PCAddress extends sfOpenPNEAuthForm
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

    $this->mergePostValidator(new sfValidatorCallback(array(
      'callback'  => array($this, 'validateIdAndPassword'),
    )));

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('authform_pc_address');

    parent::configure();
  }

  public function validateIdAndPassword($validator, $value, $arguments = array())
  {
    $data = MemberConfigPeer::retrieveByNameAndValue('pc_address', $value['pc_address']);
    if (!$data)
    {
      throw new sfValidatorError($validator, 'Not a valid E-mail or password.');
    }

    $valid_password = MemberConfigPeer::retrieveByNameAndMemberId('password', $data->getMember()->getId())->getValue();
    if (md5($value['password']) !== $valid_password)
    {
      throw new sfValidatorError($validator, 'Not a valid E-mail or password.');
    }

    $value['member_id'] = $data->getMember()->getId();
    return $value;
  }

  public function setForRegisterWidgets($member = null)
  {
    parent::setForRegisterWidgets($member);

    // FIXME
    unset($this->configForm->validatorSchema['pc_address']);
    unset($this->configForm->widgetSchema['pc_address']);
    $this->unsetFormField('pc_address');
    $this->unsetFormField('password');

    $this->getValidatorSchema()->setPostValidator(new sfValidatorPass());
  }

  private function unsetFormField($name)
  {
    unset($this->validatorSchema[$name]);
    unset($this->widgetSchema[$name]);
  }

  public function getAuthMode()
  {
    return 'PCAddress';
  }
}
