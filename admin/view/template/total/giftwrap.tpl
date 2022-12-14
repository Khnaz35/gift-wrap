<?php echo $header ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-giftwrap" data-toggle="tooltip" title="<?php echo $btn_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $btn_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-giftwrap" class="form-horizontal">
     <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="giftwrap_status" id="input-status" class="form-control">
                <?php if ($giftwrap_status) { ?>
                <option value="1" selected="selected"><?php echo $entry_enabled; ?></option>
                <option value="0"><?php echo $entry_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $entry_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $entry_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
     <div class="form-group">
            <label class="col-sm-2 control-label" for="input-price"><?php echo $entry_price ?><span data-toggle="tooltip" title=" Ex: 2.99 "></span></label>
            <div class="col-sm-10">
              <input type="text" name="giftwrap_price" value="<?php echo $giftwrap_price ?>" placeholder="<?php echo $entry_price; ?>" id="input-price" class="form-control" />
            </div>
      </div>
     <div class="form-group">
            <label class="col-sm-2 control-label" for="input-maxProduct"><?php echo $entry_maxProduct ?></label>
            <div class="col-sm-10">
              <input type="text" name="giftwrap_maxProduct" value="<?php echo $giftwrap_maxProduct ?>" placeholder="<?php echo $entry_maxProduct; ?>" id="input-maxProduct" class="form-control" />
            </div>
          </div>
     <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="giftwrap_sort_order" value="<?php echo $giftwrap_sort_order ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
	 </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer ?>