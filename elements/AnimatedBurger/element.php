<?php

namespace PowerElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "PowerElements\\AnimatedBurger",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AnimatedBurger extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'BarsIcon';
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
        return 'Animated Burger';
    }

    static function className()
    {
        return 'ue-animated-burger';
    }

    static function category()
    {
        return 'interactive';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--yellow500)', 'label' => 'U', 'textColor' => 'var(--white)'];
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
        return ['content' => ['burger_options' => ['animation_type' => 'standard', 'effect' => 'spin'], 'button_text' => ['gap' => 5, 'position' => 'row']]];
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
        "burger_options",
        "Burger Options",
        [c(
        "animation_type",
        "Animation type",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'standard', 'text' => 'Standard'], '1' => ['text' => 'Reverse', 'value' => 'r']], 'placeholder' => 'Standard'],
        false,
        false,
        [],
      ), c(
        "effect",
        "Effect",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'arrow', 'text' => 'Arrow'], '1' => ['text' => 'Arrow Alt', 'value' => 'arrowalt'], '2' => ['text' => 'Arrow Turn', 'value' => 'arrowturn'], '3' => ['text' => 'Boring', 'value' => 'boring'], '4' => ['text' => 'Collapse', 'value' => 'collapse'], '5' => ['text' => 'Elastic', 'value' => 'elastic'], '6' => ['text' => 'Emphatic', 'value' => 'emphatic'], '7' => ['text' => 'Minus', 'value' => 'minus'], '8' => ['text' => 'Slider', 'value' => 'slider'], '9' => ['text' => 'Squeeze', 'value' => 'squeeze'], '10' => ['text' => 'Spin', 'value' => 'spin'], '11' => ['text' => 'Stand', 'value' => 'stand'], '12' => ['text' => 'Spring', 'value' => 'spring'], '13' => ['text' => 'Vortex', 'value' => 'vortex'], '14' => ['text' => '3DX', 'value' => '3dx'], '15' => ['text' => '3DY', 'value' => '3dy']], 'placeholder' => 'Spin'],
        false,
        false,
        [],
      ), c(
        "line_width",
        "Line width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100]],
        false,
        false,
        [],
      ), c(
        "slug_cant_start_with_number_1st_line_width",
        "1st Line width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100], 'condition' => ['0' => ['0' => ['path' => 'content.burger_options.effect', 'operand' => 'is none of', 'value' => ['0' => 'elastic', '1' => 'emphatic', '2' => 'collapse', '3' => 'squeeze', '4' => 'vortex', '5' => '3dx', '6' => '3dy']]]]],
        false,
        false,
        [],
      ), c(
        "slug_cant_start_with_number_3rd_line_width",
        "3rd Line width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100], 'condition' => ['0' => ['0' => ['path' => 'content.burger_options.effect', 'operand' => 'is none of', 'value' => ['0' => 'collapse', '1' => 'elastic', '2' => 'emphatic', '3' => 'squeeze', '4' => 'vortex', '5' => '3dx', '6' => '3dy']]]]],
        false,
        false,
        [],
      ), c(
        "space_between_lines",
        "Space between lines",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100]],
        false,
        false,
        [],
      ), c(
        "line_height",
        "Line height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100]],
        false,
        false,
        [],
      ), c(
        "line_border_radius",
        "Line border radius",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px'], 'rangeOptions' => ['max' => 100]],
        false,
        false,
        [],
      ), c(
        "line_color",
        "Line color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "line_color_hover",
        "Line color - Hover",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "line_color_active",
        "Line color - Active",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "aria_label",
        "Aria label",
        [],
        ['type' => 'text', 'layout' => 'inline', 'placeholder' => 'Toggle menu'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "button_text",
        "Button Text",
        [c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'inline', 'placeholder' => 'Menu'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'row', 'text' => 'Right side of the icon'], '1' => ['text' => 'Left side of the icon', 'value' => 'row-reverse']]],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 30, 'step' => 1]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['condition' => ['0' => ['0' => ['path' => 'content.button_text.text', 'operand' => 'is set', 'value' => '']]], 'type' => 'popout']
     ), c(
        "color_hover",
        "Color - Hover",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "color_active",
        "Color - Active",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "enable_popup",
        "Enable popup",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "preview_in_builder",
        "Preview In-Builder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidAndGradient']],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vw', '5' => 'auto', '6' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
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
        return ["type" => "container",   ];
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
        return 1;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.button_text.text'], '1' => ['accepts' => 'string', 'path' => 'content.burger_options.aria_label'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['content.button_text.position', 'content.burger_options.slug_cant_start_with_number_3rd_line_width', 'content.dropdown.border'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
