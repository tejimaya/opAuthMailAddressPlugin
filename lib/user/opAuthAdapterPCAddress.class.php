<?php

/**
 * opAuthAdapterPCAddress will handle credential for PCAddress.
 *
 * @package    OpenPNE
 * @subpackage user
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opAuthAdapterPCAddress extends opAuthAdapter
{
  protected $authModuleName = 'pcAddress';

  /**
   * Returns true if the current state is a beginning of register.
   *
   * @return bool returns true if the current state is a beginning of register, false otherwise
   */
  public function isRegisterBegin($member_id = null)
  {
    opActivateBehavior::disable();
    $member = MemberPeer::retrieveByPk((int)$member_id);
    opActivateBehavior::enable();

    if (!$member) {
      return false;
    }

    if (!MemberConfigPeer::retrieveByNameAndMemberId('pc_address_pre', $member->getId())) {
      return false;
    }

    if (!$member->getIsActive()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Returns true if the current state is a end of register.
   *
   * @return bool returns true if the current state is a end of register, false otherwise
   */
  public function isRegisterFinish($member_id = null)
  {
    opActivateBehavior::disable();
    $data = MemberPeer::retrieveByPk((int)$member_id);
    opActivateBehavior::enable();

    if (!$data || !$data->getName() || !$data->getProfiles()) {
      return false;
    }

    if ($data->getIsActive())
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  /**
   * Registers data to storage container.
   *
   * @param  int    $memberId
   * @param  sfForm $form
   * @return bool   true if the data has already been saved, false otherwise
   */
  public function registerData($memberId, $form)
  {
    if (!$memberId) {
      return false;
    }

    $memberConfig = MemberConfigPeer::retrieveByNameAndMemberId('pc_address_pre', $memberId);
    $memberConfig->setName('pc_address');
    return $memberConfig->save();
  }
}
