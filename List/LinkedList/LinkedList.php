<?php
require_once 'Node.php';
require_once 'AbstractLinkedList.php';

class LinkedList extends AbstractLinkedList
{
    public $list;

    public function create($arr)
    {
        // 建立一個變數作為表單指針
        $head = new Node();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
             $next = new Node();
            // 若next 存在，將指針標記為next
            while ($pointer->next) {
                $pointer = $pointer->next;
            }
            $next->data = $arr[$i];
            $pointer->next = $next;
        }
        // 迴圈動態變更pointer->next，並指派其一個新的node，使參考的head->next 變成object 的層疊
        $this->list = $head;
    }

    public function printList()
    {
        $node = $this->list->next;
        if (!$node) {
            echo 'empty';
        }
        while ($node != null) {
            echo '<pre>'; print_r($node->data); echo '</pre>';
            $node = $node->next;
        }
    }

    /**
     * @param $file
     * @param $key
     * @return bool
     * @description : 尋訪list 直到尋訪個數 > key 值，執行key 值上下各一個元素的next 變更，時間複雜度為O(1) ~ O(n)
     */
    public function insertElement($file, $key)
    {
        $count = 1;
        // 找到第key 個元素
        $p = $this->list;
        while ($p->next and $key > $count) {
            $p = $p->next;
            $count++;
        }
        // 第key 個元素不存在
        if (!$p->next or $key < $count) {
            return false;
        }
        $new = new Node();
        $new->data = $file; // 將insert 的值塞給新Node 的data
        $new->next = $p->next; // new 的next 設定為key 值前元素原本的next
        $p->next = $new; // key 值前的元素的next 設定為new
        return true;
    }

    /**
     * @param $key
     * @return bool
     * @description : 尋訪list 直到尋訪個數 > key 值，將目標object unset，並把目標前一元素的next 改為原本的next 的next，時間複雜度為O(1) ~ O(n)
     */
    public function deleteElement($key)
    {
        $count = 1;
        // 找到第key 個元素
        $p = $this->list;
        while ($p->next and $key > $count) {
            $p = $p->next;
            $count++;
        }
        // 第key 個元素不存在
        $q = $p->next;
        if (!$q or $key < $count) {
            return false;
        }
        $p->next = $q->next; // 將p 的next 轉成 q的next = p 的next 的next
        unset($q);
        return true;
    }

    public function getElement($key)
    {
        $count = 1;
        // 找到第key 個元素
        $p = $this->list->next;
        while ($p and $key > $count) {
            $p = $p->next;
            $count++;
        }
        // 第key 個元素不存在
        $q = $p->next;
        if (!$q or $key < $count) {
            return false;
        }
        return $p->data;
    }

    public function clearList()
    {
        $p = $this->list->next;
        // 將p 指向第一個節點，當p 成立時，將p的 next塞給q，unset p，p = q，以此尋訪整張list
        while ($p) {
            $q = $p->next;
            unset($p);
            $p = $q;
        }
        $this->list->next = null;
        return true;
    }

    /**
     * @param $key
     * @return bool
     * @description : 從某處看來的offer 試題 : 遍歷一次取得倒數第key 個節點
     */
    public function reciprocal($key)
    {
        // 若list 為空 or key < 0，錯誤
        if (!$this->list->next or $key < 0) {
            return false;
        }
        // 將兩個變數當作指標，一起初始設定為list
        $p = $this->list;
        $q = $this->list;
        $enable = false;
        $count = 0;
        // 對照q 從count++ 從頭到尾尋訪，取值p 從key - 1處開始尋訪，當q 尋訪完時，p 會停在倒數第key 個位置
        while ($q->next != null) {
            if ($count == ($key - 1)) {
                $enable = true;
            }
            if ($enable) {
                $p = $p->next;
            }
            $q = $q->next;
            $count++;
        }
        return $p->data;
    }
}