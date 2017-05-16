<?php
$this->Html->addCrumb(__('Category'), ['controller' => 'Categories','action' => 'index', 'plugin' =>'CakeAds']);
$this->Html->addCrumb(__('Add'));

?>
<div class="row">
    <div class="col-lg-4">
    <?= $this->Form->create($category); $this->Form->templates( ['inputContainer' => '{{content}}']); ?>
        <div class="form-group">
            <?= $this->Form->input('name',['label'=>'Category name','class'=>'form-control', 'placeholder'=>__('Category name')]) ?>
        </div>
    <?= $this->Form->button('<i class="fa fa-save"></i>&nbsp;Save', ['class' => 'btn btn-success', 'escape' => false]); ?>
    <?= $this->Form->end() ?>
    </div>
</div>