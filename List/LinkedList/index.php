<?php
/** @noinspection ALL */
// Linked List
require_once 'AbstractLinkedList.php';
require_once 'LinkedList.php';
require_once 'Node.php';

$list = new LinkedList(new Node());
$list->create([3,4,5,6,7,8,9,10]);
$list->insertElement(13, 3);
//$list->insertElement(12, 3);
//$list->deleteElement(2);
//echo $list->getElement(3);
$list->printList();
//echo $list->reciprocal(3);