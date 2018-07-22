<?php
/** @noinspection ALL */
require_once 'LineList.php';
$list = new LineList();
$list->create([2,3,4,5,6]);
$list->deleteElement(3);
print_r($list->list); exit;

// Linked List
require_once 'AbstractLinkedList.php';
require_once 'LinkedList.php';
require_once 'Node.php';

$list = new LinkedList(new Node());
$list->create([3,4,5,6,7,8,9,10]);
$list->insertElement(13, 9);
//$list->deleteElement(2);
//echo $list->getElement(8);
//$list->printList();
//echo $list->reciprocal(3);