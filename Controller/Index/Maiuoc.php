<?php
 
namespace MST\Dream\Controller\Index;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
 use MST\Dream\Model\NewsFactory;
 
class Maiuoc extends Action
{
	/**
     * @var \Tutorial\SimpleNews\Model\NewsFactory
     */
    protected $_modelNewsFactory;
 
    /**
     * @param Context $context
     * @param NewsFactory $modelNewsFactory
     */
    public function __construct(
        Context $context,
        NewsFactory $modelNewsFactory
    ) {
        parent::__construct($context);
        $this->_modelNewsFactory = $modelNewsFactory;
    }
 
    public function execute()
    {
        /**
         * When Magento get your model, it will generate a Factory class
         * for your model at var/generaton folder and we can get your
         * model by this way
         */
        $newsModel = $this->_modelNewsFactory->create();
 
        // Load the item with ID is 1
        $item = $newsModel->load(1);
		echo "<pre>";
        var_dump($item->getData());
 
        // Get news collection
        $newsCollection = $newsModel->getCollection();
        // Load all data of collection
		echo "<pre>";
       var_dump($newsCollection->getData());
	   $dataSave = array(
			'id'=>3,
			'title'=> 'Uoc Mai time'.time(),
			'summary' => 'Kekek',
			'description' => 'Kekek',
			'created_at' => date('Y-m-d H:i:s',time())
			);
		$newsModel->setData($dataSave)->save();
		echo 'ok';
    }
}