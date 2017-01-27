<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statistics'), ['controller' => 'Statistics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statistic'), ['controller' => 'Statistics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ads form large-9 medium-8 columns content">
    <?= $this->Form->create($ad) ?>
    <fieldset>
        <legend><?= __('Edit Ad') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->input('ad_type',['options' => $adType, 'empty' => true]);
            echo $this->Form->input('url');
            echo $this->Form->input('img',['type' => 'file']);
            echo $this->Form->input('text');
            echo $this->Form->input('active');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
