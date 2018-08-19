<?php

require_once 'AbstractStack.php';

class NodeForStack
{
    public $val;
    public $next = null;
}

class StackMethod extends AbstractStack
{
    public $stack;

    public function initStack()
    {
        $this->stack = new NodeForStack();
    }

    public function stackLength()
    {
        if (!$this->stack) {
            return 0;
        }
        $count = 0;
        $p = $this->stack;
        while ($p) {
            $p = $p->next;
            $count++;
        }
        return $count;
    }
    public function getTop()
    {
        if (!$this->stack) {
            return null;
        }
        return $this->stack->val;
    }

    /**
     * @return bool
     * @notice 刪除堆疊頂端的元素，由於不需traversal，時間複雜度為O(1)
     */
    public function stackPop()
    {
        if (!$this->stack) {
            return false;
        }
        if (!$this->stack->val) {
            return false;
        }
        if (!$this->stack->next) {
            $this->stack->val = null;
            return true;
        }
        $this->stack = $this->stack->next;
        return true;
    }

    /**
     * @param $val
     * @return bool
     * @notice 將元素push 至堆疊頂端，由於不需traversal，時間複雜度為O(1)
     */
    public function stackPush($val)
    {
        // 如果堆疊未經過初始 or 為空，回傳錯誤
        if (!$this->stack) {
            return false;
        }
        // 本範例中，初始化堆疊的首節點val 與next 為null，因此判斷若此堆疊為起始狀態，push 行為為變更首節點值
        if (!$this->stack->val) {
            $this->stack->val = $val;
            return true;
        }
        $new = new NodeForStack();
        $new->val = $val;
        $new->next = $this->stack;
        $this->stack = $new;
        return true;
    }
}

$stack = new StackMethod();
$stack->initStack();
for ($i = 2; $i < 6; $i++) {
    $stack->stackPush($i);
}
$stack->stackPop();
$len = $stack->stackLength();
var_dump($stack->getTop());
