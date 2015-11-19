<?php

namespace XVEngine\Bundle\TreeInputBundle\Component\Input;

use XVEngine\Bundle\TreeInputBundle\Component\Input\TreeInput\Node;
use XVEngine\Core\Component\Input\AbstractInputComponent;


/**
 * Class TreeInputComponent
 * @author Krzysztof Bednarczyk
 * @package XVEngine\Bundle\TreeInputBundle\Component\Input
 */
class TreeInputComponent extends AbstractInputComponent {


    /**
     *  Array of child nodes.
     *
     * @var Node[]
     */
    protected $children = [];


    const MODE_SINGLE = 1;
    const MODE_MULTI = 2;
    const MODE_MULTI_HIER = 3;

    /**
     * @author Krzysztof Bednarczyk
     */
    public function initialize() {
        $this->setComponentName('input.treeInputComponent');
        $this->setParamByRef("nodes", $this->children);
        $this->setCheckbox(false);
        $this->setSelectMode(self::MODE_SINGLE);

        parent::initialize();
    }


    /**
     * @author Krzysztof Bednarczyk
     * @param int $mode
     * @return $this
     */
    public function setSelectMode($mode){
        return $this->setParam("selectMode", $mode);
    }


    /**
     * Show checkboxes.
     *
     * @author Krzysztof Bednarczyk
     * @param $bool
     * @return $this
     */
    public function setCheckbox($bool){
        return $this->setParam("checkbox", !!$bool);
    }

    /**
     * Get children value
     * @author Krzysztof Bednarczyk
     * @return TreeInput\Node[]
     */
    public function getNodes()
    {
        return $this->children;
    }

    /**
     * Set children value
     * @author Krzysztof Bednarczyk
     * @param TreeInput\Node[] $children
     * @return  $this
     */
    public function setNodes($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * Add children value
     * @author Krzysztof Bednarczyk
     * @param TreeInput\Node $children
     * @return  $this
     */
    public function addNode(Node $children)
    {
        $this->children[] = $children;
        return $this;
    }



}
