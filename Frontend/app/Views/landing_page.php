<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Management</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- CDN Tailwind css -->
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

<!-- 	<div class="menu">
		<ul>
			<li class="logo"><a href="https://codeigniter.com" target="_blank"></li>
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a href="#">Home</a></li>
			<li class="menu-item hidden"><a href="https://codeigniter4.github.io/userguide/" target="_blank">Docs</a>
			</li>
			<li class="menu-item hidden"><a href="https://forum.codeigniter.com/" target="_blank">Community</a></li>
		</ul>
	</div> -->

	<div class="flex align-center justify-center">
		<p class="text-6xl font-bold uppercase text-purple-400">User List</p>
	</div>

</header>

<!-- CONTENT -->

<div class="relative flex content-center flex-wrap text-gray-700 bg-gray-100 h-auto sm:mx-auto md:mx-64 border-2 border-gray-100 rounded-lg">
	<div class="relative py-6 w-full p-2 mb-4 bg-gray-300 border-2 border-gray-300">

	<!-- BUTTON THAT LOADS NEW VIEW INTO PLACE TO CREATE NEW USERS -->
	<button class="absolute right-0 top-0 bg-green-500 hover:bg-green-600 text-white hover:shadow font-bold py-2 m-4 px-4 rounded inline-flex items-center" onclick="window.location='<?php echo base_url("users");?>'">
	<svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
		<path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
	</svg>
	<span>Create User</span>
	</button>
	<button >
		<span class="flex flex-wrap"></span>
	</button>

	<!-- LOADS THE ARRAY AND ITERATES THROUGH IT TO CREATE THE USER LIST -->
	</div>
	<!-- ITERATES THE ARRAY HERE FOR EACH USER RECEIVED -->
	<?php foreach($users as $user) { ?>
	<div class="sm:w-full md:w-full lg:w-1/2 xl:w-1/3 p-4 min-w-24">
		<div class="bg-gray-200 border-2 rounded-lg border-gray-200 hover:border-gray-300 hover:bg-gray-300 p-2 hover:text-purple-500 hover:shadow cursor-pointer" onclick="window.location='<?php echo base_url("users/".$user->id);?>'">
		<div class="flex content-center flex-wrap">
		<div class="w-2/5 my-auto">
			<div class="text-gray-700 text-center">
			<img src="https://chedidgrieco.com.br/wp-content/uploads/2016/11/nobody_m.original.jpg" class="h-24 my-2 mx-auto rounded-full border-solid border-2 border-gray-200 bg-white" alt="Profile Picture"/>
			</div>
		</div>
		<div class="w-3/5 my-auto">
			<div class="text-gray-700 text-center ">
			<div class="py-2 text-center">
				<div class="flex inline-block">
				<p class="font-bold text-lg uppercase text-gray-700"><?php
				// DISPLAYS THE FIRST AND LAST NAME ON THE USERS CARD.
				$name_ar = explode(' ', $user->name);
				// In case we have only a name, we only display a name!
				echo $name_ar[0] . ' '; count($name_ar) > 1 ? print $name_ar[count($name_ar) - 1] . ' ':''
				?></p></div>
				<div class="flex inline-block">
				<svg class="h-5 w-5 my-1 mr-2 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				</svg>
				<p class="text-xs my-1"><?php echo $user->email;?></p></div>
				<div class="flex inline-block">
				<svg class="h-5 w-5 my-1 mr-2 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
				<p class="text-xs my-1"><?php echo $user->country . ', ' . $user->city;?></p></div>
			</div>
			</div>
			</div>
			</div>
			</div>
		</div>
		<?php } ?>
		<?php if($users == null) {  ?>
			<div class="text-2xl text-gray-700 font-bold p-4 w-full text-center uppercase">
				No users found!
			</div>
		<?php } ?>
		<span class="bg-gray-300 w-full m-4" style="padding-top: 1px" />
	</div>

<script>

</script>

<!-- -->

</body>
</html>
