<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 1/17/18
 * Time: 4:00 PM
 */

namespace Jonom;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;

class ImageFormFactoryExtension extends Extension
{

    public function updateFormFields(FieldList $fields, $controller, $formName, $context)
    {
        $fields->addFieldToTab('Editor.Details', FocusPointField::create($context['Record']), 'ParentID');
    }

}