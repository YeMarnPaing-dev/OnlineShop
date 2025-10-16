<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 gt3">
        <h2 class="mt-4 mb-3">Manage Admin</h2>
        <!-- table Admin -->
         <div class="col-12">
            <a href="add-admin.php" class="btn btn-primary w-10 mb-3">Add Admin</a>

            <table class="table table-striped">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr class="text-center">
        <th scope='row'>1</th>
        <th>Aung Aung</th>
        <th>Aung001</th>
        <th>
            <a href="" class="bg-white p-2 rounded mx-1" title="update password">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

              <a href="" class="bg-white p-2 rounded mx-1" title="update password">
                <i class="fa-solid text-warning fa-user-pen"></i>
            </a>

            <a href="" class="bg-white p-2 rounded mx-1" title="update password">
                <i class="fa-solid text-danger fa-trash"></i>
            </a>
        </th>
    </tr>
   
  </tbody>
</table>
         </div>
    </div>
</div>

<?php include('widget/footer.php') ?>