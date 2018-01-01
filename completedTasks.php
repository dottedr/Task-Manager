<?php include_once 'partials/header.php';?>
<?php $pageTitle = "Completed tasks";?>
<div class="container-fluid">
    <section class="col .col-xs-12 .col-sm-6 .col-md-8 col-lg-12 main">
        <h3 class="text-primary">Completed Task </h3><hr>

        <table class="table table-striped table-bordered table-responsive">
            <thead>
                <tr><th>Name</th><th>Deadline</th><th>Delete</th></tr>
            </thead>
            
            <tbody id="task-completed-list">

            </tbody>
        </table>
    </section>
</div>
<?php include_once 'partials/footer.php';?>
