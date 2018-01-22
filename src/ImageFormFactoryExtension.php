<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 1/17/18
 * Time: 4:00 PM
 */

namespace Jonom;

use SilverStripe\AssetAdmin\Forms\AssetFormFactory;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;

class ImageFormFactoryExtension extends Extension
{

    public function updateFormFields(FieldList $fields, $controller, $formName, $context)
    {
        $fields->addFieldToTab('Editor.Details', $field = FocusPointField::create($context['Record']), 'ParentID');
        if (isset($context['Type']) && $context['Type'] == AssetFormFactory::TYPE_SELECT) {
            $field->addExtraClass('readonly');
        }
    }

}