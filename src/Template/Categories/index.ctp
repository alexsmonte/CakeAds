<?php
$this->Html->addCrumb(__('Category'));

?>

<div class="row">
    <div class="col-lg-12">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th style="width: 8%"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td><?= h($category->slug) ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> '.__('View'), ['action' => 'view', $category->id],['escape' => false]) ?></li>
                                <li><?= $this->Html->link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.__('Edit'), ['action' => 'edit', $category->id],['escape' => false]) ?></li>
                                <li role="separator" class="divider"></li>
                                <li><?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> '.__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->name), 'escape' => false]) ?></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
    </div>
</div>