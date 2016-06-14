<?php
namespace PhpInfoCLI;

use Stringizer\Stringizer;

/**
 * PhpInfoParser
 *
 * @link https://github.com/jasonlam604/PhpInfoCLI
 * @copyright Copyright (c) 2016 Jason Lam
 * @license https://github.com/jasonlam604/PhpInfoCLI/blob/master/LICENSE.md (MIT License)
 */
class PhpInfoParser
{
    private $dataIn;

    private $data;

    public function __construct()
    {}

    public function parse()
    {
        $this->dataIn = explode("\n", shell_exec('echo "<?php phpinfo(); ?>" | php'));

        $this->data = array();

        $this->parseSystemInfo();

        $this->parseModules();
    }

    private function parseSystemInfo()
    {
        foreach ($this->dataIn as $data) {
            $row = explode("=>", trim($data));
            if (isset($row[1])) {
                $this->data[trim($row[0])] = $row[1];
            }
        }
    }

    private function parseModules()
    {

        $extensions = get_loaded_extensions();

        //print_r($extensions);

       // print_r($this->dataIn);

        //die;

        //foreach ($this->dataIn as $data) {
        $len = count($this->dataIn);
        for($i=0; $i<$len; $i++) {

            $row = explode("=>", trim($this->dataIn[$i]));

            if (in_array($row[0], $extensions) && $row[0] != 'Core') {


                echo $row[0] . PHP_EOL;

                // Move past next row because its blank
                $i++;

                echo PHP_EOL . $this->dataIn[$i] . PHP_EOL;

                die;
            }


        }

        die;


    }

    private function getByKey($key)
    {
        return $this->data[$key];
    }

    public function getRawOutput()
    {
        return $this->rawOutput;
    }

    public function getSystem()
    {
        return $this->getByKey("System");
    }

    public function getBuildDate()
    {
        return $this->getByKey("Build Date");
    }

    public function getConfigureCommand()
    {
        $result = explode("' '", $this->getByKey("Configure Command"));

        $lastIdx = (count($result) - 1);
        unset($result[$lastIdx]);

        $lastIdx = (count($result) - 1);
        unset($result[$lastIdx]);

        unset($result[0]);

        return $result;
    }

    public function getServerApi()
    {
        return $this->getByKey("Server API");
    }

    public function getVirtualDirectorySupport()
    {
        return $this->getByKey("Virtual Directory Support");
    }

    public function getConfigurationFilePath()
    {
        return $this->getByKey("Configuration File (php.ini) Path");
    }

    public function getLoadedConfigurationFile()
    {
        return $this->getByKey("Loaded Configuration File");
    }

    public function getAdditionalIni()
    {
        return $this->getByKey("Scan this dir for additional .ini files");
    }

    public function getAdditionalIniParsed()
    {
        return $this->getByKey("Additional .ini files parsed");
    }

    public function getPhpApi()
    {
        return $this->getByKey("PHP API");
    }

    public function getPhpExtension()
    {
        return $this->getByKey("PHP Extension");
    }

    public function getZendExtension()
    {
        return $this->getByKey("Zend Extension");
    }

    public function getZendExtensionBuild()
    {
        return $this->getByKey("Zend Extension Build");
    }

    public function getPhpExtensionBuild()
    {
        return $this->getByKey("PHP Extension Build");
    }

    public function getDebugBuild()
    {
        return $this->getByKey("Debug Build");
    }

    public function getThreadSafety()
    {
        return $this->getByKey("Thread Safety");
    }

    public function getZendSignalHandling()
    {
        return $this->getByKey("Zend Signal Handling");
    }

    public function getZendMemoryManager()
    {
        return $this->getByKey("Zend Memory Manager");
    }

    public function getZendMultibyteSupport()
    {
        return $this->getByKey("Zend Multibyte Support");
    }

    public function getIPv6Support()
    {
        return $this->getByKey("IPv6 Support");
    }

    public function getDTraceSupport()
    {
        return $this->getByKey("DTrace Support");
    }

    public function getRegisteredPhpStreams()
    {
        return $this->getByKey("Registered PHP Streams");
    }

    public function getRegisteredStreamSocketTransports()
    {
        return $this->getByKey("Registered Stream Socket Transports");
    }

    public function getRegisteredStreamFilters()
    {
        return $this->getByKey("Registered Stream Filters");
    }
}