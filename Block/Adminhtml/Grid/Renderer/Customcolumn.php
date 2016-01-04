<?php
namespace MST\Dream\Block\Adminhtml\Grid\Renderer;
use \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
class Customcolumn extends AbstractRenderer
{
       public function render(\Magento\Framework\DataObject $row)
       {
			$data = $this->_getValue($row);
			$data .= 'Mai uoc';
			return $data;
       }
}