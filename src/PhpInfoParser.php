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

    private $rawOutput;

    private $data;

    public function __construct()
    {}

    public function parse()
    {
        $this->rawOutput = shell_exec('echo "<?php phpinfo(); ?>" | php');

        $datas = explode("\n", $this->rawOutput);

       // print_r($datas);

        $this->data = array();

        foreach ($datas as $data) {
            $row = explode("=>", trim($data));
            if (isset($row[1])) {
                $this->data[trim($row[0])] = $row[1];
            }
        }

        // print_r($this->data);
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