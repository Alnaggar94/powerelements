<?php

namespace Upadans;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "Upadans\\Breadcrumbs",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Breadcrumbs extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'SquareIcon';
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
        return 'Seo Breadcrumbs';
    }

    static function className()
    {
        return 'ue-breadcrumbs';
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
        return false;
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
        "seo_plugin",
        "SEO plugin",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'allinone', 'text' => 'All in One SEO'], '1' => ['text' => 'NavXT', 'value' => 'navxt'], '2' => ['value' => 'rankmath', 'text' => 'Rank Math'], '3' => ['text' => 'SEOPress Pro', 'value' => 'seopress'], '4' => ['text' => 'Slim SEO', 'value' => 'slim'], '5' => ['text' => 'Zynith', 'value' => 'zynith']], 'placeholder' => 'Select a SEO plugin'],
        false,
        false,
        [],
      ), c(
        "disable_links",
        "Disable links",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'navxt']]]],
        false,
        false,
        [],
      ), c(
        "reverse_order",
        "Reverse order",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'navxt']]]],
        false,
        false,
        [],
      ), c(
        "bypass_internal_caching",
        "Bypass internal caching",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'navxt']]]],
        false,
        false,
        [],
      ), c(
        "gap_between_links",
        "Gap between links",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'not equals', 'value' => 'seopress']]]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "link_color",
        "Link color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "link_hover_color",
        "Link hover color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "current_item_color",
        "Current item color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'not equals', 'value' => 'allinone']]]],
        false,
        false,
        [],
      ), c(
        "current_item_font_weight",
        "Current item font weight",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => '100', 'text' => '100'], '1' => ['value' => '200', 'text' => '200'], '2' => ['value' => '300', 'text' => '300'], '3' => ['value' => '400', 'text' => '400'], '4' => ['value' => '500', 'text' => '500'], '5' => ['value' => '600', 'text' => '600'], '6' => ['value' => '700', 'text' => '700'], '7' => ['text' => '800', 'value' => '800'], '8' => ['text' => '900', 'value' => '900']], 'placeholder' => '400', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'not equals', 'value' => 'allinone']]]],
        false,
        false,
        [],
      ), c(
        "separator_color",
        "Separator color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'seopress']]]],
        false,
        false,
        [],
      ), c(
        "separator_size",
        "Separator size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'seopress']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "separator",
        "Separator",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\AtomV1IconDesign",
      "Icon style",
      "icon_style",
       ['condition' => ['0' => ['0' => ['path' => 'content.separator.icon', 'operand' => 'is set', 'value' => '']]], 'type' => 'popout']
     ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'pt', '1' => 'px', '2' => 'em', '3' => 'rem', '4' => '%', '5' => 'calc', '6' => 'custom']], 'condition' => ['0' => ['0' => ['path' => 'content.separator.icon', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.separator.icon', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'is one of', 'value' => ['0' => 'rankmath', '1' => 'allinone', '2' => 'yoast']]]]],
        false,
        false,
        [],
      ), c(
        "settings",
        "Settings",
        [c(
        "disable_current_page",
        "Disable current page",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "separator_symbol",
        "Separator symbol",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '-'],
        false,
        false,
        [],
      ), c(
        "separator_size",
        "Separator Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "separator_color",
        "Separator color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "home_label",
        "Home label",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Home'],
        false,
        false,
        [],
      ), c(
        "search_label",
        "Search label",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Results for %s'],
        false,
        false,
        [],
      ), c(
        "error_label",
        "404 error label",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Page not found'],
        false,
        false,
        [],
      ), c(
        "taxonomy",
        "Taxonomy",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'breakdance_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]], 'placeholder' => 'category'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.general.seo_plugin', 'operand' => 'equals', 'value' => 'slim']]]],
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
        return 2;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return [['name' => 'ue-breadcrumbs-zynith', 'template' => '{% if content.general.seo_plugin %}
yes
{% endif %}']];
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
