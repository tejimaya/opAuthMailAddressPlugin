<?php

/**
 * opAuthMailAddressPlugin actions.
 *
 * @package    OpenPNE
 * @subpackage opAuthMailAddressPlugin
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opAuthMailAddressPluginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $adapter = new opAuthAdapterMailAddress('MailAddress');
    $this->form = $adapter->getAuthConfigForm();
    if ($request->isMethod(sfWebRequest::POST))
    {
      $this->form->bind($request->getParameter('auth'.$adapter->getAuthModeName()));
      if ($this->form->isValid())
      {
        $this->form->save();
        $this->redirect('opAuthMailAddressPlugin/index');
      }
    }
  }
}
