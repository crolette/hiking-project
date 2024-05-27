<header class=" w-full p-4 bg-blue-500">
 <nav class="flex justify-evenly text-white font-semibold items-center ">
    <a href="/" class="hover:underline hover:text-blue-200">Home</a>
    <a href="/hikes" class="hover:underline hover:text-blue-200">All hikes</a>
    
    @if (session('username'))
    <a href="/logout" class="hover:underline hover:text-blue-200">Logout</a>
    
    @else
    
    
    <a href="/login" class="hover:underline hover:text-blue-200">Login</a>
    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><a href="/register" class="hover:underline hover:text-blue-200">Register</a></button>
    
    
    @endif
    
    @if (session('admin') === 1 && session('username')) 
      <a href="/admin" class="hover:underline hover:text-blue-200">ADMIN Panel</a>
      <a href="/user-profile" class="hover:underline hover:text-blue-200">User profile</a>
      @endif
    @if (session('admin') === 0 && session('username')) 
      <a href="/user-profile" class="hover:underline hover:text-blue-200">User profile</a>
      @endif
    
 </nav>
</header>
