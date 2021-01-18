<?php

class CategoryTree
{
    protected $categoryParents = array();
    
    public function addCategory(string $category, string $parent=null) : void
    {
        if ( isset($this->categoryParents[$category]) || ( $parent != null && !array_key_exists($parent, $this->categoryParents) ) ) {
                throw new \InvalidArgumentException('Category exists or Parent is invalid.');
        } else {
            $this->categoryParents[$category] = $parent;
        }

    }

    public function getChildren(string $parent) : array
    {
        $response = array();
        foreach ($this->categoryParents as $k => $v) {
            if ( $parent == $v ) {
                $response[] = $k;
            }
        }
        return $response;
    }
}

$c = new CategoryTree;
$c->addCategory('A', null);
$c->addCategory('B', 'A');
$c->addCategory('C', 'A');
echo implode(',', $c->getChildren('A'));