<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ckn Categories Posts'), ['controller' => 'CknCategoriesPosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ckn Categories Post'), ['controller' => 'CknCategoriesPosts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Category') ?></th>
            <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($category->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($category->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ads') ?></h4>
        <?php if (!empty($category->ads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Img') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Clicks') ?></th>
                <th scope="col"><?= __('Views') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->ads as $ads): ?>
            <tr>
                <td><?= h($ads->id) ?></td>
                <td><?= h($ads->category_id) ?></td>
                <td><?= h($ads->type) ?></td>
                <td><?= h($ads->url) ?></td>
                <td><?= h($ads->img) ?></td>
                <td><?= h($ads->text) ?></td>
                <td><?= h($ads->active) ?></td>
                <td><?= h($ads->clicks) ?></td>
                <td><?= h($ads->views) ?></td>
                <td><?= h($ads->start_date) ?></td>
                <td><?= h($ads->end_date) ?></td>
                <td><?= h($ads->created) ?></td>
                <td><?= h($ads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ads', 'action' => 'delete', $ads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categories') ?></h4>
        <?php if (!empty($category->child_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->child_categories as $childCategories): ?>
            <tr>
                <td><?= h($childCategories->id) ?></td>
                <td><?= h($childCategories->name) ?></td>
                <td><?= h($childCategories->parent_id) ?></td>
                <td><?= h($childCategories->lft) ?></td>
                <td><?= h($childCategories->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $childCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $childCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $childCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ckn Categories Posts') ?></h4>
        <?php if (!empty($category->ckn_categories_posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Post Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->ckn_categories_posts as $cknCategoriesPosts): ?>
            <tr>
                <td><?= h($cknCategoriesPosts->id) ?></td>
                <td><?= h($cknCategoriesPosts->category_id) ?></td>
                <td><?= h($cknCategoriesPosts->post_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CknCategoriesPosts', 'action' => 'view', $cknCategoriesPosts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CknCategoriesPosts', 'action' => 'edit', $cknCategoriesPosts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CknCategoriesPosts', 'action' => 'delete', $cknCategoriesPosts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cknCategoriesPosts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
