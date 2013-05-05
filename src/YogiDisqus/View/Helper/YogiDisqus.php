<?php
namespace YogiDisqus\View\Helper;

use Zend\View\Helper\Partial;

use Zend\Form\View\Helper\AbstractHelper;

class YogiDisqus extends Partial
{
    protected $_config = array();

    public function __construct($config = array())
    {
        $this->_config = $config;
    }

    public function __invoke($values = null, $name = null)
    {
        if ($name === null) {
            $name = 'yogi-disqus/disqus.phtml';
        }
        if ($values === null) {
            $values = array();
        } else {
            $values = (array) $values;
        }

        $values = array_merge_recursive(
            array('config' => $this->_config),
            $values
        );

        return parent::__invoke($name, $values);
    }
}
