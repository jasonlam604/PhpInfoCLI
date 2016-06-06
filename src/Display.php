<?php
namespace PhpInfoCLI;

use Stringizer\Stringizer;

/**
 * Display
 *
 * @link https://github.com/jasonlam604/PhpInfoCLI
 * @copyright Copyright (c) 2016 Jason Lam
 * @license https://github.com/jasonlam604/PhpInfoCLI/blob/master/LICENSE.md (MIT License)
 */
class Display
{

    private static $wallOffset = 2;

    private static $leftMargin = 1;

    private $numColumns;

    private $numRows;

    public function __construct()
    {
        $this->numColumns = exec('tput cols');
        $this->numRows = exec('tput lines');
    }

    private function topLeftCorner()
    {
        return html_entity_decode('&#x2554;', ENT_NOQUOTES, 'UTF-8');
    }

    private function topRightCorner()
    {
        return html_entity_decode('&#x2557;', ENT_NOQUOTES, 'UTF-8');
    }

    private function bottomLeftCorner()
    {
        return html_entity_decode('&#x255a;', ENT_NOQUOTES, 'UTF-8');
    }

    private function bottomRightCorner()
    {
        return html_entity_decode('&#x255d;', ENT_NOQUOTES, 'UTF-8');
    }

    private function horizontalBar($numTimes = 1)
    {
        $result = "";
        for ($i = 0; $i < $numTimes; $i ++) {
            $result .= html_entity_decode('&#x2550;', ENT_NOQUOTES, 'UTF-8');
        }

        return $result;
    }

    private function verticalBar()
    {
        return html_entity_decode('&#x2551;', ENT_NOQUOTES, 'UTF-8');
    }

    private function verticalLeftHorizontalBar()
    {
        return html_entity_decode('&#x2560;', ENT_NOQUOTES, 'UTF-8');
    }

    private function verticalRightHorizontalBar()
    {
        return html_entity_decode('&#x2563;', ENT_NOQUOTES, 'UTF-8');
    }

    public function drawTopBorder()
    {
        $v = $this->topLeftCorner();
        $v .= $this->horizontalBar(($this->numColumns - self::$wallOffset));
        $v .= $this->topRightCorner();
        echo $v . PHP_EOL;
    }

    public function drawBottomBorder()
    {
        $v = $this->bottomLeftCorner();
        $v .= $this->horizontalBar(($this->numColumns - self::$wallOffset));
        $v .= $this->bottomRightCorner();
        echo $v . PHP_EOL;
    }

    public function drawHorizontalSplitter()
    {
        $v = $this->verticalLeftHorizontalBar();
        $v .= $this->horizontalBar(($this->numColumns - self::$wallOffset));
        $v .= $this->verticalRightHorizontalBar();
        echo $v . PHP_EOL;
    }

    public function drawText($text)
    {
        $v = $this->verticalBar() . " ";

        $s = new Stringizer($text);
        $s->padRight(" ", $this->numColumns - self::$wallOffset - self::$leftMargin);
        $v .= $s->getString();

        $v .= $this->verticalBar();

        echo $v . PHP_EOL;
    }

    public function drawTextTitle($text)
    {
        $this->drawText($text);

        $v = $this->verticalBar() . " ";

        $textLength = (new Stringizer($text))->length();

        $s = new Stringizer("-");
        $s->padRight("-", $textLength)->padRight(" ", $this->numColumns - self::$wallOffset - self::$leftMargin);

        $v .= $s->getString();

        $v .= $this->verticalBar();

        echo $v . PHP_EOL;

    }



}