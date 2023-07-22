<?php

namespace Upadans;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "Upadans\\AccordionMenu",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AccordionMenu extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'ChevronDownIcon';
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
        return 'Accordion Menu';
    }

    static function className()
    {
        return 'ue-acrd-menu';
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
        return ['content' => ['general' => ['source' => 'menu', 'wp_menu' => '', 'taxonomy' => 'category', 'orderby' => 'name', 'order' => 'ASC', 'transition' => 400], 'toggle_icon' => ['icon' => ['slug' => 'icon-chevron-down.', 'name' => 'chevron down', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>']]]];
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
        "source",
        "Source",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'menu', 'text' => 'WP Menu'], '1' => ['text' => 'Taxonomy', 'value' => 'tax']], 'placeholder' => 'WP Menu'],
        false,
        false,
        [],
      ), c(
        "wp_menu",
        "WP Menu",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'placeholder' => 'Choose a menu', 'dropdownOptions' => ['populate' => ['fetchDataAction' => 'breakdance_get_menus']], 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'menu']]]],
        false,
        false,
        [],
      ), c(
        "taxonomy",
        "Taxonomy",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]], 'placeholder' => 'Choose a taxonomy', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'breakdance_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "include_terms",
        "Include terms",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Enter the term ID. Use comma separator for multiple IDs', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "exclude_terms",
        "Exclude terms",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Enter the term ID. Use comma separator for multiple IDs', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "hide_empty_terms",
        "Hide empty terms",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "child_of",
        "Child of",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "orderby",
        "Orderby",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'placeholder' => 'Name', 'items' => ['0' => ['value' => 'id', 'text' => 'ID'], '1' => ['text' => 'Name', 'value' => 'name'], '2' => ['text' => 'Slug', 'value' => 'slug'], '3' => ['text' => 'Menu order', 'value' => 'menu_order'], '4' => ['text' => 'Include', 'value' => 'include'], '5' => ['text' => 'Count', 'value' => 'count']], 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['text' => 'ASC', 'value' => 'ASC'], '1' => ['value' => 'DESC', 'text' => 'DESC']], 'placeholder' => 'ASC', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "limit",
        "Limit",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "isAccordion",
        "Enable accordion effect",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "always_collapsed",
        "Always collapsed at default state",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "transition",
        "Transition duration(ms)",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 400, 'max' => 100000, 'step' => 50]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "menu_heading",
        "Menu Heading",
        [c(
        "display_menu_name",
        "Display menu name",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "html_tag",
        "HTML Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'h1', 'text' => 'H1'], '1' => ['text' => 'H2', 'value' => 'h2'], '2' => ['text' => 'H3', 'value' => 'h3'], '3' => ['text' => 'H4', 'value' => 'h4'], '4' => ['text' => 'H5', 'value' => 'h5'], '5' => ['text' => 'H6', 'value' => 'h6'], '6' => ['text' => 'DIV', 'value' => 'div']], 'placeholder' => 'H4'],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.general.source', 'operand' => 'equals', 'value' => 'menu']]]],
        false,
        false,
        [],
      ), c(
        "menu_items",
        "Menu Items",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "flex_grow",
        "Flex grow",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "hover",
        "Hover",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Hover style</p>']],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "link_color",
        "Link color",
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
     ), c(
        "current_item_style",
        "Current item style",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Current item style</p>']],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "link_color",
        "Link color",
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
      ), c(
        "sub_menu_items",
        "Sub Menu Items",
        [c(
        "text_indent",
        "Text indent",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1]],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
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
      ), c(
        "toggle_icon",
        "Toggle Icon",
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
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "hover_animation",
        "Hover Animation",
        [],
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
        return 2;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
