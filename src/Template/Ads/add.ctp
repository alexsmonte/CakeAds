<div class="ads form large-9 medium-8 columns content">
    <?= $this->Form->create($ad,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Ad') ?></legend>
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
