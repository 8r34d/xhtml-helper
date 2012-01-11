<?php
/**
 * Bread XHTML Helper Class
 *
 * This class contains functions that create XHTML tags
 *
 * @package     Bread
 * @subpackage  Helpers
 * @category    Helpers
 * @author      8r34d (Dean Spencer)
 * @link        https://github.com/8r34d/xhtml_helper
 */
class Xhtml_helper {

    /**
     * Call (Method Overloading)
     *
     * Handles all inaccessible method calls for the class
     *
     * @access  public
     * @param   string  $name
     * @param   array   $arguments
     *                  - string    $content
     *                  - array     $attributes
     * @return  string  the XHTML tag with any associated content and attributes
     *
     * Element/Tag Structure:
     *
     * (1) Opening Tag
     *  All elements require an opening tag,
     *      e.g. <div>
     *
     * (2) Closing Tag and Content
     *  Most elements have a closing tag and require content,
     *       e.g. my-content</div>
     *
     * (3) No Closing Tag and Empty
     *  Some elements do not require a closing tag and have empty content,
     *       e.g. <br />
     *
     * (4) Closing Tag and Optional Content
     *  Some elements have a closing tag, but have optional content
     *       e.g. in the <head> of the document:
     *          <script type="text/javascript" src="path-to-js-code-file"></script>
     *
     *       e.g. in the <body> of the document:
     *          <script type="text/javascript">some-js-code</script>
     *
     * (5) Attributes
     *  All elements can have attributes
     *      - elements that have no content will require at least one attribute
     *      - elements that have content may require attributes
     *
     * Examples:
     *
     * (1) Content and Attributes
     *  <code>
     *      $content = 'my content';
     *      $attributes = array('id'=>'my-id', 'class'=>'my-class');
     *      $x = new Xhtml_helper();
     *      echo $x->div($content, $attributes);
     *  </code>
     *
     * (2) Content Only
     *  <code>
     *      $content = 'my content';
     *      $x = new Xhtml_helper();
     *      echo $x->div($content);
     *  </code>
     *
     * (3) Attributes Only
     *  <code>
     *      $attributes = array('href'=>'demo.html', 'shape'=>'rect', 'coords'=>'0,0,118,28');
     *      $x = new Xhtml_helper();
     *      echo $x->area('', $attributes);
     *  </code>
     */
    public function __call($name, $arguments)
    {
        switch ($name) {

            # Exceptions
            case 'xml':
                return '<?xml version="1.0" encoding="UTF-8"?>';
            case 'doctype':
                return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'
                .' "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';

            # No Closing Tag and Empty
            case 'area':
            case 'base':
            case 'br':
            case 'col':
            case 'hr':
            case 'img':
            case 'input':
            case 'link':
            case 'meta':
            case 'param':
                if(empty($arguments[0])) {
                    $attributes = '';
                } else {
                    if(is_array($arguments[0])) {
                        $attributes = '';
                        foreach($arguments[0] as $key=>$value) {
                            $attributes .= " $key=\"$value\"";
                        }
                    } else {                                           
                        return 'ERROR: attributes argument must be an array!';
                    }
                }
                return "<$name$attributes />";
                break;

            # Closing Tag and Content
            case 'a':
            case 'abbr':
            case 'acronym':
            case 'address':
            case 'b':
            case 'bdo':
            case 'big':
            case 'blockquote':
            case 'body':
            case 'button':
            case 'caption':
            case 'cite':
            case 'code':
            case 'colgroup':
            case 'dd':
            case 'del':
            case 'dfn':
            case 'div':
            case 'dl':
            case 'dt':
            case 'em':
            case 'fieldset':
            case 'form':
            case 'h1':
            case 'h2':
            case 'h3':
            case 'h4':
            case 'h5':
            case 'h6':
            case 'head':
            case 'html':
            case 'i':
            case 'ins':
            case 'kbd':
            case 'label':
            case 'legend':
            case 'li':
            case 'map':
            case 'noscript':
            case 'object':
            case 'ol':
            case 'optgroup':
            case 'option':
            case 'p':
            case 'pre':
            case 'q':
            case 'samp':
            case 'script':
            case 'select':
            case 'small':
            case 'span':
            case 'strong':
            case 'style':
            case 'sub':
            case 'sup':
            case 'table':
            case 'tbody':
            case 'td':
            case 'textarea':
            case 'tfoot':
            case 'th':
            case 'thead':
            case 'title':
            case 'tr':
            case 'tt':
            case 'ul':
            case 'var':
                if(empty($arguments[0])) {
                    if(empty($arguments[1])) {
                        $content = '';
                    } else {
                        $content = array_shift($arguments);
                    }
                } else {
                    $content = array_shift($arguments);
                    if( ! is_string($content)) {                        
                        return 'ERROR: content argument must be a string!';
                    }
                }
                if(empty($arguments[0])) {
                    $attributes = '';
                } else {
                    if(is_array($arguments[0])) {
                        $attributes = '';
                        foreach($arguments[0] as $key=>$value) {
                            $attributes .= " $key=\"$value\"";
                        }
                    } else {                                           
                        return 'ERROR: attributes argument must be an array!';
                    }
                }
                return "<$name$attributes>$content</$name>";
                break;

            # Unknown Tag
            default:
                return "ERROR: unknown tag <$name>";
        }
    }
}
/* End Of File: lib/xhtml_helper.php
------------------------------------------------------------------------------*/
