<?php
 
namespace MST\Dream\Block\Adminhtml;
 
use Magento\Backend\Block\Widget\Grid\Container;
 
class News extends Container
{
   /**
     * Constructor
     *
     * @return void
     */
   protected function _construct()
    {
        $this->_controller = 'adminhtml_news';
        $this->_blockGroup = 'MST_Dream';
        $this->_headerText = __('Manage News');
        $this->_addButtonLabel = __('Add News');
        parent::_construct();
    }
}