<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CakeAds</a>
    </div>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#adsMenu"><i class="fa fa-tachometer" aria-hidden="true"></i> <?= __('Ads')?> <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="adsMenu" class="collapse">
                    <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads','action' => 'index', 'plugin' =>'CakeAds']) ?></li>
                    <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads','action' => 'add', 'plugin' =>'CakeAds']) ?></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#Categories"><i class="fa fa-tags" aria-hidden="true"></i> <?= __('Category')?> <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="Categories" class="collapse">
                    <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories','action' => 'index', 'plugin' =>'CakeAds']) ?></li>
                    <li><?= $this->Html->link(__('New category'), ['controller' => 'Categories','action' => 'add', 'plugin' =>'CakeAds']) ?></li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>