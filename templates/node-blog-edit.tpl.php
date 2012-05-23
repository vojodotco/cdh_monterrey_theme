<?php
/**
 * This is a bunch of custom form code to show a much prettier story create form within the group
 * Extensive use of suggestions at:
 *   http://drupal.org/node/601646
 **/

// remove some other buttons
unset($form['buttons']['preview']);
unset($form['attachments']);
unset($form['group_voipnode_settings']);

// include the libraries for geocoding from the single address text input field
drupal_set_html_head('<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>');
jquery_ui_add(array("jquery.ui.core","jquery.ui.widget","jquery.ui.position","jquery.ui.autocomplete"));
drupal_add_js(drupal_get_path('theme', 'cdh_monterrey') . '/js/location-autocomplete.js');

?>
<div class="row cdhm-submit-form">


    <div class="sixcol">
    
        <?php print drupal_render($form['title']); ?>
        
        <?php print drupal_render($form['body_field']); ?>

        <div class="form-item">
            <?php print drupal_render($form['field_image']); ?>
        </div>
        
    </div>
    
    <div class="sixcol last">
    
        <?php print drupal_render($form['language']); ?>

        <?php print drupal_render($form['field_map']); ?>
    
        <?php print drupal_render($form['taxonomy']); ?>
    
    </div>

    <input type="hidden" name="og_groups[10055]" id="edit-og-groups-10055" value="10055" class="form-checkbox og-audience">

    <div class="row">
        <div class="twelvecol last cdhm-buttons">
        
        <?php print drupal_render($form); ?>
        
        </div>
    </div>

</div>

<?php
