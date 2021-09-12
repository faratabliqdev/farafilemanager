<?php

namespace FaraData\FileManagerBundle\Tests\Controller;

use FaraData\FileManagerBundle\Tests\Fixtures\AbstractTestCase;

class ManagerControllerTest extends AbstractTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->initClient(['environment' => 'default']);
    }

    public function testDefaultConfManager()
    {
        $this->getManagerPage();

        $this->assertSame(
            200,
            $this->client->getResponse()->getStatusCode()
        );
    }

    public function testDefaultCssStylesAreLinked()
    {
        $crawler = $this->getManagerPage();

        $cssList = [
            '/bundles/faradatafilemanager/libs/bootstrap/dist/css/bootstrap.min.css',
            'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
            '/bundles/faradatafilemanager/libs/jstree/dist/themes/default/style.min.css',
            '/bundles/faradatafilemanager/libs/blueimp-file-upload/css/jquery.fileupload.css',
            '/bundles/faradatafilemanager/css/manager.css',
            '/bundles/faradatafilemanager/libs/jQuery-contextMenu/dist/jquery.contextMenu.min.css',
        ];

        foreach ($cssList as $i => $css) {
            $this->assertSame(
                $css,
                $crawler->filter('link[rel="stylesheet"]')->eq($i)->attr('href')
            );
        }
    }

    public function testDefaultJsScriptsAreLinked()
    {
        $crawler = $this->getManagerPage();

        $jsList = [
            '/bundles/faradatafilemanager/libs/jquery/dist/jquery.min.js',
            '/bundles/faradatafilemanager/libs/bootstrap/dist/js/bootstrap.min.js',
            '/bundles/faradatafilemanager/libs/jstree/dist/jstree.min.js',
            '/bundles/faradatafilemanager/libs/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
            '/bundles/faradatafilemanager/libs/blueimp-file-upload/js/jquery.iframe-transport.js',
            '/bundles/faradatafilemanager/libs/blueimp-file-upload/js/jquery.fileupload.js',
            '/bundles/faradatafilemanager/libs/sticky-kit/jquery.sticky-kit.min.js',
            '/bundles/faradatafilemanager/libs/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js',
            '/bundles/faradatafilemanager/libs/jQuery-contextMenu/dist/jquery.contextMenu.min.js',
        ];

        foreach ($jsList as $i => $js) {
            $this->assertSame(
                $js,
                $crawler->filter('script')->eq($i)->attr('src')
            );
        }
    }

    public function testNoParent()
    {
        $crawler = $this->getManagerPage();
        $this->assertCount(0, $crawler->filter('.top-bar a[title=Parent]'));
    }

    public function testParent()
    {
        $crawler = $this->getManagerSubDir();
        $this->assertCount(1, $crawler->filter('.top-bar a[title=Parent]'));
    }

    public function testTopBarLinks()
    {
        $crawler = $this->getManagerPage();
        $urls = [
            '/manager/?conf=default&tree=0',
            null,
            '/manager/?conf=default&view=list',
            '/manager/?conf=default&view=thumbnail',
        ];
        foreach ($urls as $i => $url) {
            $this->assertSame($url, $crawler->filter('.top-bar a')->eq($i)->attr('href'));
        }
    }

    public function testTableTr()
    {
        $crawler = $this->getManagerPage();

        $files = [
            'file',
        ];

        foreach ($files as $i => $file) {
            $this->assertSame($file, $crawler->filter('.list-blk tbody tr')->eq($i)->attr('class'));
        }
    }
}
