<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Management Tool</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- CDN Tailwind css -->
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="flex align-center justify-center">
		<p class="text-6xl font-bold uppercase text-purple-400">Create New User</p>
	</div>

</header>

<!-- CONTENT -->

<div class="flex content-center flex-wrap text-gray-700 bg-gray-200 h-auto mx-64 border-2 border-gray-100 rounded-lg">
<form class="w-full max-w-lg mx-auto py-8" action="create_user" method="POST" enctype="multipart/form-data">
<!-- Image stuff is placed here -->
  <div class="flex flex-wrap -mx-6 mb-4">
    <div class="w-full">
		<button disabled class="text-gray-600">
		<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
		</button>
      <img class="rounded-full border-2 h-64 mx-auto" src="https://chedidgrieco.com.br/wp-content/uploads/2016/11/nobody_m.original.jpg" alt="Profile Picture"/>
    </div>
  </div>

  <!-- Input Fields are here! -->
  <div class="flex flex-wrap -mx-6 mb-4">
    <div class="w-3/4 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Name
      </label>
      <input required class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="name" type="text" placeholder="Full name here">
      <p class="text-gray-600 text-xs italic">Insert your full name here.</p>
    </div>
    <div class="w-1/4 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        age
      </label>
      <input required class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="age" type="text" placeholder="X Years">
      <p class="text-gray-600 text-xs italic">Insert your age here.</p>
    </div>
  </div>
  <div class="flex flex-wrap -mx-6 mb-4">
    <div class="px-3 w-1/2">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Phone Number
      </label>
      <input class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="phone_number" type="text" placeholder="(+351) 919191919">
      <p class="text-gray-600 text-xs italic">Insert your phone number here.</p>
    </div>

	<div class="px-3 w-1/2">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        E-mail
      </label>
      <input required class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="email" type="text" placeholder="example@example.com">
      <p class="text-gray-600 text-xs italic">Insert your email here.</p>
    </div>
  </div>
  <div class="flex flex-wrap -mx-6 mb-2">
  <div class="w-full md:w-1/3 px-3 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        Country
      </label>
      <div class="relative">
        <select required class="block appearance-none w-full bg-gray-300 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country" id="grid-state">
          <option value="" selected disabled hidden>Country</option>
          <option value="Portugal">Portugal</option>
          <option value="France">France</option>
          <option value="Spain">Spain</option>
		  <option value="England">England</option>
		  <option value="Germany">Germany</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        City
      </label>
      <input name="city" required class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Lisbon">
    </div>
    <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Zip-code
      </label>
      <input name="zip_code" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="XXXX-XXX">
    </div>
  </div>
  <div class="pt-4 flex flex-wrap mx-auto w-full justify-center">

  <!-- Submit buttons that makes the POST request -->
    <button class="hover:shadow bg-green-500 hover:bg-green-600 text-white font-bold py-2 mx-2 px-4 rounded">
        Submit
    </button>
    
    </div>
</form>
    <!-- Back to homepage we go in case we don't to submit anything -->
    <button onclick="location.href='/'" class="mt-6 bg-transparent absolute left-0 top-0 font-bold text-xl py-2 mx-2 px-4 rounded">
    <div class="flex">
    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    HOMEPAGE</div>
    </button>
</div>

<script>

</script>

<!-- -->

</body>
</html>
