<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Statistic'), ['action' => 'edit', $statistic->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Statistic'), ['action' => 'delete', $statistic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statistic->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Statistics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statistic'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="statistics view large-9 medium-8 columns content">
    <h3><?= h($statistic->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ad') ?></th>
            <td><?= $statistic->has('ad') ? $this->Html->link($statistic->ad->id, ['controller' => 'Ads', 'action' => 'view', $statistic->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($statistic->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($statistic->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($statistic->created) ?></td>
        </tr>
    </table>
</div>
