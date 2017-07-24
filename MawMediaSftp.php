<?php
/*
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace MawMediaSftp;
require __DIR__. '/vendor/autoload.php';

use Shopware\Components\Plugin;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Sftp\SftpAdapter;

class MawMediaSftp extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaAdapter_sftp' => 'createSftpAdapter'
        ];
    }

    /**
     * Creates adapter instance
     *
     * @param \Enlight_Event_EventArgs $args
     * @return AdapterInterface
     */
    public function createSftpAdapter(\Enlight_Event_EventArgs $args)
    {
        $defaultConfig = [
           'type' => 'sftp',
           'host' => '',
           'port' => 22,
           'username' => '',
           'password' => '',
           'privateKey' => '',
           'root' => '',
           'timeout' => 10,
           'directoryPerm' => 0755
        ];

        $config = array_merge($defaultConfig, $args->get('config'));

        $client = S3Client::factory([
            'credentials' => [
                'key'    => $config['key'],
                'secret' => $config['secret'],
            ],
            'region' => $config['region'],
            'endpoint' => $config['endpoint'],
            'version' => $config['version']
        ]);

        return  new SftpAdapter([
            $client['host'],
            $client['port'],
            $client['username'],
            $client['password'],
            $client['privateKey'],
            $client['root'],
            $client['timeout'],
            $client['directoryPerm']
        ]);
    }
}
