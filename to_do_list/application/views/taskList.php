<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	if (!isset($id)){
		redirect('welcome');
	}
?>
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
	<link href="<?php echo base_url();?>vendor/bootstrap-5.0.2/dist/css/font-awesome.css" rel="stylesheet">

	<style>
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

	</style>


	<!-- Custom styles for this template -->
	<link href="cover.css" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="container d-flex w-100 h-100 p-0 mx-auto flex-column">
	<header class="mb-5">
		<div>
			<h3 class="float-md-start mb-0"><span class="fa fa-user"> <?= $lastName ?> <?= $firstName ?></h3>
			<nav class="nav nav-masthead justify-content-center float-md-end">
				<a class="nav-link active" aria-current="page" href="<?php echo site_url('users/disconnect');?>">Log Out</a>
				<span type="" class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#myModalForm1">
					Edit Profiles

				</span>
			</nav>
		</div>
		<div class="container mt-3">

			<div class="modal fade" id="myModalForm1" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content text-center">
						<div class="modal-header text-dark">
							<h4 class="modal-title" id="myModalLabel">Edit your profiles</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body text-black-50">


							<div>

								<div>
									<h4 class="mb-3">Fill in</h4>
									<form action="<?php echo site_url('users/edit');?>" method="post" class="needs-validation" novalidate>
										<div class="row g-1">

											<div class="col-12">
												<label for="name" class="form-label">firstName <span class="text-muted">(important)</span></label>
												<input type="text" name="firstName" class="form-control" id="email" value="<?= $firstName ?>" required>
												<div class="invalid-feedback">
													Please enter a valid email address for shipping updates.
												</div>
											</div>

											<div class="col-12">
												<label for="address" class="form-label">lastName</label>
												<input type="text" name="lastName" class="form-control" id="address" value="<?= $lastName ?>" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Phone</label>
												<input type="text" name="phone" class="form-control" id="address" value="<?= $phone ?>" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Email</label>
												<input type="email" name="email" class="form-control" id="address" value="<?= $email ?>" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Last Password</label>
												<input type="password" name="lastPassword" class="form-control" id="address" placeholder="Set it if your want to change it !!" >
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Password</label>
												<input type="password" name="password" class="form-control" id="address" placeholder="Set it if your want to change it !!" >
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Begining hour</label>
												<input type="time" name="hourB" class="form-control" id="address" value="<?= $beginingHours ?>" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">finishing hour</label>
												<input type="time" name="hourF" class="form-control" id="address" value="<?= $finishingHours ?>" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
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


		</div>
	</header>
   <p class="lead <?php if(isset($type) AND ($type == 0)){ echo 'text-success'; }else{ echo 'text-danger'; } ?>"><?php if (isset($message)) {
	echo $message;
   } ?></p>
	<main class="px-1">


		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>vendor/style/form-validation.css" rel="stylesheet">
		</head>
		<body class="bg-light">

		<!-- As a link -->

		<div class="container mt-3">

			<div class="modal fade" id="myModalForm" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content text-center">
						<div class="modal-header text-dark">
							<h4 class="modal-title" id="myModalLabel">New Task</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body text-black-50">


							<div>

								<div>
									<h4 class="mb-3">Fill in</h4>
									<form action="<?php echo site_url('users/insert');?>" method="post" class="needs-validation" novalidate>
										<div class="row g-1">

											<div class="col-12">
												<label for="name" class="form-label">Task's Name <span class="text-muted">(very important)</span></label>
												<input type="text" name="nameTask" class="form-control" id="email" placeholder="type code source of my projet !!">
												<div class="invalid-feedback">
													Please enter a valid email address for shipping updates.
												</div>
											</div>

											<div class="col-12">
												<label for="address" class="form-label">Description</label>
												<textarea name="descriptionTask" class="form-control" id="address" placeholder="says somethings about this new task" required></textarea>
												<div class="invalid-feedback">
													Please enter your shipping address.
												</div>
											</div>
											<div class="col-12">
												<label for="address" class="form-label">Task's hour</label>
												<input type="time" name="hourTask" class="form-control" id="address" placeholder="don't put your name !!" required>
												<div class="invalid-feedback">
													Please enter your shipping address.
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
			<nav class="navbar bg-dark">
				<div class="float-md-end">
					<button type="button" class="btn btn-lg btn-secondary fw-bold border-white bg-primary" data-bs-toggle="modal" data-bs-target="#myModalForm">
						Add Task
					</button>
				</div>
			</nav>



		</div>
		<div class="container">
			<table class="table">
				<thead class="thead-primary table-primary">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Hours</th>
					<th scope="col" colspan="3">Actions</th>
				</tr>
				</thead>
				<tbody class="table-dark text-white">
					<?php
						$query = 'SELECT * FROM taches WHERE owner = ?';
						$tache = $this->db->query($query,array($id));
						if(isset($debut) AND isset($fin)){
							$this->db->limit($debut,$fin);
							//$this->db->offset($fin);
							$this->db->order_by('idTask ASC');
							$tache = $this->db->get_where('taches', array('owner'=>$id));

						}


					   // $query = new PDO('mysql:host=localhost;dbname=to_do_list','root','')
						 foreach ($tache->result() as $key) {
						// var_dump($tache);
						// 	die;
					?>
							
				<tr>
					<th scope="row"><?= $key->idTask ?></th>
					<td><?= $key->nameTask ?></td>

					<td><?= $key->descriptionTask ?></td>
					<td><?= $key->hourTask ?></td>
					<td><a href="<?php echo site_url('users/checkItem').'/'.$key->idTask.'/'.$id;?>"><span class="<?php if ($key->statutTask == 1){ echo 'fa fa-check';}else{ echo 'fa fa-plus';} ?>"></span></a></td>
					<td>
						<div class="modal fade" id="myModalForm<?php echo $key->idTask ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content text-center">
									<div class="modal-header text-dark">
										<h4 class="modal-title" id="myModalLabel">New Task</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body text-black-50">


										<div>

											<div>
												<h4 class="mb-3">Fill in</h4>
												<form action="<?php echo site_url('users/editItem').'/'.$key->idTask.'/'.$id;?>" method="post" class="needs-validation" novalidate>
													<div class="row g-1">

														<div class="col-12">
															<label for="name" class="form-label">Task's Name <span class="text-muted">(very important)</span></label>
															<input type="text" name="nameTask" class="form-control" id="email" value="<?= $key->nameTask ?>">
															<div class="invalid-feedback">
																Please enter a valid email address for shipping updates.
															</div>
														</div>

														<div class="col-12">
															<label for="address" class="form-label">Description</label>
															<textarea name="descriptionTask" class="form-control" id="address" placeholder="<?= $key->descriptionTask ?>" required></textarea>
															<div class="invalid-feedback">
																Please enter your shipping address.
															</div>
														</div>
														<div class="col-12">
															<label for="address" class="form-label">Task's hour</label>
															<input type="time" name="hour" class="form-control" id="address" value="<?= $key->hourTask ?>" required>
															<div class="invalid-feedback">
																Please enter your shipping address.
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

								<span class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#myModalForm<?php echo $key->idTask ?>">

								</span>
					</td>
					<td><a href="<?php if ($key->statutTask == 0){ echo site_url('users/deleteItem').'/'.$key->idTask.'/'.$id;}?>"><span class="fa fa-trash"></span></a></td>
				</tr>
				<?php
						}
					?>
				</tbody>
			</table>

			<nav class="navbar bg-dark">
				<div class="float-start">
					<button type="button" class="btn btn-lg btn-secondary fw-bold border-white bg-primary" data-bs-toggle="modal" data-bs-target="#myModalForm">
						Add Task
					</button>
				</div>
				<div class="float-end">
					<a href="<?php echo site_url('users/display').'/'.$page-1 .'/'.$id;?>" class="btn btn-lg btn-secondary fw-bold border-white bg-primary">
						<
					</a>
					<a href="<?php echo site_url('users/display').'/'.$page+1 .'/'.$id;?>" class="btn btn-lg btn-secondary fw-bold border-white bg-primary">
						>
					</a>
				</div>
			</nav>
		</div>



		<script src="<?php echo base_url();?>vendor/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>

		<script src="<?php echo base_url();?>vendor/style/form-validation.js"></script>


	</main>

	<footer class="mt-auto text-white-50">
		<div class="container">


			<footer class="my-5 pt-5 text-muted text-center text-small">
				<p class="mb-1">&copy; 2021-2022 Stage</p>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="#">Privacy</a></li>
					<li class="list-inline-item"><a href="#">Terms</a></li>
					<li class="list-inline-item"><a href="#">Support</a></li>
				</ul>
			</footer>
		</div>
		<p>Cover template for <a href="https://XyonCode.com/" class="text-white">Xyon Designers</a>, by <a href="https://t.me/packxyon.com" class="text-white">@Xcodeurs</a>.</p>
	</footer>
</div>



</body>
</html>

