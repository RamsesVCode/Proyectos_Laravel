<x-app-layout>
<main class="grid h-screen place-items-center relative bg-gradient-to-r from-yellow-400 to-yellow-500">
  <div class="absolute h-4/5 w-9/12 transform bg-gray-100 rounded-full overflow-hidden shadow-xl">
  <div class="absolute h-screen w-96 transform rotate-12 bg-yellow-500 bottom-0 -left-40"></div>
  <div class="absolute h-screen w-96 transform rotate-12 bg-yellow-400 top-0 -right-40"></div>
  </div>
  <div class="relative h-96 w-96">
    <div class="card bg-cyan-400 shadow-md inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-12"></div>
    <div class="card bg-indigo-400 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform -rotate-6"></div>
    <div class="card bg-pink-500 shadow-lg inline-block w-96 h-96 rounded-3xl absolute bottom-0 transform rotate-6"></div>
    <div class="card bg-white transition shadow-xl w-96 h-96 rounded-3xl absolute bottom-0 z-10 grid place-items-center">
      <div class="card bg-white shadow-inner h-4/5 w-3/4 rounded-2xl overflow-hidden relative">
        <h1 class="shadow-md text-xl font-thin text-center text-gray-600 uppercase p-3">Error 403</h1>
        <p class="shadow-md text-sm font-thin text-center text-gray-600 p-3">No tenes autorización para acceder.</p>
        <img src="https://images.unsplash.com/photo-1611500730105-02d129cd71f0?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=500&ixid=MXwxfDB8MXxyYW5kb218fHx8fHx8fA&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=500" alt="" />
        <a href="{{ route( 'home' ) }}" class="card bg-gray-700 hover:bg-gray-600 transition text-white w-full h-1/6 absolute bottom-0 text-center">Retrocedamos Sancho!</a>
      </div>
    </div>
  </div>
</main>
</x-app-layout>