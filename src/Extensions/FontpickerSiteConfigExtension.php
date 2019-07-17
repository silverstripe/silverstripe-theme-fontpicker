<?php

namespace SilverStripe\ThemeFontpicker\Extensions;

use SilverStripe\Fontpicker\Forms\FontPickerField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Requirements;

class FontpickerSiteConfigExtension extends DataExtension
{
    private static $db = array(
        'MainFontFamily' => 'Varchar(50)',
    );

    /**
     * Defines the theme fonts that can be selected via the CMS
     *
     * @config
     * @var array
     */
    protected static $theme_fonts = [
        'nunito-sans' => 'Nunito Sans',
        'fira-sans' => 'Fira Sans',
        'merriweather' => 'Merriweather',
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $this->addFontPicker($fields);
    }

    protected function addFontPicker(FieldList $fields)
    {
        $fonts = $this->owner->config()->get('theme_fonts');

        // Import each font via the google fonts api to render font preview
        foreach ($fonts as $fontTitle) {
            $fontFamilyName = str_replace(' ', '+', $fontTitle);
            Requirements::css("//fonts.googleapis.com/css?family=$fontFamilyName");
        }

        $fields->addFieldsToTab(
            'Root.ThemeOptions',
            [
                FontPickerField::create(
                    'MainFontFamily',
                    _t(
                        __CLASS__ . '.MainFontFamily',
                        'Main font family'
                    ),
                    $fonts
                )
            ]
        );
    }

    /**
     * If HeaderBackground is not set, assume no theme colours exist and populate some defaults if the colour
     * picker is enabled. We don't use populateDefaults() because we don't want SiteConfig to re-populate its own
     * defaults.
     */
    public function onBeforeWrite()
    {
        if (!$this->owner->MainFontFamily) {
            $this->owner->update([
                'MainFontFamily' => FontPickerField::getDefaultFont(),
            ]);
        }
    }
}
