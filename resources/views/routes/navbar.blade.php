  <!-- Navbar -->
  <nav class="bg-white shadow p-4 flex justify-between items-center">
    <a href="{{ route('user.dashboard') }}" class="text-xl font-bold text-[#754E1A]">iduno sa title</a>

    <!-- Search -->
    <div class="flex items-center justify-between px-10 py-4 gap-4">
      <form action="{{ route('search.books') }}" method="GET" class="flex items-center space-x-2">
      <input type="text" name="search" placeholder="Search for books..." class="border p-2 rounded" required>
      </form>


    <!-- Category Dropdown -->
    <div class="relative">
      <button id="categoryBtn" class="bg-[#754E1A] text-white px-4 py-2 rounded">Category</button>
      <ul id="categoryMenu" class="absolute hidden bg-white border mt-2 rounded shadow z-10" style="width: 180px;">
        <li class="p-2 font-semibold text-gray-700">By Genre:</li>

        <a href="{{ route('genre.books', ['genre' => 'Literature']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Literature</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Philosophy']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Philosophy</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Mathematics']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Mathematics</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Science']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Science</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'History']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">History</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Computer Science']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Computer Science</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Engineering']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Engineering</li>
        </a>
        <a href="{{ route('genre.books', ['genre' => 'Medicine']) }}">
          <li class="p-2 hover:bg-blue-100 cursor-pointer">Medicine</li>
        </a>
      </ul>
    </div>

    <script>
      // Toggle visibility of the category dropdown
      document.getElementById('categoryBtn').addEventListener('click', function() {
        const categoryMenu = document.getElementById('categoryMenu');
        categoryMenu.classList.toggle('hidden'); 
      });

      // Close the dropdown if clicked outside
      window.addEventListener('click', function(event) {
        const categoryMenu = document.getElementById('categoryMenu');
        const categoryBtn = document.getElementById('categoryBtn');
        if (!categoryMenu.contains(event.target) && !categoryBtn.contains(event.target)) {
          categoryMenu.classList.add('hidden'); //mawala automats if wala naka click
        }
      });
    </script>

      
      <!-- Bookmark -->
      <a href="{{ route('book.bookmarks') }}" title="Bookmarks">
        <img src="https://img.icons8.com/m_rounded/512/bookmark-ribbon.png" class="w-6 h-6" />
      </a>


      <!-- Cart -->
      <a href="{{ route('cart.show') }}" title="Cart">
          <img src="https://pic.onlinewebfonts.com/thumbnails/icons_556065.svg" class="w-6 h-6" alt="Cart Icon" />
      </a>


      <!-- Contact Page -->
      <a href="{{ route('contact.form') }}" class="text-blue-500 hover:text-blue-700 flex items-center gap-2">
          <img src="https://cdn-icons-png.freepik.com/256/455/455705.png" class="w-6 h-6" />
      </a>


      <!-- Profile Dropdown -->
      <div class="relative">
      <img id="profileBtn" src="https://cdn-icons-png.flaticon.com/512/3682/3682281.png" class="w-6 h-6 rounded-full cursor-pointer" />
      <ul id="profileMenu" class="absolute hidden right-0 bg-white mt-2 shadow rounded w-40">
        <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a></li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
          </form>
        </li>
      </ul>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      const profileBtn = document.getElementById('profileBtn');
      const profileMenu = document.getElementById('profileMenu');

      profileBtn.addEventListener('click', function() {
        profileMenu.classList.toggle('hidden');
      });

      document.addEventListener('click', function(event) {
        if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
          profileMenu.classList.add('hidden');
        }
      });
    });
    </script>


    </div>
  </nav>