<?php

/**
 * opAuthPCAddressPlugin actions.
 *
 * @package    OpenPNE
 * @subpackage opAuthPCAddressPlugin
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opAuthPCAddressPluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $adapter = new opAuthAdapterPCAddress('PCAddress');
    $this->form = $adapter->getAuthConfigForm();
    if ($request->isMethod(sfWebRequest::POST))
    {
      $this->form->bind($request->getParameter('auth'.$adapter->getAuthModeName()));
      if ($this->form->isValid())
      {
        $this->form->save();
        $this->redirect('opAuthPCAddressPlugin/index');
      }
    }
  }
}
