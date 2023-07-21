<?php

namespace Upadans;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "Upadans\\PostTerms",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class PostTerms extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'TagsIcon';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Post Terms';
    }

    static function className()
    {
        return 'ue-post-terms';
    }

    static function category()
    {
        return 'interactive';
    }

    static function badge()
    {
        return ['label' => 'U', 'textColor' => 'var(--white)', 'backgroundColor' => 'var(--yellow500)'];
    }

    static function slug()
    {
        return get_class();
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return ['content' => ['general' => ['terms_limit' => 3, 'taxonomy' => 'category', 'limit' => 'all', 'order' => 'ASC', 'orderby' => 'name']]];
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [];
    }

    static function contentControls()
    {
        return [c(
        "general",
        "General",
        [c(
        "taxonomy",
        "Taxonomy",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'breakdance_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]], 'placeholder' => 'Category'],
        false,
        false,
        [],
      ), c(
        "limit",
        "How many terms will show?",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'all', 'text' => 'All'], '1' => ['text' => 'Limit', 'value' => 'limit']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default']],
        false,
        false,
        [],
      ), c(
        "terms_limit",
        "Terms limit",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.limit', 'operand' => 'equals', 'value' => 'limit']]], 'rangeOptions' => ['min' => 1, 'max' => 20, 'step' => 1]],
        false,
        false,
        [],
      ), c(
        "orderby",
        "Orderby",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'id', 'text' => 'ID'], '1' => ['value' => 'term_id', 'text' => 'Term id'], '2' => ['text' => 'Name', 'value' => 'name'], '3' => ['text' => 'Slug', 'value' => 'slug'], '4' => ['text' => 'Term Order', 'value' => 'term_order'], '5' => ['text' => 'Parent', 'value' => 'parent']], 'placeholder' => 'ID'],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'ASC', 'text' => 'ASC'], '1' => ['text' => 'DESC', 'value' => 'DESC']], 'placeholder' => 'DESC'],
        false,
        false,
        [],
      ), c(
        "separator",
        "Separator",
        [],
        ['type' => 'text', 'layout' => 'inline', 'placeholder' => ','],
        false,
        false,
        [],
      ), c(
        "prefix",
        "Prefix",
        [],
        ['type' => 'text', 'layout' => 'inline', 'placeholder' => 'Categories:'],
        false,
        false,
        [],
      ), c(
        "disable_link",
        "Disable link",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'row', 'text' => 'Left'], '1' => ['text' => 'Right', 'value' => 'row-reverse']]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\AtomV1IconDesignWithHover",
      "Icon style",
      "icon_style",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_x",
      "Gap",
      "gap",
       ['type' => 'accordion']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "style",
        "Style",
        [getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Prefix typography",
      "prefix_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Terms typography",
      "terms_typography",
       ['type' => 'popout']
     ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "dynamic_color",
        "Dynamic color",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Dynamic color from custom field</p>']],
        false,
        false,
        [],
      ), c(
        "dynamic_background",
        "Background",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'enter term meta key'],
        false,
        false,
        [],
      ), c(
        "dynamic_color",
        "Color",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'enter term meta key'],
        false,
        false,
        [],
      ), c(
        "hover_background",
        "Hover background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hover_color",
        "Hover color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return false;
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return false;
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 105;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['accepts' => 'string', 'path' => 'content.style.hover_background'], '4' => ['accepts' => 'string', 'path' => 'content.style.hover_color'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return false;
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return false;
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
