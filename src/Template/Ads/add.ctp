<?php use Cake\Core\Configure;

$this->Html->addCrumb(__('Ads'), ['controller' => 'Ads','action' => 'index', 'plugin' =>'CakeAds']);
$this->Html->addCrumb(__('Add'));

?>
<div class="row">
    <div class="col-lg-12">
<?= $this->Form->create($ad,['type' => 'file', 'class' => 'form-horizontal']); $this->Form->templates( ['inputContainer' => '{{content}}']);?>

<div class="form-group">
    <div class="col-sm-3">
        <?= $this->Form->input('category_id', ['options' => $categories, 'class' => 'form-control','empty' => true]); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">
        <?= $this->Form->input('ad_type',['options' => $adType,  'class' => 'form-control']); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6">
        <?= $this->Form->input('url', ['class' => 'form-control']); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6">
        <?= $this->Form->input('img',['type' => 'file']); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6">
        <?= $this->Form->input('text',['class' => 'form-control']); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">
        <?= $this->Form->input('active'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6">
        <?= $this->Form->input('start_date', ['empty' => true, 'interval' => 15]); ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-6">
        <?= $this->Form->input('end_date', ['empty' => true, 'interval' => 15]); ?>
    </div>
</div>
        <?= $this->Form->button('<i class="fa fa-save"></i>&nbsp;Save', ['class' => 'btn btn-success', 'escape' => false]); ?>
<?= $this->Form->end() ?>
</div>
</div>