<?php

namespace SilverStripe\Fontpicker\Tests\Extensions;

use SilverStripe\Core\Config\Config;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Fontpicker\Forms\FontPickerField;
use SilverStripe\Forms\TextField;
use SilverStripe\SiteConfig\SiteConfig;

class FontpickerSiteConfigExtensionTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testDefaultValuesAreWrittenWhenEnabled()
    {
        Config::modify()->set(FontPickerField::class, 'default_font', 'font1-name');

        $fonts = [
            'font1-name' => 'Font 1',
            'font2-name' => 'Font 2'
        ];
        Config::modify()->set(SiteConfig::class, 'theme_fonts', $fonts);

        $siteConfig = SiteConfig::create();
        $siteConfig->write();

        $this->assertEquals('font1-name', $siteConfig->MainFontFamily);
    }
}
