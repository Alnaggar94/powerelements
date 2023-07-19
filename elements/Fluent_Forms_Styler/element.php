<?php

namespace Upadans;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "Upadans\\FluentFormsStyler",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class FluentFormsStyler extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg aria-hidden="true" focusable="false"   class="svg-inline--fa fa-envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M448 64H64C28.65 64 0 92.65 0 128v256c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64V128C512 92.65 483.3 64 448 64zM64 96h384c17.64 0 32 14.36 32 32v36.01l-195.2 146.4c-17 12.72-40.63 12.72-57.63 0L32 164V128C32 110.4 46.36 96 64 96zM480 384c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V203.1L208 336c14.12 10.61 31.06 16.02 48 16.02S289.9 346.6 304 336L480 203.1V384z"></path></svg>';
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
        return 'Fluent Forms Styler';
    }

    static function className()
    {
        return 'ue-ff-styler';
    }

    static function category()
    {
        return 'interactive';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--yellow500)', 'textColor' => 'var(--white)', 'label' => 'U'];
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
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Create a form with the Fluent Forms plugin before using this element.</p>']],
        false,
        false,
        [],
      ), c(
        "form",
        "Form",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'ue_get_fluentforms']], 'placeholder' => 'Select a fluent forms'],
        false,
        false,
        [],
      ), c(
        "horizontal_gap",
        "Horizontal gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "vertical_gap",
        "Vertical Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "form_container",
        "Form Container",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'auto', '4' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\background",
      "Background",
      "background",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
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
        "labels",
        "Labels",
        [c(
        "hide_labels",
        "Hide labels",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'calc', '4' => 'auto', '5' => 'custom'], 'defaultType' => 'px']],
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
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "asterisk",
        "Asterisk",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "gap_left",
        "Gap left",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "gap_right",
        "Gap right",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'pt', '1' => 'px', '2' => 'em', '3' => 'rem', '4' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "input_textarea",
        "Input & Textarea",
        [getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vh', '3' => 'auto', '4' => 'custom', '5' => 'calc'], 'defaultType' => 'auto']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background color",
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
      "EssentialElements\\typography",
      "Placeholder",
      "placeholder",
       ['type' => 'popout']
     ), c(
        "focus_style",
        "Focus Style",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Focus Style</p>']],
        false,
        false,
        [],
      ), c(
        "foucs_background_color",
        "Background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "foucs_text_color",
        "Text color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "foucs_borders",
       ['type' => 'popout']
     ), c(
        "textarea",
        "Textarea",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Textarea</p>']],
        false,
        false,
        [],
      ), c(
        "ta_width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'calc', '4' => 'auto', '5' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "ta_height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'calc', '3' => 'auto', '4' => 'custom', '5' => 'vh'], 'defaultType' => 'px']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "submit_button",
        "Submit Button",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'auto', '4' => 'calc', '5' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidAndGradient']],
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
     ), c(
        "hover",
        "Hover",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Hover</p>']],
        false,
        false,
        [],
      ), c(
        "hover_background_color",
        "Background color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidAndGradient']],
        false,
        false,
        [],
      ), c(
        "hover_text_color",
        "Text color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidOnly']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "hover_borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "gdpr_checkbox_radio",
        "GDPR, Checkbox & Radio",
        [],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "checkbox_radio_photo",
        "Checkbox/Radio Photo",
        [c(
        "grid_template_columns",
        "Grid template columns",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '1fr 1fr 1fr'],
        false,
        false,
        [],
      ), c(
        "grid_gap",
        "Grid gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'rem'], 'defaultType' => 'px']],
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
     ), c(
        "photo_width",
        "Photo width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'auto', '3' => 'custom', '4' => 'calc', '5' => 'vw'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "photo_height",
        "Photo height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'calc', '3' => 'auto', '4' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "selected_item",
        "Selected Item",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Selected Item</p>']],
        false,
        false,
        [],
      ), c(
        "sel_background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "sel_color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "sel_borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "checkable_grid",
        "Checkable Grid",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'em', '3' => 'rem', '4' => 'vw', '5' => 'calc', '6' => 'auto', '7' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Table borders",
      "table_borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Table Head Cell Padding",
      "table_head_cell_padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Heading typography",
      "heading_typography",
       ['type' => 'popout']
     ), c(
        "table_header_background_color",
        "Table header background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Table Body Cell Padding",
      "table_body_cell_padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Cell typography",
      "cell_typography",
       ['type' => 'popout']
     ), c(
        "table_body_background_color",
        "Table body background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "table_body_alt_background_color",
        "Table body alt background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "table_body_alt_text_color",
        "Table body alt text color",
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
        "rating",
        "Rating",
        [c(
        "empty_stars_color",
        "Empty stars color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "full_stars_color",
        "Full stars color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "star_size",
        "Star size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%']]],
        false,
        false,
        [],
      ), c(
        "gap_between_stars",
        "Gap between stars",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vw', '5' => 'calc', '6' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "gap_between_stars_text",
        "Gap between stars & text",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vw', '5' => 'calc', '6' => 'custom']]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "vertical_align",
        "Vertical align",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'top', 'text' => 'Top'], '1' => ['text' => 'Center', 'value' => 'center'], '2' => ['text' => 'Bottom', 'value' => 'bottom']], 'placeholder' => 'bottom'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "file_upload",
        "File Upload",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vw', '5' => 'calc', '6' => 'custom'], 'defaultType' => 'px']],
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
      ), c(
        "repeater",
        "Repeater",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vw', '5' => 'calc', '6' => 'auto', '7' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "horizontal_gap",
        "Horizontal gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => 'vw', '4' => '%', '5' => 'calc'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "vertical_gap",
        "Vertical gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vh', '5' => 'calc', '6' => 'auto', '7' => 'custom']]],
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
     ), c(
        "typography",
        "Typography",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Typography</p>']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Field labels",
      "field_labels",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Column labels",
      "column_labels",
       ['type' => 'popout']
     ), c(
        "input_fields",
        "Input Fields",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Input Fields</p>']],
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
     ), c(
        "input_fields_focus",
        "Input Fields - Focus",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Input Fields - Focus State</p>']],
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
        "text_color",
        "Text color",
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
     ), c(
        "plus_minus_circle",
        "Plus-Minus Circle",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Plus-Minus Circle</p>']],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "plus_color",
        "Plus color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "plus_hover_color",
        "Plus hover color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "minus_color",
        "Minus color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "minus_hover_color",
        "Minus hover color",
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
        "net_promoter_score",
        "Net Promoter Score",
        [c(
        "sub_label_color",
        "Sub label color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "cell_background_color",
        "Cell background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_color",
        "Border color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_width",
        "Border width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "hover_background_color",
        "Hover Background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hover_border_color",
        "Hover border color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hover_border_width",
        "Hover border width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "number_color",
        "Number color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hover_number_color",
        "Hover number color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "checked_number_color",
        "Checked number color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "checked_background_color",
        "Checked background color",
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
        "payment_summary",
        "Payment Summary",
        [c(
        "table",
        "Table",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Table</p>'], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background color",
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
     ), c(
        "table_head",
        "Table Head",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Table Head - TH</p>'], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small']],
        false,
        false,
        [],
      ), c(
        "th_bg_color",
        "TH BG color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "TH Typography",
      "th_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "TH Borders",
      "th_borders",
       ['type' => 'popout']
     ), c(
        "table_body",
        "Table Body",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Table Body - TBODY</p>'], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small']],
        false,
        false,
        [],
      ), c(
        "table_footer",
        "Table Footer",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Table Footer - TFOOT</p>'], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "progress_bar",
        "Progress Bar",
        [],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "section_break",
        "Section Break",
        [c(
        "background_color",
        "Background color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
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
        "line_width",
        "Line width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Title",
      "title",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Description",
      "description",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "validation_error",
        "Validation Error",
        [c(
        "input_fields_border_color",
        "Input fields border color",
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
     ), c(
        "margin_top",
        "Margin top",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "success_message",
        "Success Message",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'vw', '3' => 'auto', '4' => 'calc', '5' => 'custom'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
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
        return ['shareStateWithChildSSR' => true];
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
        return 6;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.general.form'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['accepts' => 'image_url', 'path' => 'content.form_container.background.layers[].image'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['content.general.form'];
    }
}
