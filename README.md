#XHTML Helper#

##Description##


Helper classes for generating XHTML

### Helpers ###

lib/xhtml\_helper.php - XHTML tags

lib/xhtml\_block.php - blocks of XHTML

### Tests ###

test/xhtml\_helper\_tests.php - unit tests for xhtml_helper

test/xhtml\_block\_tests.php - unit tests for xhtml_block

##Examples##

###(1) XHTML tags###

####Code####

    <?php
        include_once('xhtml_helper.php');
        $x = new Xhtml_helper();
        echo $x->doctype();


####Output####


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

###(2) XHTML tags and blocks###

####Code####

    <?php
        include_once('xhtml_block.php');
        $x = new Xhtml_block();
        $css = $x->css_link( array('path-to-css-file1', 'path-to-css-file2') );
        echo $x->head($css);


####Output####


    <head>
    <link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file1" />
    <link rel="stylesheet" type="text/css" media="screen" href="path-to-css-file2" />
    </head>
