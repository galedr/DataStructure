<?php

abstract class AbstractStack
{
    abstract public function initStack();
    abstract public function stackPop();
    abstract public function stackPush($val);
    abstract public function stackLength();
    abstract public function getTop();
}