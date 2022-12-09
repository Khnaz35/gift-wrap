giftwrap<div class="panel panel-default">
  <div class="panel-heading">
    <h4 class="panel-title"><a href="#collapse-giftwrap" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle"><?php echo $heading_title; ?> <i class="fa fa-caret-down"></i></a></h4>
  </div>
  <div id="collapse-giftwrap" class="panel-collapse collapse">
    <div class="panel-body">
      <label class="control-label" for="input-giftwrap"><?php echo $entry_giftwrap; ?></label>
      <div class="input-group">
        <input type="text" name="giftwrap" value="<?php echo $giftwrap; ?>" placeholder="<?php echo $entry_giftwrap; ?>" id="input-giftwrap" class="form-control" />
        <span class="input-group-btn">
        <button type="button" id="button-giftwrap" data-loading-text="<?php echo $text_loading; ?>"  class="btn"><span><?php echo $button_giftwrap; ?></span></button>
        </span> 
     </div>
    <script type="text/javascript"><!--
$('#button-giftwrap').on('click', function() {
  $.ajax({
    url: 'index.php?route=checkout/giftwrap/giftwrap',
    type: 'post',
    data: 'giftwrap=' + encodeURIComponent($('input[name=\'giftwrap\']').val()),
    dataType: 'json',
    beforeSend: function() {
      $('#button-giftwrap').button('loading');
    },
    complete: function() {
      $('#button-giftwrap').button('reset');
    },
    success: function(json) {
      $('.alert').remove();

      if (json['error']) {
        $('#collapse-giftwrap').before('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button></div>');
      }

      if (json['redirect']) {
        location = json['redirect'];
      }
    }
  });
});
//--></script>
   </div>
  </div>
</div>