<?php
include_once('xhtml_helper.php');
/**
 * Bread XHTML Block Helper Class
 *
 * This class contains functions that create blocks of XHTML
 *
 * @package     Bread
 * @subpackage  Helpers
 * @category    Helpers
 * @author      8r34d (Dean Spencer)
 * @link        https://github.com/8r34d/xhtml_helper
 */
class Xhtml_block extends Xhtml_helper {

   /**
     * Css Link
     *
     * Create stylesheet link(s)
     *
     * @access  public
     * @param   mixed  $href
     *          - string    single stylesheet
     *          - array     multiple stylesheets
     * @return  string      the stylesheet link(s)
     */
    public function css_link($href = NULL)
    {
        $attributes = array('rel'=>'stylesheet', 'type'=>'text/css', 'media'=>'screen', 'href'=>'#');
        if($href) {
            if(is_array($href)) {
                $css_links = '';
                foreach($href as $link) {
                    $attributes['href'] = $link;
                    $css_links .= $this->link($attributes);
                }
                return $css_links;
            } else {
                $attributes['href'] = $href;
                return $this->link($attributes);
            }
        } else {            
            return $this->link($attributes);
        }
    }

    // -------------------------------------------------------------------------

   /**
     * Js Link
     *
     * Create javascript source file link(s)
     *
     * @access  public
     * @param   mixed  $src
     *          - string    single javascript source file
     *          - array     multiple javascript source files
     * @return  string      the javascript source file link(s)
     */
    public function js_link($src = NULL)
    {
        $attributes = array('type'=>'text/javascript', 'src'=>'#');
        if($src) {
            if(is_array($src)) {
                $js_links = '';
                foreach($src as $script) {
                    $attributes['src'] = $script;
                    $js_links .= $this->script('', $attributes);
                }
                return $js_links;
            } else {
                $attributes['src'] = $src;
                return $this->script('', $attributes);
            }
        } else {            
            return $this->script('', $attributes);
        }
    }
}
/* End Of File: lib/xhtml_block.php
------------------------------------------------------------------------------*/
