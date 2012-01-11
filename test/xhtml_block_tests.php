<?php
include_once('../lib/xhtml_block.php');

class Xhtml_BlockTest extends PHPUnit_Framework_TestCase
{
    protected $x;

    protected function setUp()
    {
        $this->x = new Xhtml_block();
    }

    # css

    public function testCssWithNoArguments()
    {
        $this->assertEquals(
            '<link rel="stylesheet" type="text/css" media="screen" href="#" />',
            $this->x->css_link()
        );
    }

    public function testCssWithSingleArgumentAsString()
    {
        $this->assertEquals(
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file1" />',
            $this->x->css_link('path-to-css-file1')
        );
    }

    public function testCssWithSingleArgumentAsArray()
    {
        $css_files = array('path-to-css-file1', 'path-to-css-file2');
        $this->assertEquals(
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file1" />'.
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file2" />',
            $this->x->css_link($css_files)
        );
    }

    public function testCssWithSingleArgumentAsStringNestedWithinHead()
    {
        $css = $this->x->css_link('path-to-css-file1');
        $this->assertEquals(
            '<head>'.
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file1" />'.
            '</head>',
            $this->x->head($css)
        );
    }

    public function testCssWithSingleArgumentAsArrayNestedWithinHead()
    {
        $css_files = array('path-to-css-file1', 'path-to-css-file2');
        $css = $this->x->css_link($css_files);
        $this->assertEquals(
            '<head>'.
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file1" />'.
            '<link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file2" />'.
            '</head>',
            $this->x->head($css)
        );
    }

    // -------------------------------------------------------------------------

    # js

    public function testJsWithNoArguments()
    {
        $this->assertEquals(
            '<script type="text/javascript" src="#"></script>',
            $this->x->js_link()
        );
    }

    public function testJsWithSingleArgumentAsString()
    {
        $this->assertEquals(
            '<script type="text/javascript" src="path-to-js-file1"></script>',
            $this->x->js_link('path-to-js-file1')
        );
    }

    public function testJsWithSingleArgumentAsArray()
    {
        $js_files = array('path-to-js-file1', 'path-to-js-file2');
        $this->assertEquals(
            '<script type="text/javascript" src="path-to-js-file1"></script>'.
            '<script type="text/javascript" src="path-to-js-file2"></script>',
            $this->x->js_link($js_files)
        );
    }    
}
/* End Of File: test/xhtml_block_tests.php
------------------------------------------------------------------------------*/
