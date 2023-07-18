<?php

namespace Upadans;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "Upadans\\OffCanvas",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class OffCanvas extends \Breakdance\Elements\Element
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
        return 'Off Canvas';
    }

    static function className()
    {
        return 'ue-offcanvas';
    }

    static function category()
    {
        return 'interactive';
    }

    static function badge()
    {
        return ['label' => 'U', 'backgroundColor' => 'var(--yellow500)', 'textColor' => 'var(--white)'];
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
        return ['content' => ['general' => ['transition_duration' => 500], 'panel' => ['position' => 'right'], 'backdrop' => ['disable_backdrop' => false, 'fade_duration'=>500]]];
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
        "hide_in_builder_editor_",
        "Hide In-Builder Editor?",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "trigger_on",
        "Trigger on",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'click', 'text' => 'Click'], '1' => ['text' => 'Hover', 'value' => 'hover'], '2' => ['text' => 'Scroll', 'value' => 'scroll']], 'placeholder' => 'Click'],
        false,
        false,
        [],
      ), c(
        "offset_px_",
        "Offset(px)",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.new_section.trigger_on', 'operand' => 'equals', 'value' => 'scroll']]]],
        false,
        false,
        [],
      ), c(
        "trigger_selector",
        "Trigger selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '.open-canvas, .close-canvas'],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition duration",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms'], 'defaultType' => 'ms']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "panel",
        "Panel",
        [c(
        "position",
        "Position",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'placeholder' => 'Right', 'items' => ['0' => ['text' => 'Left', 'value' => 'left'], '1' => ['value' => 'right', 'text' => 'Right'], '2' => ['text' => 'Top', 'value' => 'top'], '3' => ['text' => 'Bottom', 'value' => 'bottom']]],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'custom', '4' => 'calc', '5' => 'auto'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vh', '3' => 'calc', '4' => 'auto', '5' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\background",
      "Background",
      "background",
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
        "backdrop",
        "Backdrop",
        [c(
        "disable_backdrop",
        "Disable backdrop",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "prevent_click_to_close_panel",
        "Prevent click to close panel",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        "fade_duration",
        "Fade duration",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 's']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "other",
        "Other",
        [c(
        "prevent_esc_to_close_panel",
        "Prevent Esc to close panel",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "disable_scroll",
        "Disable scroll",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "close_after_clicking_hash_link",
        "Close after clicking hash link",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "push_body_content",
        "Push body content",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.general.trigger_on', 'operand' => 'not equals', 'value' => 'scroll']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'accordion']],
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
        return ['proOnly' => false];
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
        return [['name' => 'data-ocp-config', 'template' => '{"triggerSelector":"{{ content.general.trigger_selector }}","triggerEvent":"{{content.general.trigger_on|default(\'click\')}}","panelWidth":{{ content.panel.width.style | default(300) }},"panelHeight":{{ content.panel.height.style | default(600) }},"disableScroll":"{{ (content.other.disable_scroll) ? \'yes\' : \'no\' }}","disableBackdropClick":"{{(content.backdrop.prevent_click_to_close_panel) ? \'yes\' : \'no\'}}","escBtn":"{{(content.other.prevent_esc_to_close_panel) ? \'yes\' : \'no\'}}","closeHashLink":"{{(content.other.close_after_clicking_hash_link) ? \'yes\' : \'no\'}}","panelTd":{{ content.general.transition_duration.style|default(500)}},"offset":{{content.general.offset_px_|default(0)}},"ocpPosition":"{{content.panel.position|default(\'right\')}}"}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 15;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['accepts' => 'image_url', 'path' => 'content.panel.background.layers[].image'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return [['name' => 'ue-hide-panel', 'template' => '{% if content.general.hide_in_builder_editor_ and isBuilder %}
yes
{% elseif (isBuilder == false) %}
yes
{% endif %}'], ['name' => 'ue-ocp-right', 'template' => '{% if content.panel.position == \'right\' %}
yes
{% endif %}'], ['name' => 'ue-ocp-left', 'template' => '{% if content.panel.position == \'left\' %}
yes
{% endif %}'], ['name' => 'ue-ocp-top', 'template' => '{% if content.panel.position == \'top\' %}
yes
{% endif %}'], ['name' => 'ue-ocp-bottom', 'template' => '{% if content.panel.position == \'bottom\' %}
yes
{% endif %}'], ['name' => 'ue-push-content', 'template' => '{% if (isBuilder == false and content.other.push_body_content) %}
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
