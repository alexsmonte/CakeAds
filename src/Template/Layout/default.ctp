<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->fetch('meta') ?>
    <title>CakeAds - Manage your ads</title>

    <!-- Bootstrap,Fonts and Custom Core CSS -->
    <?= $this->Html->css(['CakeAds.bootstrap.min.css','CakeAds.sb-admin.css','CakeAds.font-awesome.min.css'], ['fullBase' => true]) ?>


    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <?= $this->element('CakeAds.navbar');?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <?= $this->element('CakeAds.heading');?>
            <?= $this->Flash->render();?>
            <?= $this->fetch('content') ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery and Bootstrap Core JavaScript -->
<?= $this->Html->script(['CakeAds.jquery.js', 'CakeAds.bootstrap.min.js'], ['fullBase' => true]); ?>
</body>
</html>