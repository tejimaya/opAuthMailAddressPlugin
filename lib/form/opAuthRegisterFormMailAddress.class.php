<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opAuthRegisterFormMailAddress represents a form to register by E-mail Address.
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opAuthRegisterFormMailAddress extends opAuthRegisterForm
{
  public function doSave()
  {
    if (sfConfig::get('app_is_mobile', false))
    {
      $memberConfig = MemberConfigPeer::retrieveByNameAndMemberId('mobile_address_pre', $this->getMember()->getId());
      $memberConfig->setName('mobile_address');
    }
    else
    {
      $memberConfig = MemberConfigPeer::retrieveByNameAndMemberId('pc_address_pre', $this->getMember()->getId());
      $memberConfig->setName('pc_address');
    }

    return $memberConfig->save();
  }
}
