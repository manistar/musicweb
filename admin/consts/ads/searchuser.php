
<!-- Main content -->
<section class="content p-5">
  <div class="container-fluid">
    <h2 class="text-center display-4">Search User</h2>
    <p class="text-center">Search and select the user you want to post ADS for</p>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form action="simple-results.html">
          <div class="input-group">
            <input type="search" id="search" class="form-control form-control-lg" oninput="updaterow('result', 'searchuser')" placeholder="Post ADS for? search for Name or ID">
            <div class="input-group-append">
              <!-- <button type="submit" class="btn btn-lg btn-default">
                <i class="fa fa-search"></i>
              </button> -->
            </div>
          </div>
        </form>

        <div class="result content-center" id="result">
            <!-- // search result shows here -->
        </div>
      </div>
    </div>
  </div>
</section> 