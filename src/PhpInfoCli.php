<?php
namespace PhpInfoCLI;

use PhpInfoCLI\Display;
use Stringizer\Stringizer;
use PhpInfoCLI\PhpInfoParser;

/**
 * PhpInfoCli
 *
 * @link https://github.com/jasonlam604/PhpInfoCLI
 * @copyright Copyright (c) 2016 Jason Lam
 * @license https://github.com/jasonlam604/PhpInfoCLI/blob/master/LICENSE.md (MIT License)
 */
class PhpInfoCli
{

    private $parser;
    private $display;

    private $extensions;

    public function __construct()
    {

        $this->parser = new PhpInfoParser();
        $this->parser->parse();

       // $this->extensions = get_loaded_extensions();

        $this->display = new Display();

        $this->render();

        //$this->display->drawTextTitle("Extensions");

        //$len = count($this->extensions);

        //for($i=0; $i<$len; $i++) {
        //  $this->display->drawText("  * " . $this->extensions[$i]);

        //}
    }

    public function render()
    {
        $this->renderSystem();

    }

    public function renderSystem()
    {
        $this->display->drawTopBorder();
        $this->display->drawText("PHP Version: " . phpversion());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("System: " . $this->parser->getSystem());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Build Date: " . $this->parser->getBuildDate());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Configure Command:");

        $configCmds = $this->parser->getConfigureCommand();

        foreach($configCmds as $configCmd) {
            $this->display->drawText("  " . $configCmd);
        }

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Server Api: " . $this->parser->getServerApi());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Virtual Directory Support: " . $this->parser->getVirtualDirectorySupport());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Configuration File (php.ini) Path: " . $this->parser->getConfigurationFilePath());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Loaded Configuration File: " . $this->parser->getLoadedConfigurationFile());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Scan this dir for additional .ini files: " . $this->parser->getAdditionalIni());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Additional .ini files parsed: " . $this->parser->getAdditionalIniParsed());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("PHP API: " . $this->parser->getPhpApi());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("PHP Extension: " . $this->parser->getPhpExtension());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Zend Extension: " . $this->parser->getZendExtension());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Zend Extension Build: " . $this->parser->getZendExtensionBuild());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("PHP Extension Build: " . $this->parser->getPhpExtension());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Debug Build: " . $this->parser->getDebugBuild());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Thread Safety: " . $this->parser->getThreadSafety());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Zend Signal Handling: " . $this->parser->getZendSignalHandling());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Zend Memory Manager: " . $this->parser->getZendMemoryManager());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Zend Multibyte Support: " . $this->parser->getZendMultibyteSupport());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("IPv6 Support: " . $this->parser->getIPv6Support());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("DTrace: " . $this->parser->getDTraceSupport());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Registered PHP Streams: " . $this->parser->getRegisteredPhpStreams());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Registered Stream Socket Transports: " . $this->parser->getRegisteredStreamSocketTransports());

        $this->display->drawHorizontalSplitter();
        $this->display->drawText("Registered Stream Filters: " . $this->parser->getRegisteredStreamFilters());

        $this->display->drawBottomBorder();
    }

}
