<!DOCTYPE html>
<html lang="en" class="bg-gray-100">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact - MyLibrary</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    @include('routes.navbar')

  <main class="flex justify-center items-start min-h-[80vh] pt-10 pb-8-">
    <div class="w-full max-w-2xl">
      <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>

      <!-- Success Message -->
      @if(session('success'))
        <p class="bg-green-100 text-green-700 p-4 rounded mb-6 text-center">{{ session('success') }}</p>
      @endif

      <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
          <label for="name" class="block font-medium mb-1">Full Name</label>
          <input type="text" id="name" name="name" class="w-full border p-2 rounded" placeholder="Your Name" required>
        </div>

        <div class="mb-4">
          <label for="email" class="block font-medium mb-1">Email</label>
          <input type="email" id="email" name="email" class="w-full border p-2 rounded" placeholder="you@example.com" required>
        </div>

        <div class="mb-4">
          <label for="message" class="block font-medium mb-1">Your Message</label>
          <textarea id="message" name="message" class="w-full border p-2 rounded" rows="4" placeholder="Write your message here" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
          Send Message
        </button>
      </form>
    </div>
  </main>

  <script src="js/script.js"></script>
</body>
</html>
