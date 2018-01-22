<?php
/**
 * FocusPointField class.
 * Facilitates the selection of a focus point on an image.
 *
 * @extends FieldGroup
 */

namespace Jonom;

use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\Requirements;

class FocusPointField extends FieldGroup
{
    /**
     * Enable to view Focus X and Focus Y fields while in Dev mode.
     *
     * @var bool
     * @config
     */
    private static $debug = false;

    /**
     * Maximum width of preview image
     *
     * @var integer
     * @config
     */
    private static $max_width = 300;

    /**
     * Maximum height of preview image
     *
     * @var integer
     * @config
     */
    private static $max_height = 150;

    public function __construct(Image $image)
    {
        $previewImage = $image->FitMax($this->config()->get('max_width'), $this->config()->get('max_height'));
        $fields = array(
            LiteralField::create('FocusPointGrid', $previewImage->renderWith('Jonom\\Forms\\FocusPointField')),
            TextField::create('FocusX'),
            TextField::create('FocusY'),
        );
        $this->setName('FocusPoint');
        $this->addExtraClass('focuspoint-fieldgroup');
        if (Director::isDev() && $this->config()->get('debug')) {
            $this->addExtraClass('debug');
        }

        parent::__construct(_t('FocusPointField.FOCUSPOINT','Focus Point'), $fields);
    }
}
