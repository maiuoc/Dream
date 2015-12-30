<?php
 
namespace MST\Dream\Controller\Adminhtml\News;
 
use MST\Dream\Controller\Adminhtml\News;
 
class NewAction extends News
{
   /**
     * Create new news action
     *
     * @return void
     */
   public function execute()
   {
      $this->_forward('edit');
   }
}
 