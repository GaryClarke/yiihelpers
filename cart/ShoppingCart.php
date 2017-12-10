<?php

namespace app\cart;

class ShoppingCart {

    private $storage;

    private $_items = [];

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    public function add($id, $amount)
    {
        $this->loadItems();

        if (array_key_exists($id, $this->_items))
        {

            $this->items[$id]['amount'] += $amount;
        } else
        {

            $this->items[$id] = [
                'id'     => $id,
                'amount' => $amount
            ];
        }

        $this->saveItems();
    }


    public function remove($id)
    {
        $this->loadItems();

        $this->_items = array_diff_key($this->items, [$id => []]);

        $this->saveItems();
    }


    public function loadItems()
    {

    }
}