<?php
 
namespace MST\Dream\Block;
 
use Magento\Framework\View\Element\Template;
use MST\Dream\Model\NewsFactory;
use Magento\Catalog\Model\Product;
 
class NewsList extends Template
{
   /**
    * @var \MST\Dream\Model\NewsFactory
    */
   protected $_newsFactory;
	protected $_productModel;
   /**
    * @param Template\Context $context
    * @param NewsFactory $newsFactory
    * @param array $data
    */
   public function __construct(
      Template\Context $context,
      NewsFactory $newsFactory,
	  Product $productModel,
      array $data = []
   ) {
        $this->_newsFactory = $newsFactory;
        $this->_productModel = $productModel;
        parent::__construct($context, $data);
   }
 
   /**
     * Set news collection
     */
    protected  function _construct()
    {
        parent::_construct();
        $collection = $this->_newsFactory->create()->getCollection()
            ->setOrder('id', 'DESC');
        $this->setCollection($collection);
    }
 
   /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        /** @var \Magento\Theme\Block\Html\Pager */
        $pager = $this->getLayout()->createBlock(
           'Magento\Theme\Block\Html\Pager',
           'dream.news.list.pager'
        );
        $pager->setLimit(5)
            ->setShowAmounts(false)
            ->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
 
        return $this;
    }
	function getDreamProduct()
	{
		$productModel = $this->_productModel;
		$tableDream = 'dream_simplenews';
		$collection = $productModel->getCollection()
			->addAttributeToFilter('name','Radisson Colonia');
		$collection->getSelect()->joinLeft(array('table_dream'=>$tableDream),'e.entity_id = table_dream.id',array('dream_title'=>'title'));
		if(count($collection))
		{
			foreach($collection as $collect)
			{
				echo "This is {$collect->getId()} {$collect->getDreamTitle()}";
			}
		}
	}
 
   /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
 