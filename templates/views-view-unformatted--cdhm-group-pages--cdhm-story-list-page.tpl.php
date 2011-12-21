<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="cdhm-story-list">
    <?php 
    $row_num = 1;
    $item_num = 1;
    foreach ($rows as $id => $row) { 
        $extra_css = "threecol";
        if( ($item_num%3==0) && ($row_num!=1) ) {
            $extra_css.= " last";
        }
        if($item_num%3==1) {
            print '<div class="row">';
        }
    ?>  <div class="<?php print $classes[$id]; ?>  <?php print $extra_css ?>">
    <?php
            print $row; 
    ?>
        </div>
    <?php
        if($item_num%3==0) {
            if($row_num==1){
    ?>          <div class="threecol last">
                    TODO: structured tag list
                </div>
    <?php
            }
            print '</div>';
            $row_num = $row_num + 1;
        }
        $item_num = $item_num + 1;
    }
    ?>
</div>