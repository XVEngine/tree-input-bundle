<?php

namespace XVEngine\Bundle\TreeInputBundle\Component\Input\TreeInput;


class Node implements \JsonSerializable
{

    /**
     *  Array of child nodes.
     *
     * @var Node[]
     */
    protected $children = [];


    /**
     * Displayed name of the node (html is allowed here)
     *
     * @var string
     */
    protected $title;


    /**
     * May be used with activate(), select(), find(), ...
     *
     * @var string
     */
    protected $id;


    /**
     * Use a folder icon. Also the node is expandable but not selectable.
     *
     * @var boolean
     */
    protected $folder;


    /**
     * Show this popup text.
     *
     * @var string
     */
    protected $tooltip;

    /**
     * Added to the generated <a> tag.
     *
     * @var string
     */
    protected $href;

    /**
     * Use a custom image (filename relative to tree.options.imagePath). 'null' for default icon, 'false' for no icon.
     *
     * @var string
     */
    protected $icon;

    /**
     * Class name added to the node's span tag.
     *
     * @var string
     */
    protected $class;


    /**
     * Use <span> instead of <a> tag for this node
     *
     * @var bool Default false
     */
    protected $noLink;


    /**
     * Initial active status.
     *
     * @var boolean
     */
    protected $activate;


    /**
     * Initial focused status.
     *
     * @var bool
     */
    protected $focus;

    /**
     * Initial expanded status.
     *
     * @var bool Default false
     */
    protected $expand;

    /**
     * Initial selected status.
     *
     * @var bool Default false
     */
    protected $select;


    /**
     * Suppress checkbox display for this node.
     *
     * @var bool Default false
     */
    protected $hideCheckbox;

    /**
     * Prevent selection.
     *
     * @var bool Default false
     */
    protected $unselectable;

    /**
     * Node constructor.
     * @author Krzysztof Bednarczyk
     */
    public function __construct($id, $title = null)
    {
        $this->id = $id;
        !is_null($title) && $this->setTitle($title);
    }


    /**
     * Get title value
     * @author Krzysztof Bednarczyk
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title value
     * @author Krzysztof Bednarczyk
     * @param string $title
     * @return  $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }



    /**
     * Set key value
     * @author Krzysztof Bednarczyk
     * @param string $id
     * @return  $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get folder value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isFolder()
    {
        return $this->folder;
    }

    /**
     * Set folder value
     * @author Krzysztof Bednarczyk
     * @param boolean $folder
     * @return  $this
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;
        return $this;
    }

    /**
     * Get tooltip value
     * @author Krzysztof Bednarczyk
     * @return string
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * Set tooltip value
     * @author Krzysztof Bednarczyk
     * @param string $tooltip
     * @return  $this
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;
        return $this;
    }

    /**
     * Get href value
     * @author Krzysztof Bednarczyk
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set href value
     * @author Krzysztof Bednarczyk
     * @param string $href
     * @return  $this
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Get icon value
     * @author Krzysztof Bednarczyk
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set icon value
     * @author Krzysztof Bednarczyk
     * @param string $icon
     * @return  $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Get class value
     * @author Krzysztof Bednarczyk
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set class value
     * @author Krzysztof Bednarczyk
     * @param string $class
     * @return  $this
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }


    /**
     * Add class value
     * @author Krzysztof Bednarczyk
     * @param string $class
     * @return  $this
     */
    public function addClass($class)
    {
        $this->class .= " ".$class;
        return $this;
    }


    /**
     * Get noLink value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isNoLink()
    {
        return $this->noLink;
    }

    /**
     * Set noLink value
     * @author Krzysztof Bednarczyk
     * @param boolean $noLink
     * @return  $this
     */
    public function setNoLink($noLink)
    {
        $this->noLink = $noLink;
        return $this;
    }

    /**
     * Get focus value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isFocus()
    {
        return $this->focus;
    }

    /**
     * Set focus value
     * @author Krzysztof Bednarczyk
     * @param boolean $focus
     * @return  $this
     */
    public function setFocus($focus)
    {
        $this->focus = $focus;
        return $this;
    }

    /**
     * Get activate value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isActivate()
    {
        return $this->activate;
    }

    /**
     * Set activate value
     * @author Krzysztof Bednarczyk
     * @param boolean $activate
     * @return  $this
     */
    public function setActivate($activate)
    {
        $this->activate = $activate;
        return $this;
    }

    /**
     * Get select value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isSelect()
    {
        return $this->select;
    }

    /**
     * Set select value
     * @author Krzysztof Bednarczyk
     * @param boolean $select
     * @return  $this
     */
    public function setSelect($select)
    {
        $this->select = $select;
        return $this;
    }

    /**
     * Get expand value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isExpand()
    {
        return $this->expand;
    }

    /**
     * Set expand value
     * @author Krzysztof Bednarczyk
     * @param boolean $expand
     * @return  $this
     */
    public function setExpand($expand)
    {
        $this->expand = $expand;
        return $this;
    }

    /**
     * Get hideCheckbox value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isHideCheckbox()
    {
        return $this->hideCheckbox;
    }

    /**
     * Set hideCheckbox value
     * @author Krzysztof Bednarczyk
     * @param boolean $hideCheckbox
     * @return  $this
     */
    public function setHideCheckbox($hideCheckbox)
    {
        $this->hideCheckbox = $hideCheckbox;
        return $this;
    }

    /**
     * Get unselectable value
     * @author Krzysztof Bednarczyk
     * @return boolean
     */
    public function isUnselectable()
    {
        return $this->unselectable;
    }

    /**
     * Set unselectable value
     * @author Krzysztof Bednarczyk
     * @param boolean $unselectable
     * @return  $this
     */
    public function setUnselectable($unselectable)
    {
        $this->unselectable = $unselectable;
        return $this;
    }




    /**
     * Get children value
     * @author Krzysztof Bednarczyk
     * @return Node[]
     */
    public function getNodes()
    {
        return $this->children;
    }

    /**
     * Set children value
     * @author Krzysztof Bednarczyk
     * @param Node[] $children
     * @return  $this
     */
    public function setNodes($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @author Krzysztof Bednarczyk
     * @param Node $child
     * @return $this
     */
    public function addNode(Node $child)
    {
        $this->children[] = $child;

        return $this;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        $result = [
            "children" => $this->children,
            "title" => $this->title,
            "key" => $this->id,
            "isFolder" => $this->folder,
            "tooltip" => $this->tooltip,
            "href" => $this->icon,
            "icon" => $this->icon,
            "addClass" => $this->class,
            "noLink" => $this->noLink,
            "activate" => $this->activate,
            "focus" => $this->focus,
            "expand" => $this->expand,
            "select" => $this->select,
            "hideCheckbox" => $this->hideCheckbox,
            "unselectable" => $this->unselectable,
        ];


        return array_filter($result, function ($k) {
            return $k !== null;
        });
    }
}