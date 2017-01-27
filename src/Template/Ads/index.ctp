<?php use Cake\Core\Configure;

$this->Html->addCrumb('Ads', ['controller' => 'Ads','action' => 'index', 'plugin' =>'CakeAds']);

?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('ad_type') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('img') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('clicks') ?></th>
                <th><?= $this->Paginator->sort('views') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ads as $ad): ?>
                <tr>
                    <td><?= $ad->has('category') ? $this->Html->link($ad->category->name, ['controller' => 'Categories', 'action' => 'view', $ad->category->id]) : '' ?></td>
                    <td><?= $adType[$ad->ad_type]; ?></td>
                    <td><?= h($ad->url) ?></td>
                    <?php if ($ad->ad_type == 'I'){?>
                    <td><?= $this->Html->link($this->Html->image(str_replace( Configure::read('App.webroot').'/'.Configure::read('App.imageBaseUrl'), "",$ad->path).$ad->img,['class' => 'img-responsive']),$ad->url,['target' => '_blank', 'escape' => false]);?></td>
                    <?php }elseif ($ad->ad_type == 'T'){?>
                    <td><?= $ad->text; ?></td>
                    <?php } ?>
                    <td><?= $ad->active ? __('Yes') : __('No'); ?></td>
                    <td><?= $this->Number->format($ad->clicks) ?></td>
                    <td><?= $this->Number->format($ad->views) ?></td>
                    <td><?= h($ad->start_date) ?></td>
                    <td><?= h($ad->end_date) ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Options <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <li><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> '.__('View'), ['action' => 'view', $ad->id],['escape' => false]) ?></li>
                                <li><?= $this->Html->link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.__('Edit'), ['action' => 'edit', $ad->id],['escape' => false]) ?></li>
                                <li role="separator" class="divider"></li>
                                <li><?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> '.__('Delete'), ['action' => 'delete', $ad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id), 'escape' => false]) ?></li>
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
