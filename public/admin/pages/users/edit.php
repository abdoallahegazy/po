<?php



include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunc.php";


if (!isset($_POST['id'])) {
    header("location:/user");
}

$id = $_POST['id'];

$user = selectwhere($conn, 'users', $id)[0];


?>

<?php include layouts("header.php"); ?>


<!-- Navbar -->
<?php include layouts("nav.php") ?>
<!-- /.navbar -->

<!-- asoide -->
<?php include layouts("aside.php") ?>
<!-- asoide -->


<div class="content-wrapper">

    <div class="content-header">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-11 ml-5 my-5">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/controllers/users/update.php" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">name</label>
                                        <input type="text" value="<?= $user['name'] ?>" class="form-control" name="name" id="name">

                                        <input type="hidden" value="<?= $id ?>" name="id">
                                        <?php if (isset($_SESSION['errors']['name'])) : ?>

                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['errors']['name'] ?>
                                            </div>

                                        <?php endif ?>


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" value="<?= $user['email'] ?>" name="email" id="exampleInputEmail1">

                                        <?php if (isset($_SESSION['errors']['email'])) : ?>

                                            <div class="alert alert-danger" role="alert">
                                                <?= $_SESSION['errors']['email'] ?>
                                            </div>

                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" value="<?= $user['password'] ?>" class="form-control" name="password" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" <?= $user['is_admin'] == 1 ? "checked" : "" ?> value="1" name="is_admin" class="form-check-input" id="exampleCheck1">


                                        <label class="form-check-label" for="exampleCheck1">is_admin</label>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
        </section>

    </div>
</div>




<!-- footer -->
<?php include layouts("footer.php") ?>
<!-- footer -->

<?php
session_destroy();
?>