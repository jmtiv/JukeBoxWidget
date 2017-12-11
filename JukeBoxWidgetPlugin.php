<?php

class JukeBoxWidgetPlugin extends Omeka_Plugin_AbstractPlugin
{

    /**
     * Identifiers for this widget.
     */
    const NAME = 'JukeBox Widget';
    const ID = 'JukeBoxWidget';

    protected $_filters = array(
        'neatline_exhibit_expansions',
        'neatline_exhibit_tabs',
        'neatline_exhibit_widgets',
        'neatline_globals',
        'neatline_presenters',
        'neatline_record_expansions',
        'neatline_record_widgets'
    );

    protected $_hooks = array(
        'neatline_editor_static',
        'neatline_editor_templates',
        'neatline_public_static',
        'neatline_public_templates',
        'public_content_top'
    );

    /** FILTERS **/

    /**
     * Register the exhibit expansion.
     *
     * @param array $tables Exhibit expansions.
     * @return array The modified array.
     */
    public function filterNeatlineExhibitExpansions($tables)
    {
        return $tables;
    }

    /**
     * Register the exhibit widget tab.
     *
     * @param array $tabs Tabs, <LABEL> => <ID>.
     * @return array The modified array.
     */
    public function filterNeatlineExhibitTabs($tabs, $args)
    {
        if ($args['exhibit']->hasWidget(self::ID)) {
            $tabs[self::NAME] = 'tab-path';
        }
        return $tabs;
    }

    /**
     * Register the exhibit widget.
     *
     * @param array $widgets Widgets, <NAME> => <ID>.
     * @return array The modified array.
     */
    public function filterNeatlineExhibitWidgets($widgets)
    {
        return array_merge($widgets, array(self::NAME => self::ID));
    }

    /**
     * Filter for API endpoint on `Neatline.g`.
     *
     * @param array $globals The array of global properties.
     * @param array $args Array of arguments, with `exhibit`.
     * @return array The modified array.
     */
    public function filterNeatlineGlobals($globals, $args)
    {
        $exhibit = $args['exhibit'];
        return $globals;
    }

    /**
     * Filter for API endpoint on `Neatline.g`.
     *
     * @param array $globals The array of global properties.
     * @param array $args Array of arguments, with `exhibit`.
     * @return array The modified array.
     */
    public function filterNeatlinePresenters($globals, $args)
    {
        $exhibit = $args['exhibit'];
        return $globals;
    }

    /**
     * Register the exhibit expansion.
     *
     * @param array $tables Exhibit expansions.
     * @return array The modified array.
     */
    public function filterNeatlineRecordExpansions($tables)
    {
        return $tables;
    }

    /**
     * Register the record widget.
     *
     * @param array $widgets Widgets, <NAME> => <ID>.
     * @return array The modified array.
     */
    public function filterNeatlineRecordWidgets($widgets)
    {
        return array_merge($widgets, array(self::NAME => self::ID));
    }

    /** HOOKS **/

    /**
     * Queue editor payloads.
     *
     * @param array $args Array of arguments, with `exhibit`.
     */
    public function hookNeatlineEditorStatic($args)
    {
        if ($args['exhibit']->hasWidget(self::ID)) {
            // Queue widget assets for editor.
        }
    }

    /**
     * Queue editor templates.
     *
     * @param array $args Array of arguments, with `exhibit`.
     */
    public function hookNeatlineEditorTemplates($args)
    {
        if ($args['exhibit']->hasWidget(self::ID)) {

        }
    }

    /**
     *
     *
     * @param array $args Contains: `exhibit` (NeatlineExhibit).
     */
    public function hookNeatlinePublicStatic($args)
    {
        // Get the Neatline Exhibit object.
        $exhibit = $args['exhibit'];
    }

    /**
     *
     *
     * @param array $args Array of arguments, with `exhibit`.
     */
    public function hookNeatlinePublicTemplates($args)
    {
        // Get the Neatline Exhibit object.
        $exhibit = $args['exhibit'];
    }

    /**
     *
     *
     * @param array $args Array of arguments, with `exhibit`.
     */
    public function hookPublicContentTop($args)
    {
        // Get the Neatline Exhibit object.
        $exhibit = $args['exhibit'];
    }

}
