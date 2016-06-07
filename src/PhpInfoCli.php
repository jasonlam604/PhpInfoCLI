<?php
namespace PhpInfoCLI;

use PhpInfoCLI\Display;
use Stringizer\Stringizer;

/**
 * PhpInfoCli
 *
 * @link https://github.com/jasonlam604/PhpInfoCLI
 * @copyright Copyright (c) 2016 Jason Lam
 * @license https://github.com/jasonlam604/PhpInfoCLI/blob/master/LICENSE.md (MIT License)
 */
class PhpInfoCli
{

    private $display;

    private $extensions;

    public function __construct()
    {

        $this->extensions = get_loaded_extensions();

        $this->display = new Display();

        $this->render();

    }

    public function render()
    {
        $this->display->drawTopBorder();

        $this->display->drawText("PHP Version: " . phpversion());

        $this->display->drawHorizontalSplitter();

        $this->display->drawTextTitle("Extensions");

        $len = count($this->extensions);

        for($i=0; $i<$len; $i++) {
            $this->display->drawText("  * " . $this->extensions[$i]);

        }

        $this->display->drawHorizontalSplitter();

        $this->display->drawBottomBorder();
    }


}
