<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= $title; ?></h1>
        <?= $this->Html->getCrumbList(['firstClass' => false,'lastClass' => 'active','class' => 'breadcrumb'],__('Home')); ?>
    </div>
</div>
<!-- /.row -->