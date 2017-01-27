<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $statistic->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $statistic->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Statistics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="statistics form large-9 medium-8 columns content">
    <?= $this->Form->create($statistic) ?>
    <fieldset>
        <legend><?= __('Edit Statistic') ?></legend>
        <?php
            echo $this->Form->input('ad_id', ['options' => $ads]);
            echo $this->Form->input('ip_address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
