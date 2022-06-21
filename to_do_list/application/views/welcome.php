<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Welcome to your to do list App</title>


    

    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>vendor/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

	  <style>
		  #tall {
			  height: 1500px;
			  width: 100px;
		  }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  /*
 * Globals
 */


	  /* Custom default button */
	  .btn-secondary,
	  .btn-secondary:hover,
	  .btn-secondary:focus {
		  color: #333;
		  text-shadow: none; /* Prevent inheritance from `body` */
	  }


	  /*
	   * Base structure
	   */

	  body {
		  text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
		  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
	  }

	  .cover-container {
		  max-width: 42em;
	  }


	  /*
	   * Header
	   */

	  .nav-masthead .nav-link {
		  padding: .25rem 0;
		  font-weight: 700;
		  color: rgba(255, 255, 255, .5);
		  background-color: transparent;
		  border-bottom: .25rem solid transparent;
	  }

	  .nav-masthead .nav-link:hover,
	  .nav-masthead .nav-link:focus {
		  border-bottom-color: rgba(255, 255, 255, .25);
	  }

	  .nav-masthead .nav-link + .nav-link {
		  margin-left: 1rem;
	  }

	  .nav-masthead .active {
		  color: #fff;
		  border-bottom-color: #fff;
	  }

	</style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
  <!-- Button trigger modal -->
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
	  <header class="mb-auto">
		  <div>
			  <h3 class="float-md-start mb-0">TO DO</h3>
			  <nav class="nav nav-masthead justify-content-center float-md-end">
				  <a class="nav-link active" aria-current="page" href="<?= base_url()?>">Home</a>
				  <a class="nav-link" href="#">Contact</a>
			  </nav>
		  </div>
	  </header>

	  <main class="px-3">
		  <h1>Welcome on your TO DO APP.</h1>
		  <p class="lead">Here your can list all your job's day and wee help you to make sure that all are done at the end of day.</p>
		  <p class="lead <?php if(isset($type) AND ($type == 1)){ echo 'text-success'; }else{ echo 'text-danger'; } ?> ">
			  <?php if (isset($message)){
				  echo $message;
			  } ?>
		  </p>
	  </main>

  <div class="container mt-3">

	  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			  <div class="modal-content text-center">
				  <div class="modal-header text-dark">
					  <h4 class="modal-title" id="myModalLabel">Registration</h4>
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body text-black-50">


						  <div>

							  <div>
								  <h4 class="mb-3">Billing address</h4>
								  <form action="<?php echo site_url('users/register')?>" method="post" class="needs-validation" novalidate>
									  <div class="row g-1">
										  <div class="col-sm-6">
											  <label for="firstName" class="form-label">First name</label>
											  <div class="input-group has-validation">
												  <span class="input-group-text">@</span>
												  <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value="" required>
												  <div class="invalid-feedback">
													  Valid first name is required.
												  </div>
											  </div>
										  </div>

										  <div class="col-sm-6">
											  <label for="lastName" class="form-label">Last name</label>
											  <div class="input-group has-validation">
												  <span class="input-group-text">@</span>
												  <input type="text" name="lastName" class="form-control" id="lastName" placeholder="" value="" required>
												  <div class="invalid-feedback">
													  Valid last name is required.
												  </div>
											  </div>
										  </div>

										  <div class="col-12">
											  <label for="username" class="form-label">Phone</label>
											  <input type="number" name="phone" class="form-control" id="username" placeholder="Phone's number" required>
											  <div class="invalid-feedback">
												  Your username is required.
											  </div>
										  </div>

										  <div class="col-12">
											  <label for="email" class="form-label">Email <span class="text-muted">(very important)</span></label>
											  <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
											  <div class="invalid-feedback">
												  Please enter a valid email address for shipping updates.
											  </div>
										  </div>

										  <div class="col-12">
											  <label for="address" class="form-label">Password</label>
											  <input type="password" name="password" class="form-control" id="address" placeholder="don't put your name !!" required>
											  <div class="invalid-feedback">
												  Please enter your shipping address.
											  </div>
										  </div>

										  <div class="col-md-6">
											  <label for="country" class="form-label">Gender</label>
											  <select class="form-select" id="country" name="gender" required>
												  <option value="">Choose...</option>
												  <option value="0">Male</option>
												  <option value="1">Female</option>
											  </select>
											  <div class="invalid-feedback">
												  Please select a valid country.
											  </div>
										  </div>

										  <div class="col-md-3">
											  <label for="state" class="form-label">Begining</label>
											  <input type="time" name="hour_B" class="form-control" id="address" placeholder="hour of begining !!" required>
											  <div class="invalid-feedback">
												  Please provide a valid begining hours.
											  </div>
										  </div>

										  <div class="col-md-3">
											  <label for="state" class="form-label">Finishing</label>
											  <input type="time" name="hour_E" class="form-control" id="address" placeholder="hour of finishing!!" required>
											  <div class="invalid-feedback">
												  Please provide a valid finishing hours.
											  </div>
										  </div>
									  </div>

									  <hr class="my-4">
									  <button class="w-100 btn btn-primary btn-lg" value="valider" name="submit" type="submit">REGISTER</button>
								  </form>
							  </div>
						  </div>
				  </div>
			  </div>
		  </div>
	  </div>





	  <button type="button" class="btn btn-lg btn-secondary fw-bold border-white bg-primary" data-bs-toggle="modal" data-bs-target="#myModal">
		  Sign In
	  </button>


  </div>
	  <div class="container mt-3">

		  <div class="modal fade" id="myModalForm" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				  <div class="modal-content text-center">
					  <div class="modal-header text-dark">
						  <h4 class="modal-title" id="myModalLabel">CONNECTION</h4>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
					  <div class="modal-body text-black-50">


						  <div>

							  <div>
								  <h4 class="mb-3">Notifing connection</h4>
								  <form action="<?php echo site_url('users/connect')?>" method="post" class="needs-validation" novalidate>
									  <div class="row g-1">

										  <div class="col-12">
											  <label for="email" class="form-label">Email <span class="text-muted">(very important)</span></label>
											  <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
											  <div class="invalid-feedback">
												  Please enter a valid email address for shipping updates.
											  </div>
										  </div>

										  <div class="col-12">
											  <label for="address" class="form-label">Password</label>
											  <input type="password" name="password" class="form-control" id="address" placeholder="don't put your name !!" required>
											  <div class="invalid-feedback">
												  Please enter your shipping address.
											  </div>
										  </div>
									  </div>

									  <hr class="my-4">

									  <div class="form-check">
										  <input type="checkbox" name="Remember" value="yes" class="form-check-input" id="same-address">
										  <label class="form-check-label" for="same-address">Remember me</label>
									  </div>
									  <button class="w-100 btn btn-primary btn-lg" value="valider" name="submit" type="submit">REGISTER</button>
								  </form>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>





		  <button type="button" class="btn btn-lg btn-secondary fw-bold border-white bg-primary" data-bs-toggle="modal" data-bs-target="#myModalForm">
			  Sign UP
		  </button>


	  </div>

  <script src="../../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/dom/event-handler.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/dom/selector-engine.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/dom/data.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/dom/manipulator.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/base-component.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/modal.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/collapse.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/tooltip.js"></script>
  <script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/js/dist/popover.js"></script>
  <script>
	  var ffBugTestResult = document.getElementById('ff-bug-test-result')
	  var firefoxTestDone = false

	  function reportFirefoxTestResult(result) {
		  if (!firefoxTestDone) {
			  ffBugTestResult.classList.add(result ? 'text-success' : 'text-danger')
			  ffBugTestResult.textContent = result ? 'PASS' : 'FAIL'
		  }
	  }

	  [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		  .forEach(function (popover) {
			  new Popover(popover)
		  })

	  var tooltipList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	  tooltipList.forEach(function (tooltip) {
		  new Tooltip(tooltip)
	  })

	  var tallToggle = document.getElementById('tall-toggle')
	  var tall = document.getElementById('tall')
	  tallToggle.addEventListener('click', function () {
		  if (tall.style.display === 'none') {
			  tall.style.display = 'block'
		  } else {
			  tall.style.display = 'none'
		  }
	  })

	  var ffBugInput = document.getElementById('ff-bug-input')
	  var firefoxModal = document.getElementById('firefoxModal')
	  function handlerClickFfBugInput() {
		  firefoxModal.addEventListener('focus', reportFirefoxTestResult.bind(false))
		  ffBugInput.addEventListener('focus', reportFirefoxTestResult.bind(true))
		  ffBugInput.removeEventListener('focus', handlerClickFfBugInput)
	  }
	  ffBugInput.addEventListener('focus', handlerClickFfBugInput)

	  var btnPreventModal = document.getElementById('btnPreventModal')
	  var modalFf = new Modal(firefoxModal)

	  btnPreventModal.addEventListener('click', function () {
		  function shownFirefoxModal() {
			  modalFf.hide()
			  firefoxModal.removeEventListener('shown.bs.modal', hideFirefoxModal)
		  }

		  function hideFirefoxModal(event) {
			  event.preventDefault()
			  firefoxModal.removeEventListener('hide.bs.modal', hideFirefoxModal)

			  if (modalFf._isTransitioning) {
				  console.error('Modal plugin should not set _isTransitioning when hide event is prevented')
			  } else {
				  console.log('Test passed')
				  modalFf.hide() // work as expected
			  }
		  }

		  firefoxModal.addEventListener('shown.bs.modal', shownFirefoxModal)
		  firefoxModal.addEventListener('hide.bs.modal', hideFirefoxModal)
		  modalFf.show()
	  })

	  // Test transition duration
	  var t0
	  var t1
	  var slowModal = document.getElementById('slowModal')

	  slowModal.addEventListener('shown.bs.modal', function () {
		  t1 = performance.now()
		  console.log('transition-duration took ' + (t1 - t0) + 'ms.')
	  })

	  slowModal.addEventListener('show.bs.modal', function () {
		  t0 = performance.now()
	  })
  </script>




  <footer class="mt-auto text-white-50">
    <p>Cover template for <a href="https://XyonCode.com/" class="text-white">Xyon Designers</a>, by <a href="https://t.me/packxyon.com" class="text-white">@Xcodeurs</a>.</p>
  </footer>
</div>


    
  </body>
</html>
