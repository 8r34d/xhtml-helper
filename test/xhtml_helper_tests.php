<?php
include_once('../lib/xhtml_helper.php');

class Xhtml_helperTest extends PHPUnit_Framework_TestCase
{
    protected $x;

    protected function setUp()
    {
        $this->x = new Xhtml_helper();
    }

    public function testNoClosingTagAndEmptyWithNoArguments()
    {
        $this->assertEquals(
            '<area />',
            $this->x->area()
        );
    }

    public function testClosingTagAndContentWithNoArguments()
    {
        $this->assertEquals(
            '<div></div>',
            $this->x->div()
        );
    }

    public function testUnknownTag()
    {
        $this->assertEquals(
            'ERROR: unknown tag <demo>',
            $this->x->demo()
        );
    }

    public function testNoClosingTagAndEmptyWithSingleArgumentAsString()
    {
        $this->assertEquals(
            'ERROR: attributes argument must be an array!',
            $this->x->area('alt="area-alt"')
        );
    }

    public function testClosingTagAndContentWithSingleArgumentAsString()
    {
        $this->assertEquals(
            '<div>content-for-tag</div>',
            $this->x->div('content-for-tag')
        );
    }

    public function testNoClosingTagAndEmptyWithMultipleArgumentsAsString()
    {
        $this->assertEquals(
            'ERROR: attributes argument must be an array!',
            $this->x->area('alt="area-alt"', 'href="area-href"')
        );
    }

    public function testClosingTagAndContentWithMultipleArgumentsAsString()
    {
        $this->assertEquals(
            'ERROR: attributes argument must be an array!',
            $this->x->div('content-for-tag', 'id="div-id"', 'class="div-class"')
        );
    }

    public function testNoClosingTagAndEmptyWithSingleArgumentAsArray()
    {
        $attributes = array('alt'=>'area-alt', 'href'=>'area-href');
        $this->assertEquals(
            '<area alt="area-alt" href="area-href" />',
            $this->x->area($attributes)
        );
    }

    public function testClosingTagAndContentWithSingleArgumentAsArray()
    {
        $content = array('content-for-tag','some more content');
        $this->assertEquals(
            'ERROR: content argument must be a string!',
            $this->x->div($content)
        );
    }

    public function testNoClosingTagAndEmptyWithMultipleArgumentsAsArray()
    {
        $attributes_one = array('alt'=>'area-alt', 'href'=>'area-href');
        $attributes_two = array('shape'=>'rect', 'coords'=>'184,0,276,28');
        $this->assertEquals(
            '<area alt="area-alt" href="area-href" />',
            $this->x->area($attributes_one, $attributes_two)
        );
    }

    public function testClosingTagAndContentWithMultipleArgumentsAsArray()
    {
        $content = array('content-for-tag','some more content');
        $attributes = array('id'=>'div-id', 'class'=>'div-class');
        $this->assertEquals(
            'ERROR: content argument must be a string!',
            $this->x->div($content, $attributes)
        );
    }

   public function testClosingTagAndContentWithMultipleArgumentsAsStringAndAsArray()
   {
        $content = 'content-for-tag';
        $attributes = array('id'=>'div-id', 'class'=>'div-class');
        $this->assertEquals(
            '<div id="div-id" class="div-class">content-for-tag</div>',
            $this->x->div($content, $attributes)
        );
    }

   public function testClosingTagAndContentWithMultipleArgumentsAsEmptyStringAndAsArray()
   {
        $content = '';
        $attributes = array('id'=>'div-id', 'class'=>'div-class');
        $this->assertEquals(
            '<div id="div-id" class="div-class"></div>',
            $this->x->div($content, $attributes)
        );
    }

    public function testXmlWithNoArguments()
    {
        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8"?>',
            $this->x->xml()
        );
    }

    public function testDoctypeWithNoArguments()
    {
        $this->assertEquals(
            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'
                .' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">',
            $this->x->doctype()
        );
    }
}
/* End Of File: test/xhtml_helper_tests.php
------------------------------------------------------------------------------*/
