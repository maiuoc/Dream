<?php
namespace MST\Dream\Model;
class Observer
{
    public function invoke(\Magento\Framework\Event\Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');
        $product = $observer->getEvent()->getData('product');
        $item = ($item->getParentItem() ? $item->getParentItem() : $item );
        // Load the custom price
        $price = $product->getPrice()+10; // 10 is custom price. It will increase in product price.
        // Set the custom price
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        // Enable super mode on the product.
        $item->getProduct()->setIsSuperMode(true);
    }
}